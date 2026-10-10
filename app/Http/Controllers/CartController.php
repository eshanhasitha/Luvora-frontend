<?php

namespace App\Http\Controllers;

use App\Services\LuvoraApiClient;
use Illuminate\Http\Client\ConnectionException;

class CartController extends Controller
{
    public function index(
        LuvoraApiClient $api
    ) {
        $token = session('access_token');

        if (!$token) {
            return redirect('/login');
        }

        $user = session('user');

        $userId = data_get($user, 'id') ?? data_get($user, 'Id');

        if (!$userId) {
            session()->flush();

            return redirect('/login');
        }

        try {
            $response = $api->getWithToken($token, "/api/cart/{$userId}");
        } catch (ConnectionException) {
            return view('cart.index', [
                'cart' => ['items' => []],
                'cartUnavailable' => true,
            ]);
        }

        if ($response->failed()) {
            return view('cart.index', [
                'cart' => ['items' => []],
                'cartUnavailable' => true,
            ]);
        }

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

        if (! is_array($cart['items'])) {
            $cart['items'] = [];
        }

        $cartUnavailable = false;

        return view(
            'cart.index',
            compact('cart', 'cartUnavailable')
        );
    }
}
