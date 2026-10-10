<?php

namespace App\Http\Controllers;

use App\Services\LuvoraApiClient;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(
        LuvoraApiClient $api
    ) {
        return $this->catalog(null, $api);
    }

    public function category(
        string $category,
        LuvoraApiClient $api
    ) {
        return $this->catalog($category, $api);
    }

    private function catalog(
        ?string $category,
        LuvoraApiClient $api
    ) {
        $response = $api->get('/api/products');

        $titles = [
            'women' => 'Women',
            'men' => 'Men',
            'kids' => 'Kids',
            'shoes' => 'Shoes',
            'bags' => 'Bags',
            'accessories' => 'Accessories',
            'jewelry' => 'Jewelry',
            'essentials' => 'Essentials',
            'new-arrivals' => 'New Arrivals',
            'best-sellers' => 'Best Sellers',
            'featured' => 'Featured Products',
            'sale' => 'Sale / Offers',
        ];
        $descriptions = [
            'women' => 'Discover women’s fashion, handloom textiles, and refined island made designs.',
            'men' => 'Explore modern menswear, breathable linen, and considered everyday essentials.',
            'kids' => 'Shop comfortable, carefully made clothing and accessories for kids.',
            'shoes' => 'Find handcrafted footwear for everyday wear and special occasions.',
            'bags' => 'Explore artisan made bags in leather, handloom, and contemporary styles.',
            'accessories' => 'Complete your look with distinctive accessories from local makers.',
            'jewelry' => 'Discover Ceylon gems and thoughtfully crafted jewelry.',
            'essentials' => 'Browse versatile wardrobe essentials for life in the tropics.',
            'new-arrivals' => 'See the latest pieces added to the Luvora collection.',
            'best-sellers' => 'Shop customer favorites from across the collection.',
            'featured' => 'Explore pieces selected by the Luvora team.',
            'sale' => 'Find selected styles and current offers across the collection.',
        ];

        $viewData = [
            'catalogCategory' => $category,
            'catalogTitle' => $titles[$category] ?? 'All Collections & Catalog',
            'catalogDescription' => $descriptions[$category] ?? null,
            'productsUnavailable' => false,
        ];
        $viewName = $category ? 'shop.categories.' . $category : 'products.index';

        if ($response->failed()) {
            return view($viewName, $viewData + [
                'products' => [],
                'productsUnavailable' => true,
            ]);
        }

        $payload = $response->json();
        $products = data_get($payload, 'data.products')
            ?? data_get($payload, 'products')
            ?? data_get($payload, 'data')
            ?? $payload
            ?? [];

        if (! is_array($products)) {
            $products = [];
        }

        if ($category) {
            $products = array_values(array_filter(
                $products,
                fn ($product) => $this->matchesCategory($product, $category)
            ));
        }

        return view($viewName, $viewData + ['products' => $products]);
    }

    public function collections(LuvoraApiClient $api)
    {
        $response = $api->get('/api/products');

        return view('collections.index', [
            'products' => $response->successful() ? $this->extractProducts($response->json()) : [],
            'productsUnavailable' => $response->failed(),
            'catalogTitle' => 'Collections',
            'catalogDescription' => 'Explore the curated collections of Luvora.',
        ]);
    }

    public function collection(string $slug, LuvoraApiClient $api)
    {
        $response = $api->get('/api/products');
        $products = $response->successful() ? $this->extractProducts($response->json()) : [];
        $term = strtolower(str_replace('-', ' ', $slug));
        $products = array_values(array_filter($products, function ($product) use ($term) {
            $text = strtolower(implode(' ', array_filter([
                (string) data_get($product, 'name', ''),
                (string) (data_get($product, 'collection.name') ?? data_get($product, 'collection') ?? ''),
                (string) (data_get($product, 'category.name') ?? data_get($product, 'category') ?? ''),
                (string) data_get($product, 'description', ''),
            ])));

            return str_contains($text, $term);
        }));

        return view('collections.show', [
            'products' => $products,
            'productsUnavailable' => $response->failed(),
            'catalogTitle' => ucwords($term),
            'catalogDescription' => 'Explore the ' . ucwords($term) . ' collection at Luvora.',
        ]);
    }

    public function search(Request $request, LuvoraApiClient $api)
    {
        $query = trim((string) $request->query('q', ''));
        $response = $api->get('/api/products');
        $products = $response->successful() ? $this->extractProducts($response->json()) : [];

        if ($query !== '') {
            $terms = preg_split('/\s+/', strtolower($query), -1, PREG_SPLIT_NO_EMPTY);
            $products = array_values(array_filter($products, function ($product) use ($terms) {
                $text = strtolower(implode(' ', array_filter([
                    (string) data_get($product, 'name', ''),
                    (string) data_get($product, 'description', ''),
                    (string) (data_get($product, 'category.name') ?? data_get($product, 'category') ?? ''),
                    (string) data_get($product, 'brand', ''),
                ])));

                foreach ($terms as $term) {
                    if (! str_contains($text, $term)) {
                        return false;
                    }
                }

                return true;
            }));
        }

        return view('search.index', [
            'query' => $query,
            'products' => $products,
            'productsUnavailable' => $response->failed(),
        ]);
    }

    private function extractProducts(mixed $payload): array
    {
        $products = data_get($payload, 'data.products')
            ?? data_get($payload, 'products')
            ?? data_get($payload, 'data')
            ?? $payload
            ?? [];

        return is_array($products) ? $products : [];
    }

    private function matchesCategory(mixed $product, string $category): bool
    {
        $name = strtolower((string) data_get($product, 'name', ''));
        $categoryName = data_get($product, 'category.name')
            ?? data_get($product, 'categoryName')
            ?? data_get($product, 'category')
            ?? '';
        $tags = data_get($product, 'tags', []);
        $searchable = strtolower(implode(' ', array_filter([
            is_scalar($categoryName) ? (string) $categoryName : '',
            $name,
            is_array($tags) ? implode(' ', array_map('strval', $tags)) : (string) $tags,
        ])));

        return match ($category) {
            'women' => preg_match('/\b(women|woman)\b/', $searchable) === 1,
            'men' => preg_match('/\b(men|mens|man|mans)\b/', $searchable) === 1,
            'kids' => str_contains($searchable, 'kid') || str_contains($searchable, 'child'),
            'shoes' => str_contains($searchable, 'shoe') || str_contains($searchable, 'footwear'),
            'bags' => str_contains($searchable, 'bag'),
            'accessories' => str_contains($searchable, 'accessor'),
            'jewelry' => str_contains($searchable, 'jewel') || str_contains($searchable, 'gem'),
            'essentials' => str_contains($searchable, 'essential'),
            'new-arrivals' => (bool) (data_get($product, 'isNewArrival') ?? data_get($product, 'newArrival') ?? data_get($product, 'isNew')),
            'best-sellers' => (bool) (data_get($product, 'isBestSeller') ?? data_get($product, 'bestSeller') ?? data_get($product, 'isBestseller')),
            'featured' => (bool) (data_get($product, 'isFeatured') ?? data_get($product, 'featured')),
            'sale' => (bool) (data_get($product, 'onSale') ?? data_get($product, 'isOnSale') ?? data_get($product, 'discount')),
            default => false,
        };
    }

    public function show(
        string $slug,
        LuvoraApiClient $api
    ) {
        try {
            $response = $api->get("/api/products/{$slug}");
        } catch (ConnectionException) {
            return view('products.show', [
                'product' => ['name' => str($slug)->replace('-', ' ')->title()->toString()],
                'productUnavailable' => true,
                'slug' => $slug,
            ]);
        }

        if ($response->notFound()) {
            abort(404);
        }

        if ($response->failed()) {
            return view('products.show', [
                'product' => ['name' => str($slug)->replace('-', ' ')->title()->toString()],
                'productUnavailable' => true,
                'slug' => $slug,
            ]);
        }

        $payload = $response->json();
        $product = data_get($payload, 'data.product')
            ?? data_get($payload, 'product')
            ?? data_get($payload, 'data')
            ?? $payload;

        $recentlyViewed = array_values(array_filter(
            session('recently_viewed_products', []),
            fn ($viewedSlug) => $viewedSlug !== $slug
        ));
        array_unshift($recentlyViewed, $slug);
        session()->put('recently_viewed_products', array_slice($recentlyViewed, 0, 12));

        return view(
            'products.show',
            ['product' => $product, 'productUnavailable' => false, 'slug' => $slug]
        );
    }
}
