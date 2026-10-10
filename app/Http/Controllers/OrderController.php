<?php

namespace App\Http\Controllers;

use App\Services\LuvoraApiClient;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class OrderController extends Controller
{
    public function index(LuvoraApiClient $api)
    {
        $context = $this->ordersForCustomer($api);

        if ($context instanceof RedirectResponse) {
            return $context;
        }

        return view('orders.index', $context);
    }

    public function track(Request $request, LuvoraApiClient $api)
    {
        $orderNumber = trim((string) $request->query('orderNumber', ''));

        if ($orderNumber !== '') {
            return redirect()->route('orders.track.show', $orderNumber);
        }

        $context = $this->ordersForCustomer($api);

        if ($context instanceof RedirectResponse) {
            return $context;
        }

        return view('orders.track', $context + ['order' => null]);
    }

    public function trackOrder(string $orderNumber, LuvoraApiClient $api)
    {
        return $this->findOrderPage($api, $orderNumber, 'track');
    }

    public function show(string $id, LuvoraApiClient $api)
    {
        return $this->findOrderPage($api, $id, 'detail');
    }

    public function cancel(string $id, LuvoraApiClient $api)
    {
        return $this->findOrderPage($api, $id, 'cancel');
    }

    public function submitCancellation(string $id, Request $request, LuvoraApiClient $api)
    {
        $request->validate([
            'reason' => ['required', 'string', 'max:500'],
        ]);

        return $this->findOrderPage($api, $id, 'cancel', [
            'actionUnavailable' => true,
        ]);
    }

    public function returnRequest(string $id, LuvoraApiClient $api)
    {
        return $this->findOrderPage($api, $id, 'return');
    }

    public function submitReturnRequest(string $id, Request $request, LuvoraApiClient $api)
    {
        $request->validate([
            'reason' => ['required', 'string', 'max:120'],
            'details' => ['nullable', 'string', 'max:1000'],
        ]);

        return $this->findOrderPage($api, $id, 'return', [
            'actionUnavailable' => true,
        ]);
    }

    public function returns(LuvoraApiClient $api)
    {
        $context = $this->ordersForCustomer($api);

        if ($context instanceof RedirectResponse) {
            return $context;
        }

        return view('orders.returns', $context);
    }

    public function invoice(string $id, LuvoraApiClient $api)
    {
        return $this->findOrderPage($api, $id, 'invoice');
    }

    private function findOrderPage(
        LuvoraApiClient $api,
        string $key,
        string $page,
        array $extra = []
    ) {
        $context = $this->ordersForCustomer($api);

        if ($context instanceof RedirectResponse) {
            return $context;
        }

        $order = collect($context['orders'])->first(function ($order) use ($key) {
            $identifiers = [
                data_get($order, 'id'),
                data_get($order, 'Id'),
                data_get($order, 'orderId'),
                data_get($order, 'OrderId'),
                data_get($order, 'orderNumber'),
                data_get($order, 'OrderNumber'),
                data_get($order, 'reference'),
                data_get($order, 'Reference'),
            ];

            return in_array((string) $key, array_map('strval', array_filter($identifiers, fn ($value) => $value !== null)), true);
        });

        if (! $order && ! $context['ordersUnavailable']) {
            abort(404, 'Order not found.');
        }

        return view("orders.{$page}", array_merge($context, [
            'order' => $order,
            'orderKey' => $key,
        ], $extra));
    }

    private function ordersForCustomer(LuvoraApiClient $api): array|RedirectResponse
    {
        $token = session('access_token');

        if (! $token) {
            return redirect()->route('login.show');
        }

        $user = session('user', []);
        $userId = data_get($user, 'id') ?? data_get($user, 'Id');

        if (! $userId) {
            session()->flush();

            return redirect()->route('login.show');
        }

        try {
            $response = $api->getWithToken($token, "/api/orders/user/{$userId}");
        } catch (ConnectionException) {
            return [
                'orders' => [],
                'ordersUnavailable' => true,
                'user' => $user,
            ];
        }

        if ($response->failed()) {
            return [
                'orders' => [],
                'ordersUnavailable' => true,
                'user' => $user,
            ];
        }

        $payload = $response->json();
        $orders = data_get($payload, 'data.orders')
            ?? data_get($payload, 'orders')
            ?? data_get($payload, 'data')
            ?? $payload
            ?? [];

        if (is_array($orders) && (isset($orders['id']) || isset($orders['Id']))) {
            $orders = [$orders];
        }

        return [
            'orders' => is_array($orders) ? $orders : [],
            'ordersUnavailable' => false,
            'user' => $user,
        ];
    }
}
