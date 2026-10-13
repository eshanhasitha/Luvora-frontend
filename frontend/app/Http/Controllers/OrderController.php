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

        if (! filter_var($id, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/^[0-9a-f-]{36}$/i']])) {
            return back()->withErrors(['order' => 'A valid order ID is required to cancel this order.']);
        }
        $context = $this->ordersForCustomer($api);
        if ($context instanceof RedirectResponse) return $context;
        $belongsToCustomer = collect($context['orders'])->contains(fn ($order) => (string) (data_get($order, 'id') ?? data_get($order, 'Id')) === $id);
        if (! $belongsToCustomer) return back()->withErrors(['order' => 'That order could not be verified for your account.']);
        $token = session('access_token');
        if (! $token) return redirect()->route('login.show');
        try {
            $response = $api->postWithToken($token, '/api/orders/' . rawurlencode($id) . '/cancel');
        } catch (ConnectionException) {
            return back()->withErrors(['order' => 'The order service is unavailable. The order was not cancelled.']);
        }
        if ($response->failed()) {
            $message = data_get($response->json(), 'message') ?? 'The order could not be cancelled in its current status.';
            return back()->withErrors(['order' => $message]);
        }
        return redirect()->route('account.orders.index')->with('status', 'Your order has been cancelled.');
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

        $extra = array_merge($extra, $this->orderServiceDetails($api, $order));

        return view("orders.{$page}", array_merge($context, [
            'order' => $order,
            'orderKey' => $key,
        ], $extra));
    }

    private function orderServiceDetails(LuvoraApiClient $api, mixed $order): array
    {
        $orderId = data_get($order, 'id') ?? data_get($order, 'Id');
        if (! $orderId || ! preg_match('/^[0-9a-f-]{36}$/i', (string) $orderId)) {
            return ['delivery' => null, 'payment' => null, 'deliveryUnavailable' => false, 'paymentUnavailable' => false];
        }

        $details = [
            'delivery' => null,
            'payment' => null,
            'deliveryUnavailable' => false,
            'paymentUnavailable' => false,
        ];

        try {
            $deliveryResponse = $api->get('/api/deliveries/order/' . rawurlencode((string) $orderId));
            if ($deliveryResponse->successful()) {
                $payload = $deliveryResponse->json();
                $details['delivery'] = data_get($payload, 'data.delivery')
                    ?? data_get($payload, 'delivery')
                    ?? data_get($payload, 'data')
                    ?? $payload;
            } elseif (! $deliveryResponse->notFound()) {
                $details['deliveryUnavailable'] = true;
            }
        } catch (ConnectionException) {
            $details['deliveryUnavailable'] = true;
        }

        try {
            $paymentResponse = $api->get('/api/payments/order/' . rawurlencode((string) $orderId));
            if ($paymentResponse->successful()) {
                $payload = $paymentResponse->json();
                $details['payment'] = data_get($payload, 'data.payment')
                    ?? data_get($payload, 'payment')
                    ?? data_get($payload, 'data')
                    ?? $payload;
            } elseif (! $paymentResponse->notFound()) {
                $details['paymentUnavailable'] = true;
            }
        } catch (ConnectionException) {
            $details['paymentUnavailable'] = true;
        }

        if (! is_array($details['delivery'])) $details['delivery'] = null;
        if (! is_array($details['payment'])) $details['payment'] = null;

        return $details;
    }

    private function ordersForCustomer(LuvoraApiClient $api): array|RedirectResponse
    {
        $token = session('access_token');

        if (! $token) {
            return redirect()->guest(route('login.show'));
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
