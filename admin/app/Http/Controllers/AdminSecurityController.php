<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\View\View;

class AdminSecurityController extends Controller
{
    public function showLogin(): View|RedirectResponse
    {
        return session('admin_access_token') ? redirect()->route('dashboard') : view('auth.admin-login');
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        $key = Str::lower($credentials['email']).'|'.$request->ip();
        if (RateLimiter::tooManyAttempts($key, 5)) {
            return back()->withErrors(['email' => 'Too many sign-in attempts. Try again in '.RateLimiter::availableIn($key).' seconds.'])->onlyInput('email');
        }

        try {
            $response = app(\App\Services\LuvoraAdminApiClient::class)->login($credentials);
        } catch (\Illuminate\Http\Client\ConnectionException) {
            return back()->withErrors(['email' => 'The admin authentication service is unavailable.'])->onlyInput('email');
        }

        if ($response->failed()) {
            RateLimiter::hit($key, 60);
            return back()->withErrors(['email' => data_get($response->json(), 'message', 'These credentials do not match our records.')])->onlyInput('email');
        }

        $payload = $response->json();
        $accessToken = data_get($payload, 'accessToken') ?? data_get($payload, 'access_token') ?? data_get($payload, 'data.accessToken') ?? data_get($payload, 'data.access_token') ?? data_get($payload, 'token');
        if (! is_string($accessToken) || $accessToken === '') {
            RateLimiter::hit($key, 60);
            return back()->withErrors(['email' => 'The admin authentication response did not include an access token.'])->onlyInput('email');
        }

        RateLimiter::clear($key);
        $request->session()->regenerate();
        $adminUser = (array) (data_get($payload, 'user') ?? data_get($payload, 'admin') ?? data_get($payload, 'staff') ?? data_get($payload, 'data.user') ?? data_get($payload, 'data.admin') ?? []);
        $adminUser['name'] = $adminUser['name'] ?? $adminUser['Name'] ?? (trim(implode(' ', array_filter([
            $adminUser['firstName'] ?? $adminUser['FirstName'] ?? $adminUser['first_name'] ?? null,
            $adminUser['lastName'] ?? $adminUser['LastName'] ?? $adminUser['last_name'] ?? null,
        ]))) ?: 'Admin user');
        $adminUser['role'] = $adminUser['role'] ?? $adminUser['Role'] ?? $adminUser['title'] ?? $adminUser['Title'] ?? 'Administrator';
        session([
            'admin_access_token' => $accessToken,
            'admin_refresh_token' => data_get($payload, 'refreshToken') ?? data_get($payload, 'refresh_token') ?? data_get($payload, 'data.refreshToken') ?? data_get($payload, 'data.refresh_token'),
            'admin_user' => $adminUser,
        ]);
        return redirect()->intended(route('dashboard'));
    }

    public function logout(Request $request): RedirectResponse
    {
        session()->forget(['admin_access_token', 'admin_refresh_token', 'admin_user']);
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    public function updateProfile(Request $request): RedirectResponse
    {
        $user = (array) session('admin_user', []);
        $data = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:255'],
        ]);

        try {
            $response = app(\App\Services\LuvoraAdminApiClient::class)->request('PATCH', '/api/admin/auth/me', session('admin_access_token', ''), $data);
        } catch (\Illuminate\Http\Client\ConnectionException) {
            return back()->withErrors(['profile' => 'The admin API is unavailable.'])->withInput();
        }

        if ($response->failed()) {
            return back()->withErrors(['profile' => data_get($response->json(), 'message', 'Profile update failed.')])->withInput();
        }

        $profile = data_get($response->json(), 'user') ?? data_get($response->json(), 'data.user') ?? $response->json();
        session(['admin_user' => $profile]);

        return back()->with('status', 'Profile updated.');
    }
}
