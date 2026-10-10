<?php

namespace App\Http\Controllers;

use App\Services\LuvoraApiClient;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function showForgotPassword()
    {
        return view('auth.forgot-password');
    }

    public function showResetPassword(string $token)
    {
        return view('auth.reset-password', compact('token'));
    }

    public function register(Request $request, LuvoraApiClient $api)
    {
        $data = $request->validate([
            'first_name' => ['required', 'string', 'max:80'],
            'last_name' => ['required', 'string', 'max:80'],
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'terms' => ['accepted'],
        ]);

        try {
            $response = $api->post('/api/auth/register', [
                'firstName' => $data['first_name'],
                'lastName' => $data['last_name'],
                'email' => $data['email'],
                'password' => $data['password'],
            ]);
        } catch (ConnectionException) {
            return back()->withErrors([
                'email' => 'The account service is unavailable. Please try again shortly.',
            ])->withInput($request->except('password', 'password_confirmation'));
        }

        if ($response->failed()) {
            return back()->withErrors([
                'email' => 'We could not create your account. Check your details or try signing in if you already registered.',
            ])->withInput($request->except('password', 'password_confirmation'));
        }

        return redirect()->route('login.show')->with(
            'status',
            'Your registration was received. You can now sign in.'
        );
    }

    public function sendPasswordReset(Request $request, LuvoraApiClient $api)
    {
        $data = $request->validate([
            'email' => ['required', 'email'],
        ]);

        try {
            $response = $api->post('/api/auth/forgot-password', $data);
        } catch (ConnectionException) {
            return back()->withErrors([
                'email' => 'The account service is unavailable. Please try again shortly.',
            ])->withInput();
        }

        if ($response->failed()) {
            return back()->withErrors([
                'email' => 'We could not request a reset link. Please check the email and try again.',
            ])->withInput();
        }

        return back()->with(
            'status',
            'If the email belongs to an account, password reset instructions will be sent shortly.'
        );
    }

    public function resetPassword(Request $request, string $token, LuvoraApiClient $api)
    {
        $data = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        try {
            $response = $api->post('/api/auth/reset-password', [
                'token' => $token,
                'email' => $data['email'],
                'password' => $data['password'],
            ]);
        } catch (ConnectionException) {
            return back()->withErrors([
                'email' => 'The account service is unavailable. Please try again shortly.',
            ])->withInput($request->except('password', 'password_confirmation'));
        }

        if ($response->failed()) {
            return back()->withErrors([
                'email' => 'This reset link may have expired. Request a new password reset link and try again.',
            ])->withInput($request->except('password', 'password_confirmation'));
        }

        return redirect()->route('login.show')->with(
            'status',
            'Your password has been updated. Sign in with your new password.'
        );
    }

    public function login(
        Request $request,
        LuvoraApiClient $api
    ) {
        $validated = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        try {
            $response = $api->post(
                '/api/auth/login',
                $validated
            );
        } catch (ConnectionException) {
            return back()->withErrors([
                'email' => 'The account service is unavailable. Please try again shortly.',
            ])->withInput($request->except('password'));
        }

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

        $user = $auth['user'] ?? $auth;

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
            'user' => $user,
        ]);

        return redirect('/dashboard');
    }

    public function logout(
        LuvoraApiClient $api
    ) {
        $refreshToken = session('refresh_token');

        if ($refreshToken) {
            try {
                $api->post(
                    '/api/auth/logout',
                    [
                        'refreshToken' => $refreshToken,
                    ]
                );
            } catch (ConnectionException) {
                // End the local session even if the API cannot be reached.
            }
        }

        session()->flush();

        return redirect('/login');
    }
}
