<?php

namespace App\Http\Controllers;

use App\Services\LuvoraApiClient;

class OrderController extends Controller
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
            "/api/orders/user/{$userId}"
        );

        if ($response->failed()) {
            abort($response->status());
        }

        $orders = $response->json();

        return view(
            'orders.index',
            compact('orders')
        );
    }
}