<?php

namespace App\Http\Controllers;

use App\Services\LuvoraApiClient;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(
        Request $request,
        LuvoraApiClient $api
    ) {
        $validated = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $response = $api->post(
            '/api/auth/login',
            $validated
        );

        if ($response->failed()) {
            return back()
                ->withErrors([
                    'email' => 'Invalid email or password.',
                ])
                ->withInput();
        }

        $data = $response->json();
        $auth = $data['data'] ?? $data;

        $accessToken = $auth['accessToken']
            ?? $auth['access_token']
            ?? $auth['token']
            ?? null;

        if (!$accessToken) {
            return back()
                ->withErrors([
                    'email' => 'Login API returned no access token.',
                ])
                ->withInput();
        }

        session([
            'access_token' => $accessToken,
            'refresh_token' => $auth['refreshToken']
                ?? $auth['refresh_token']
                ?? null,
            'user' => $auth['user'] ?? null,
        ]);

        return redirect('/dashboard');
    }

    public function logout(
        LuvoraApiClient $api
    ) {
        $refreshToken = session('refresh_token');

        if ($refreshToken) {
            $api->post(
                '/api/auth/logout',
                [
                    'refreshToken' => $refreshToken,
                ]
            );
        }

        session()->flush();

        return redirect('/login');
    }
}