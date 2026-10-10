<?php

namespace App\Http\Controllers;

use App\Services\LuvoraApiClient;
use Illuminate\Http\Client\ConnectionException;

class DiscoveryController extends Controller
{
    public function stores()
    {
        // There is no store directory endpoint or verified location data yet.
        return view('discovery.stores', ['stores' => [], 'storesUnavailable' => false]);
    }

    public function store(string $slug)
    {
        // Avoid showing made-up addresses while a store directory is not connected.
        return response()->view('discovery.store', [
            'store' => null,
            'storeSlug' => $slug,
        ], 404);
    }

    public function giftGuide(LuvoraApiClient $api)
    {
        try {
            $response = $api->get('/api/products');
        } catch (ConnectionException) {
            return view('discovery.gift-guide', ['products' => [], 'productsUnavailable' => true]);
        }

        $payload = $response->successful() ? $response->json() : [];
        $products = data_get($payload, 'data.products')
            ?? data_get($payload, 'products')
            ?? data_get($payload, 'data')
            ?? [];

        return view('discovery.gift-guide', [
            'products' => is_array($products) ? $products : [],
            'productsUnavailable' => $response->failed(),
        ]);
    }

    public function journal()
    {
        // Editorial pages have no CMS or article feed connected at present.
        return view('discovery.journal', ['articles' => []]);
    }

    public function article(string $slug)
    {
        return response()->view('discovery.article', ['article' => null, 'articleSlug' => $slug], 404);
    }

    public function sitemap()
    {
        return view('discovery.sitemap');
    }
}
