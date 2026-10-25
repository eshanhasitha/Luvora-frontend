<?php

namespace App\Http\Controllers;

use App\Services\LuvoraAdminApiClient;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    public function store(Request $request, LuvoraAdminApiClient $api): RedirectResponse
    {
        $validated = $request->validate([
            'Name' => ['required', 'string', 'max:250'],
            'CategoryId' => ['required', 'uuid'],
            'Description' => ['required', 'string', 'max:5000'],
            'Price' => ['required', 'numeric', 'between:0.01,999999999'],
            'DiscountPrice' => ['nullable', 'numeric', 'between:0.01,999999999'],
            'Brand' => ['nullable', 'string', 'max:150'],
            'SKU' => ['required', 'string', 'max:100'],
            'Sizes' => ['sometimes', 'array', 'max:50'],
            'Sizes.*' => ['string', 'max:80'],
            'Colors' => ['sometimes', 'array', 'max:50'],
            'Colors.*' => ['string', 'max:80'],
            'images' => ['sometimes', 'array'],
            'images.*' => ['file', 'max:9765', 'mimes:jpg,jpeg,png,webp,gif'],
        ]);

        $token = (string) session('admin_access_token', '');
        $imageUrls = [];

        try {
            foreach ($request->file('images', []) as $image) {
                $upload = $api->upload('/api/admin/products/images', $token, $image);
                if ($upload->failed()) {
                    return $this->apiFailure($request, $upload->status(), $upload->json());
                }

                $imageUrl = data_get($upload->json(), 'imageUrl') ?? data_get($upload->json(), 'data.imageUrl');
                if (! is_string($imageUrl) || $imageUrl === '') {
                    return back()->withErrors(['api' => 'The image API did not return an image URL. No product was created.'])
                        ->withInput($request->except('images') + ['_product_form' => 1]);
                }

                $imageUrls[] = $imageUrl;
            }

            $payload = [
                'Name' => trim($validated['Name']),
                'CategoryId' => $validated['CategoryId'],
                'Description' => trim($validated['Description']),
                'Price' => (float) $validated['Price'],
                'DiscountPrice' => isset($validated['DiscountPrice']) ? (float) $validated['DiscountPrice'] : null,
                'Brand' => trim((string) ($validated['Brand'] ?? '')),
                'SKU' => trim($validated['SKU']),
                'Sizes' => $this->normalizeOptions($validated['Sizes'] ?? []),
                'Colors' => $this->normalizeOptions($validated['Colors'] ?? []),
                'ImageUrls' => $imageUrls,
            ];

            $response = $api->request('POST', '/api/admin/products', $token, $payload);
        } catch (ConnectionException) {
            return back()->withErrors(['api' => 'The admin API is unavailable.'])
                ->withInput($request->except('images') + ['_product_form' => 1]);
        }

        if ($response->failed()) {
            return $this->apiFailure($request, $response->status(), $response->json());
        }

        $productId = data_get($response->json(), 'id') ?? data_get($response->json(), 'product.id');

        return redirect()->route('products.index')
            ->with('status', 'Product created successfully.')
            ->with('created_product_id', $productId);
    }

    public function storeCategory(Request $request, LuvoraAdminApiClient $api): JsonResponse
    {
        $validated = $request->validate([
            'Name' => ['required', 'string', 'max:150'],
            'Description' => ['nullable', 'string', 'max:1000'],
        ]);

        try {
            $response = $api->request('POST', '/api/admin/categories', (string) session('admin_access_token', ''), [
                'Name' => trim($validated['Name']),
                'Description' => trim((string) ($validated['Description'] ?? '')),
            ]);
        } catch (ConnectionException) {
            return response()->json(['message' => 'The admin API is unavailable.'], 503);
        }

        if ($response->status() === 401) {
            session()->forget(['admin_access_token', 'admin_refresh_token', 'admin_user']);

            return response()->json(['message' => 'Your admin session expired. Sign in again.'], 401);
        }
        if ($response->failed()) {
            if ($response->status() === 401) {
                session()->forget(['admin_access_token', 'admin_refresh_token', 'admin_user']);
            }

            return response()->json(['message' => $this->errorMessage($response->json(), $response->status())], $response->status());
        }

        $body = $response->json();
        $category = data_get($body, 'category') ?? data_get($body, 'data.category') ?? data_get($body, 'data') ?? $body;
        $id = data_get($category, 'id') ?? data_get($category, 'Id') ?? data_get($body, 'id') ?? data_get($body, 'Id');
        $name = data_get($category, 'name') ?? data_get($category, 'Name') ?? data_get($body, 'name') ?? data_get($body, 'Name') ?? $validated['Name'];

        $result = [
            'id' => $id,
            'name' => $name,
            'refresh' => ! $id,
        ];

        return $request->expectsJson()
            ? response()->json($result, 201)
            : back()->with('status', 'Category created successfully.');
    }

    private function apiFailure(Request $request, int $status, mixed $body): RedirectResponse
    {
        if ($status === 401) {
            session()->forget(['admin_access_token', 'admin_refresh_token', 'admin_user']);

            return redirect()->route('login')->withErrors([
                'email' => 'Your admin session was rejected by the API. Please sign in again.',
            ]);
        }

        $message = $this->errorMessage($body, $status);
        return back()->withErrors(['api' => $message])->withInput($request->except('images') + ['_product_form' => 1]);
    }

    private function errorMessage(mixed $body, int $status): string
    {
        $message = data_get($body, 'message') ?? data_get($body, 'title');
        if (! is_string($message) || $message === '') {
            $validationErrors = data_get($body, 'errors', []);
            $messages = collect($validationErrors)->flatten()->filter(fn ($value) => is_string($value))->all();
            $message = $messages !== [] ? implode(' ', $messages) : "The API rejected the request (HTTP {$status}).";
        }

        return $message;
    }

    private function normalizeOptions(array $options): array
    {
        $normalized = [];
        foreach ($options as $option) {
            $option = trim($option);
            if ($option !== '' && ! in_array(mb_strtolower($option), array_map('mb_strtolower', $normalized), true)) {
                $normalized[] = $option;
            }
        }

        return $normalized;
    }
}
