<?php

namespace App\Http\Controllers;

use App\Services\LuvoraApiClient;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Request;

class ProductEngagementController extends Controller
{
    public function reviews(string $slug, LuvoraApiClient $api)
    {
        try {
            $response = $api->get("/api/products/{$slug}/reviews");
        } catch (ConnectionException) {
            return view('products.reviews', [
                'slug' => $slug,
                'reviews' => [],
                'reviewsUnavailable' => true,
            ]);
        }

        $payload = $response->successful() ? $response->json() : [];
        $reviews = data_get($payload, 'data.reviews')
            ?? data_get($payload, 'reviews')
            ?? data_get($payload, 'data')
            ?? [];

        return view('products.reviews', [
            'slug' => $slug,
            'reviews' => is_array($reviews) ? $reviews : [],
            'reviewsUnavailable' => $response->failed(),
        ]);
    }

    public function createReview(string $slug)
    {
        if (! session('access_token')) {
            return redirect()->guest(route('login.show'));
        }

        return view('products.review-create', compact('slug'));
    }

    public function storeReview(Request $request, string $slug, LuvoraApiClient $api)
    {
        if (! session('access_token')) {
            return redirect()->route('login.show');
        }

        $review = $request->validate([
            'rating' => ['required', 'integer', 'between:1,5'],
            'title' => ['nullable', 'string', 'max:120'],
            'comment' => ['required', 'string', 'min:10', 'max:3000'],
        ]);

        try {
            $response = $api->postWithToken(session('access_token'), "/api/products/{$slug}/reviews", [
                'rating' => (int) $review['rating'],
                'title' => $review['title'] ?? '',
                'comment' => $review['comment'],
            ]);
        } catch (ConnectionException) {
            return back()->withInput()->withErrors(['comment' => 'The review service is unavailable. Your review was not sent.']);
        }

        if ($response->failed()) {
            return back()->withInput()->withErrors(['comment' => 'The review could not be submitted. The review service may not be enabled for this product yet.']);
        }

        return redirect()->route('products.reviews', $slug)->with('status', 'Your review was submitted.');
    }

    public function availability(string $slug, LuvoraApiClient $api)
    {
        try {
            $response = $api->get("/api/products/{$slug}");
        } catch (ConnectionException) {
            return view('products.availability', [
                'slug' => $slug,
                'product' => null,
                'availabilityUnavailable' => true,
            ]);
        }

        if ($response->notFound()) {
            abort(404);
        }

        $payload = $response->successful() ? $response->json() : [];
        $product = data_get($payload, 'data.product')
            ?? data_get($payload, 'product')
            ?? data_get($payload, 'data')
            ?? $payload;

        return view('products.availability', [
            'slug' => $slug,
            'product' => is_array($product) ? $product : null,
            'availabilityUnavailable' => $response->failed(),
        ]);
    }

    public function sizeGuide()
    {
        return view('customer-care.size-guide');
    }

    public function compare()
    {
        $slugs = array_slice(array_values(array_unique(session('compare_products', []))), 0, 4);
        $products = [];
        $compareUnavailable = false;

        foreach ($slugs as $slug) {
            try {
                $response = app(LuvoraApiClient::class)->get('/api/products/' . rawurlencode($slug));
            } catch (ConnectionException) {
                $compareUnavailable = true;
                continue;
            }

            if ($response->successful()) {
                $payload = $response->json();
                $product = data_get($payload, 'data.product')
                    ?? data_get($payload, 'product')
                    ?? data_get($payload, 'data')
                    ?? $payload;
                if (is_array($product)) {
                    $product['_compare_slug'] = $slug;
                    $products[] = $product;
                }
            } else {
                $compareUnavailable = true;
            }
        }

        return view('products.compare', compact('products', 'compareUnavailable'));
    }

    public function addToCompare(Request $request)
    {
        $data = $request->validate(['slug' => ['required', 'string', 'max:180']]);
        $slugs = array_values(array_unique(session('compare_products', [])));

        if (! in_array($data['slug'], $slugs, true)) {
            if (count($slugs) >= 4) {
                return back()->withErrors(['compare' => 'Compare up to four products at a time.']);
            }
            $slugs[] = $data['slug'];
        }

        session()->put('compare_products', $slugs);

        return redirect()->route('compare')->with('status', 'Product added to your comparison.');
    }

    public function removeFromCompare(Request $request)
    {
        $data = $request->validate(['slug' => ['required', 'string', 'max:180']]);
        $slugs = array_values(array_filter(
            session('compare_products', []),
            fn ($slug) => $slug !== $data['slug']
        ));
        session()->put('compare_products', $slugs);

        return redirect()->route('compare');
    }

    public function recentlyViewed(LuvoraApiClient $api)
    {
        $slugs = array_slice(array_values(array_unique(session('recently_viewed_products', []))), 0, 12);
        $products = [];
        $productsUnavailable = false;

        foreach ($slugs as $slug) {
            try {
                $response = $api->get('/api/products/' . rawurlencode($slug));
            } catch (ConnectionException) {
                $productsUnavailable = true;
                continue;
            }

            if ($response->successful()) {
                $payload = $response->json();
                $product = data_get($payload, 'data.product')
                    ?? data_get($payload, 'product')
                    ?? data_get($payload, 'data')
                    ?? $payload;
                if (is_array($product)) {
                    $product['_recent_slug'] = $slug;
                    $products[] = $product;
                }
            } else {
                $productsUnavailable = true;
            }
        }

        return view('products.recently-viewed', compact('products', 'productsUnavailable'));
    }
}
