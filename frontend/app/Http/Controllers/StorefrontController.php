<?php

namespace App\Http\Controllers;

use App\Services\LuvoraApiClient;
use Illuminate\Http\Client\ConnectionException;

class StorefrontController extends Controller
{
    public function home(LuvoraApiClient $api)
    {
        $homepage = null;
        $banners = [];
        $storefrontUnavailable = false;

        try {
            $response = $api->get('/api/storefront/homepage');
            if ($response->successful()) $homepage = $response->json();
            else $storefrontUnavailable = true;
            $bannerResponse = $api->get('/api/storefront/banners');
            if ($bannerResponse->successful()) {
                $payload = $bannerResponse->json();
                $banners = data_get($payload, 'data.banners') ?? data_get($payload, 'banners') ?? data_get($payload, 'data') ?? $payload ?? [];
                if (! is_array($banners)) $banners = [];
            } else $storefrontUnavailable = true;
        } catch (ConnectionException) {
            $storefrontUnavailable = true;
        }

        return view('home', compact('homepage', 'banners', 'storefrontUnavailable'));
    }
}
