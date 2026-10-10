<?php

namespace App\Http\Controllers;

use App\Services\LuvoraApiClient;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(LuvoraApiClient $api)
    {
        return $this->checkoutPage($api, 'index');
    }

    public function address(LuvoraApiClient $api)
    {
        return $this->checkoutPage($api, 'step', ['step' => 'address']);
    }

    public function saveAddress(Request $request, LuvoraApiClient $api)
    {
        $address = $request->validate([
            'full_name' => ['required', 'string', 'max:120'],
            'phone' => ['required', 'string', 'max:40'],
            'address_line_1' => ['required', 'string', 'max:200'],
            'address_line_2' => ['nullable', 'string', 'max:200'],
            'city' => ['required', 'string', 'max:100'],
            'province' => ['required', 'string', 'max:100'],
            'postal_code' => ['nullable', 'string', 'max:20'],
        ]);

        $request->session()->put('checkout.address', $address);

        return redirect()->route('checkout.shipping');
    }

    public function shipping(LuvoraApiClient $api)
    {
        return $this->checkoutPage($api, 'step', ['step' => 'shipping']);
    }

    public function saveShipping(Request $request, LuvoraApiClient $api)
    {
        $data = $request->validate([
            'method' => ['required', 'in:express,colombo_same_day'],
        ]);

        $request->session()->put('checkout.shipping', $data['method']);

        return redirect()->route('checkout.payment');
    }

    public function payment(LuvoraApiClient $api)
    {
        return $this->checkoutPage($api, 'step', ['step' => 'payment']);
    }

    public function savePayment(Request $request, LuvoraApiClient $api)
    {
        $data = $request->validate([
            'method' => ['required', 'in:card,cash_on_delivery'],
        ]);

        // Keep only the chosen method. Card numbers and payment credentials
        // must be handled by a configured payment provider, never this session.
        $request->session()->put('checkout.payment', $data['method']);

        return redirect()->route('checkout.review');
    }

    public function review(LuvoraApiClient $api)
    {
        return $this->checkoutPage($api, 'step', ['step' => 'review']);
    }

    public function success()
    {
        return view('checkout.success', [
            'order' => session('checkout_order'),
            'user' => session('user', []),
        ]);
    }

    public function failed()
    {
        return view('checkout.failed', [
            'paymentError' => session('checkout_payment_error'),
        ]);
    }

    private function checkoutPage(LuvoraApiClient $api, string $view, array $extra = [])
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
            $response = $api->getWithToken($token, "/api/cart/{$userId}");
        } catch (ConnectionException) {
            return view("checkout.{$view}", array_merge([
                'cart' => ['items' => []],
                'cartUnavailable' => true,
                'user' => $user,
                'checkout' => session('checkout', []),
            ], $extra));
        }

        if ($response->failed()) {
            $cart = ['items' => []];
            $cartUnavailable = true;
        } else {
            $payload = $response->json();
            $cart = data_get($payload, 'data.cart')
                ?? data_get($payload, 'cart')
                ?? data_get($payload, 'data')
                ?? $payload
                ?? [];

            if (! is_array($cart)) {
                $cart = [];
            }

            $cart['items'] = data_get($cart, 'items')
                ?? data_get($cart, 'Items')
                ?? [];
            $cart['items'] = is_array($cart['items']) ? $cart['items'] : [];
            $cartUnavailable = false;
        }

        return view("checkout.{$view}", array_merge([
            'cart' => $cart,
            'cartUnavailable' => $cartUnavailable,
            'user' => $user,
            'checkout' => session('checkout', []),
        ], $extra));
    }
}
