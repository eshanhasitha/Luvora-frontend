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
            $response = $api->get('/api/products', ['page' => 1, 'pageSize' => 100]);
        } catch (ConnectionException) {
            return view('discovery.gift-guide', ['products' => [], 'productsUnavailable' => true]);
        }

        $payload = $response->successful() ? $response->json() : [];
        $products = data_get($payload, 'data.products')
            ?? data_get($payload, 'products')
            ?? data_get($payload, 'data')
            ?? [];
        $totalPages = (int) (data_get($payload, 'totalPages') ?? data_get($payload, 'data.totalPages') ?? 1);
        for ($page = 2; $page <= min($totalPages, 100) && $response->successful(); $page++) {
            try {
                $next = $api->get('/api/products', ['page' => $page, 'pageSize' => 100]);
            } catch (ConnectionException) {
                $response = null;
                break;
            }
            if ($next->failed()) { $response = $next; break; }
            $nextPayload = $next->json();
            $nextProducts = data_get($nextPayload, 'data.products') ?? data_get($nextPayload, 'products') ?? data_get($nextPayload, 'data') ?? [];
            if (! is_array($nextProducts) || $nextProducts === []) break;
            $products = array_merge(is_array($products) ? $products : [], $nextProducts);
        }

        return view('discovery.gift-guide', [
            'products' => is_array($products) ? $products : [],
            'productsUnavailable' => $response === null || $response->failed(),
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
