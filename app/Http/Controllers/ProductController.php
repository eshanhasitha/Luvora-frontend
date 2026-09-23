<?php

namespace App\Http\Controllers;

use App\Services\LuvoraApiClient;

class ProductController extends Controller
{
    public function index(
        LuvoraApiClient $api
    ) {
        $response = $api->get('/api/products');

        if ($response->failed()) {
            abort(
                $response->status(),
                'Unable to load products.'
            );
        }

        $products = $response->json();

        return view(
            'products.index',
            compact('products')
        );
    }

    public function show(
        string $id,
        LuvoraApiClient $api
    ) {
        $response = $api->get(
            "/api/products/{$id}"
        );

        if ($response->notFound()) {
            abort(404);
        }

        if ($response->failed()) {
            abort(500);
        }

        $product = $response->json();

        return view(
            'products.show',
            compact('product')
        );
    }
}