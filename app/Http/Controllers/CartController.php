<?php

namespace App\Http\Controllers;

use App\Services\LuvoraApiClient;

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

        $userId = $user['id'] ?? null;

        if (!$userId) {
            session()->flush();

            return redirect('/login');
        }

        $response = $api->getWithToken(
            $token,
            "/api/cart/{$userId}"
        );

        if ($response->failed()) {
            abort($response->status());
        }

        $cart = $response->json();

        return view(
            'cart.index',
            compact('cart')
        );
    }
}