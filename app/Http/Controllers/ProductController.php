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
        $filters = request()->validate([
            'min_price' => ['sometimes', 'nullable', 'numeric', 'min:0'],
            'max_price' => ['sometimes', 'nullable', 'numeric', 'min:0'],
            'category' => ['sometimes', 'nullable', 'string', 'max:100'],
            'categories' => ['sometimes', 'array'],
            'categories.*' => ['string', 'in:women,men,kids,shoes,bags,accessories,jewelry,essentials'],
            'price_bracket' => ['sometimes', 'nullable', 'in:under-10000,10000-25000,25000-50000,over-50000,under-15000,15000-30000,30000-60000,over-60000'],
            'brand' => ['sometimes', 'array'],
            'brand.*' => ['string', 'max:120'],
            'artisan' => ['sometimes', 'array'],
            'artisan.*' => ['string', 'max:120'],
            'size' => ['sometimes', 'array'],
            'size.*' => ['string', 'max:30'],
            'color' => ['sometimes', 'array'],
            'color.*' => ['string', 'max:80'],
            'material' => ['sometimes', 'array'],
            'material.*' => ['string', 'max:120'],
            'sustainability' => ['sometimes', 'array'],
            'sustainability.*' => ['string', 'max:120'],
            'in_stock' => ['sometimes', 'boolean'],
            'same_day' => ['sometimes', 'boolean'],
            'koko' => ['sometimes', 'boolean'],
            'min_rating' => ['sometimes', 'nullable', 'numeric', 'between:0,5'],
            'sort' => ['sometimes', 'nullable', 'in:featured,newest,price-asc,price-desc,rating,bestseller'],
        ]);

        if (isset($filters['min_price'], $filters['max_price']) && $filters['min_price'] > $filters['max_price']) {
            [$filters['min_price'], $filters['max_price']] = [$filters['max_price'], $filters['min_price']];
        }

        $response = $api->get('/api/products', [
            'page' => 1,
            'pageSize' => 100,
        ]);

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
                'filters' => $filters,
                'selectedCategory' => $category ?? ($filters['category'] ?? null),
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

        // The product service paginates at 100 items. Fetch the remaining pages
        // so all frontend filters work across the complete active catalog.
        $totalPages = (int) (data_get($payload, 'totalPages') ?? data_get($payload, 'data.totalPages') ?? 1);
        for ($page = 2; $page <= min($totalPages, 100); $page++) {
            $pageResponse = $api->get('/api/products', [
                'page' => $page, 'pageSize' => 100,
            ]);
            if ($pageResponse->failed()) break;
            $pagePayload = $pageResponse->json();
            $pageProducts = data_get($pagePayload, 'data.products') ?? data_get($pagePayload, 'products') ?? data_get($pagePayload, 'data') ?? [];
            if (! is_array($pageProducts) || $pageProducts === []) break;
            $products = array_merge($products, $pageProducts);
        }

        $selectedCategory = $category ?? ($filters['category'] ?? null);
        if ($category) {
            $products = array_values(array_filter($products, fn ($product) => $this->matchesCategory($product, $category)));
        }
        $selectedCategories = array_values(array_filter((array) ($filters['categories'] ?? [])));
        if ($selectedCategories) {
            $products = array_values(array_filter(
                $products,
                fn ($product) => collect($selectedCategories)->contains(fn ($value) => $this->matchesCategory($product, (string) $value))
            ));
        }

        $products = array_values(array_filter($products, function ($product) use ($filters) {
            $price = (float) (data_get($product, 'discountPrice') ?? data_get($product, 'DiscountPrice') ?? data_get($product, 'price') ?? data_get($product, 'Price') ?? 0);
            $stock = data_get($product, 'stock') ?? data_get($product, 'stockQuantity') ?? data_get($product, 'quantity') ?? data_get($product, 'inventory') ?? data_get($product, 'Stock');
            $rating = (float) (data_get($product, 'rating') ?? data_get($product, 'averageRating') ?? data_get($product, 'Rating') ?? 0);
            $searchable = strtolower($this->searchableProductValue([
                data_get($product, 'name'), data_get($product, 'brand'), data_get($product, 'artisan'),
                data_get($product, 'maker'), data_get($product, 'category.name'), data_get($product, 'category'),
                data_get($product, 'description'), data_get($product, 'material'), data_get($product, 'materials'),
                data_get($product, 'color'), data_get($product, 'colors'), data_get($product, 'size'), data_get($product, 'sizes'),
                data_get($product, 'tags'), data_get($product, 'attributes'),
            ]));

            if (isset($filters['min_price']) && $price < $filters['min_price']) return false;
            if (isset($filters['max_price']) && $price > $filters['max_price']) return false;
            $bracket = $filters['price_bracket'] ?? null;
            if ($bracket) {
                [$min, $max] = match ($bracket) {
                    'under-10000' => [0, 10000], '10000-25000' => [10000, 25000],
                    '25000-50000' => [25000, 50000], 'over-50000' => [50000, PHP_FLOAT_MAX],
                    'under-15000' => [0, 15000], '15000-30000' => [15000, 30000],
                    '30000-60000' => [30000, 60000], 'over-60000' => [60000, PHP_FLOAT_MAX],
                };
                if ($price < $min || $price > $max) return false;
            }
            if (!empty($filters['in_stock']) && $this->isOutOfStock($stock)) return false;
            if (isset($filters['min_rating']) && $rating < $filters['min_rating']) return false;
            if (!empty($filters['same_day']) && ! $this->isTruthy(data_get($product, 'sameDayDelivery') ?? data_get($product, 'same_day') ?? data_get($product, 'colomboSameDay'))) return false;
            if (!empty($filters['koko']) && ! $this->isTruthy(data_get($product, 'kokoEligible') ?? data_get($product, 'koko'))) return false;

            foreach (['brand' => ['brand', 'artisan'], 'artisan' => ['artisan', 'maker', 'brand'], 'size' => ['size', 'sizes', 'variants'], 'color' => ['color', 'colors'], 'material' => ['material', 'materials'], 'sustainability' => ['sustainability', 'certifications', 'tags']] as $filterKey => $fields) {
                $selected = $filters[$filterKey] ?? [];
                if (!$selected) continue;
                $values = [];
                foreach ($fields as $field) $values[] = data_get($product, $field);
                $values = strtolower($this->searchableProductValue($values));
                if (!collect($selected)->contains(fn ($value) => str_contains($values, strtolower($value)) || str_contains($searchable, strtolower($value)))) return false;
            }

            return true;
        }));

        $sort = $filters['sort'] ?? '';
        if ($sort !== '') {
            usort($products, function ($a, $b) use ($sort) {
                $priceA = (float) (data_get($a, 'discountPrice') ?? data_get($a, 'DiscountPrice') ?? data_get($a, 'price') ?? data_get($a, 'Price') ?? 0);
                $priceB = (float) (data_get($b, 'discountPrice') ?? data_get($b, 'DiscountPrice') ?? data_get($b, 'price') ?? data_get($b, 'Price') ?? 0);
                $ratingA = (float) (data_get($a, 'rating') ?? data_get($a, 'averageRating') ?? data_get($a, 'Rating') ?? 0);
                $ratingB = (float) (data_get($b, 'rating') ?? data_get($b, 'averageRating') ?? data_get($b, 'Rating') ?? 0);
                $dateA = strtotime((string) (data_get($a, 'createdAt') ?? data_get($a, 'created_at') ?? '')) ?: 0;
                $dateB = strtotime((string) (data_get($b, 'createdAt') ?? data_get($b, 'created_at') ?? '')) ?: 0;

                return match ($sort) {
                    'price-asc' => $priceA <=> $priceB,
                    'price-desc' => $priceB <=> $priceA,
                    'rating' => $ratingB <=> $ratingA,
                    'newest' => $dateB <=> $dateA,
                    'bestseller' => ((int) (data_get($b, 'salesCount') ?? data_get($b, 'sales_count') ?? 0)) <=> ((int) (data_get($a, 'salesCount') ?? data_get($a, 'sales_count') ?? 0)),
                    default => ((bool) (data_get($b, 'isFeatured') ?? data_get($b, 'featured'))) <=> ((bool) (data_get($a, 'isFeatured') ?? data_get($a, 'featured'))),
                };
            });
        }

        return view($viewName, $viewData + ['products' => $products, 'filters' => $filters, 'selectedCategory' => $selectedCategory]);
    }

    public function collections(LuvoraApiClient $api)
    {
        [$products, $unavailable] = $this->fetchAllProducts($api);

        return view('collections.index', [
            'products' => $products,
            'productsUnavailable' => $unavailable,
            'catalogTitle' => 'Collections',
            'catalogDescription' => 'Explore the curated collections of Luvora.',
        ]);
    }

    public function collection(string $slug, LuvoraApiClient $api)
    {
        [$products, $unavailable] = $this->fetchAllProducts($api);
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
            'productsUnavailable' => $unavailable,
            'catalogTitle' => ucwords($term),
            'catalogDescription' => 'Explore the ' . ucwords($term) . ' collection at Luvora.',
        ]);
    }

    public function search(Request $request, LuvoraApiClient $api)
    {
        $query = trim((string) $request->query('q', ''));
        [$products, $productsUnavailable] = $this->fetchAllProducts($api);

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
            'productsUnavailable' => $productsUnavailable,
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

    private function fetchAllProducts(LuvoraApiClient $api, array $query = []): array
    {
        $products = [];
        $totalPages = 1;
        $pageSize = 100;
        for ($page = 1; $page <= min($totalPages, 100); $page++) {
            try {
                $response = $api->get('/api/products', $query + ['page' => $page, 'pageSize' => $pageSize]);
            } catch (\Illuminate\Http\Client\ConnectionException) {
                return [$products, true];
            }
            if ($response->failed()) return [$products, true];
            $payload = $response->json();
            $pageProducts = $this->extractProducts($payload);
            if ($page === 1) $totalPages = (int) (data_get($payload, 'totalPages') ?? data_get($payload, 'data.totalPages') ?? 1);
            $products = array_merge($products, $pageProducts);
            if ($pageProducts === []) break;
        }

        return [$products, false];
    }

    private function searchableProductValue(mixed $value): string
    {
        if (is_array($value)) {
            return implode(' ', array_map(fn ($item) => $this->searchableProductValue($item), $value));
        }

        if (is_object($value)) {
            return $this->searchableProductValue(get_object_vars($value));
        }

        if (is_scalar($value)) {
            return (string) $value;
        }

        return '';
    }

    private function isOutOfStock(mixed $stock): bool
    {
        if (is_numeric($stock)) {
            return (float) $stock < 1;
        }

        if (is_bool($stock)) {
            return ! $stock;
        }

        $status = strtolower(trim((string) $stock));

        return in_array($status, ['out of stock', 'sold out', 'unavailable', 'outofstock'], true);
    }

    private function isTruthy(mixed $value): bool
    {
        if (is_bool($value)) {
            return $value;
        }

        return is_scalar($value) && filter_var($value, FILTER_VALIDATE_BOOLEAN);
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
            // Catalogs can identify products by their numeric ID or by slug.
            // The API route is slug-oriented, so resolve IDs through the catalog
            // before requesting the detail record.
            $response = $api->get('/api/products/' . rawurlencode($slug));

            if ($response->notFound() && ctype_digit($slug)) {
                $catalogResponse = $api->get('/api/products');
                if ($catalogResponse->successful()) {
                    $product = collect($this->extractProducts($catalogResponse->json()))
                        ->first(fn ($item) => (string) (data_get($item, 'id') ?? data_get($item, 'Id') ?? data_get($item, 'productId') ?? data_get($item, 'ProductId')) === $slug);
                    $resolvedSlug = data_get($product, 'slug') ?? data_get($product, 'Slug') ?? data_get($product, 'id') ?? data_get($product, 'Id');
                    if ($resolvedSlug !== null && (string) $resolvedSlug !== $slug) {
                        $response = $api->get('/api/products/' . rawurlencode((string) $resolvedSlug));
                        $slug = (string) $resolvedSlug;
                    }
                }
            }
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

        // Some APIs wrap product detail responses as a one-item list.
        if (is_array($product) && array_is_list($product) && isset($product[0])) {
            $product = $product[0];
        }

        if (! is_array($product) && ! is_object($product)) {
            abort(404);
        }

        $inventory = null;
        $inventoryUnavailable = false;
        $productId = data_get($product, 'id') ?? data_get($product, 'Id');
        if ($productId) {
            try {
                $inventoryResponse = $api->get('/api/inventory/' . rawurlencode((string) $productId));
                if ($inventoryResponse->successful()) {
                    $inventoryPayload = $inventoryResponse->json();
                    $inventory = data_get($inventoryPayload, 'data.inventory')
                        ?? data_get($inventoryPayload, 'inventory')
                        ?? data_get($inventoryPayload, 'data')
                        ?? $inventoryPayload;
                } elseif (! $inventoryResponse->notFound()) {
                    $inventoryUnavailable = true;
                }
            } catch (ConnectionException) {
                $inventoryUnavailable = true;
            }
        }

        $recentlyViewed = array_values(array_filter(
            session('recently_viewed_products', []),
            fn ($viewedSlug) => $viewedSlug !== $slug
        ));
        array_unshift($recentlyViewed, $slug);
        session()->put('recently_viewed_products', array_slice($recentlyViewed, 0, 12));

        return view(
            'products.show',
            ['product' => $product, 'productUnavailable' => false, 'slug' => $slug,
                'inventory' => is_array($inventory) ? $inventory : null,
                'inventoryUnavailable' => $inventoryUnavailable]
        );
    }
}
