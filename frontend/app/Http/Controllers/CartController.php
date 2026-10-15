<?php

namespace App\Http\Controllers;

use App\Services\LuvoraApiClient;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(
        LuvoraApiClient $api
    ) {
        $token = session('access_token');

        if (!$token) {
            return redirect()->guest(route('login.show'));
        }

        $user = session('user');

        try {
            $response = $api->getWithToken($token, '/api/cart');
        } catch (ConnectionException) {
            return view('cart.index', [
                'cart' => ['items' => []],
                'cartUnavailable' => true,
            ]);
        }

        if ($response->failed()) {
            return view('cart.index', [
                'cart' => ['items' => []],
                'cartUnavailable' => true,
            ]);
        }

        $payload = $response->json();
        $cart = data_get($payload, 'data.cart')
            ?? data_get($payload, 'cart')
            ?? data_get($payload, 'data')
            ?? $payload
            ?? [];

        if (! is_array($cart)) {
            $cart = [];
        }

        $cart['items'] = data_get($cart, 'items')
            ?? data_get($cart, 'Items')
            ?? [];

        if (! is_array($cart['items'])) {
            $cart['items'] = [];
        }

        foreach ($cart['items'] as &$item) {
            $productId = data_get($item, 'productId') ?? data_get($item, 'ProductId');
            if (! $productId) continue;
            try {
                $productResponse = $api->get('/api/products/' . rawurlencode((string) $productId));
                if ($productResponse->successful()) {
                    $product = $productResponse->json();
                    $image = data_get($product, 'imageUrls.0') ?? data_get($product, 'ImageUrls.0');
                    if (is_string($image) && str_starts_with($image, '/api/products/images/')) {
                        $product['imageUrl'] = rtrim(config('services.luvora.base_url'), '/') . $image;
                    }
                    $item['product'] = $product;
                }
            } catch (ConnectionException) {
                // Keep the cart item usable even when product metadata is offline.
            }
        }
        unset($item);

        $cartUnavailable = false;

        return view(
            'cart.index',
            compact('cart', 'cartUnavailable')
        );
    }

    public function addItem(Request $request, LuvoraApiClient $api)
    {
        $data = $request->validate([
            'product_id' => ['required', 'uuid'],
            'quantity' => ['required', 'integer', 'min:1', 'max:99'],
        ]);
        $identity = $this->authenticatedIdentity();
        if ($identity instanceof \Illuminate\Http\RedirectResponse) return $identity;
        [$token, $userId] = $identity;

        try {
            $productResponse = $api->get('/api/products/' . rawurlencode($data['product_id']));
            if ($productResponse->notFound()) abort(404, 'Product not found.');
            if ($productResponse->failed()) return back()->withErrors(['cart' => 'Product details could not be loaded. Please try again.']);
            $product = $productResponse->json();
            $price = data_get($product, 'discountPrice') ?? data_get($product, 'price') ?? data_get($product, 'Price');
            if (! is_numeric($price) || (float) $price <= 0) return back()->withErrors(['cart' => 'This product does not have a valid price and cannot be added yet.']);
            $response = $api->postWithToken($token, '/api/cart/items', [
                'productId' => $data['product_id'], 'quantity' => (int) $data['quantity'], 'unitPrice' => (float) $price,
            ]);
        } catch (ConnectionException) {
            return back()->withErrors(['cart' => 'The cart service is unavailable. This piece was not added.']);
        }

        if ($response->failed()) return back()->withErrors(['cart' => 'This piece could not be added to your bag. Please try again.']);
        return redirect()->route('cart.index')->with('status', 'Added to your shopping bag.');
    }

    public function updateItem(Request $request, string $itemId, LuvoraApiClient $api)
    {
        $data = $request->validate(['quantity' => ['required', 'integer', 'min:1', 'max:99']]);
        $identity = $this->authenticatedIdentity();
        if ($identity instanceof \Illuminate\Http\RedirectResponse) return $identity;
        [$token, $userId] = $identity;
        try {
            $response = $api->putWithToken($token, '/api/cart/items/' . rawurlencode($itemId), ['quantity' => (int) $data['quantity']]);
        } catch (ConnectionException) { return back()->withErrors(['cart' => 'The cart service is unavailable.']); }
        if ($response->failed()) return back()->withErrors(['cart' => 'The cart quantity could not be updated.']);
        return redirect()->route('cart.index')->with('status', 'Shopping bag updated.');
    }

    public function removeItem(string $itemId, LuvoraApiClient $api)
    {
        $identity = $this->authenticatedIdentity();
        if ($identity instanceof \Illuminate\Http\RedirectResponse) return $identity;
        [$token, $userId] = $identity;
        try {
            $response = $api->deleteWithToken($token, '/api/cart/items/' . rawurlencode($itemId));
        } catch (ConnectionException) { return back()->withErrors(['cart' => 'The cart service is unavailable.']); }
        if ($response->failed()) return back()->withErrors(['cart' => 'The item could not be removed from your bag.']);
        return redirect()->route('cart.index')->with('status', 'Item removed from your shopping bag.');
    }

    private function authenticatedIdentity(): array|\Illuminate\Http\RedirectResponse
    {
        $token = session('access_token');
        if (! $token || ! session('user')) return redirect()->guest(route('login.show'));
        return [$token, null];
    }
}
