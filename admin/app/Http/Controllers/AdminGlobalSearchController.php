<?php

namespace App\Http\Controllers;

use App\Services\LuvoraAdminApiClient;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Http\Client\ConnectionException;

class AdminGlobalSearchController extends Controller
{
    public function __invoke(Request $request, LuvoraAdminApiClient $api): JsonResponse
    {
        $query = trim((string) $request->query('q', ''));
        if (Str::length($query) < 2) {
            return response()->json(['results' => ['Products' => [], 'Orders' => [], 'Customers' => []], 'errors' => []]);
        }

        $token = (string) $request->session()->get('admin_access_token', '');
        $results = ['Products' => [], 'Orders' => [], 'Customers' => []];
        $errors = [];
        $searches = [
            'Products' => ['/api/admin/products', ['search' => $query, 'page' => 1, 'pageSize' => 5]],
            'Orders' => ['/api/admin/orders', ['orderNumber' => $query, 'page' => 1, 'pageSize' => 5]],
            'Customers' => ['/api/admin/customers', ['search' => $query, 'page' => 1, 'pageSize' => 5]],
        ];

        foreach ($searches as $category => [$endpoint, $parameters]) {
            try {
                $response = $api->request('GET', $endpoint, $token, $parameters);
                if (! $response->successful()) {
                    $errors[] = $category;
                    continue;
                }

                $payload = $response->json();
                $rows = data_get($payload, match ($category) {
                    'Products' => 'products',
                    'Orders' => 'orders',
                    default => 'customers',
                }, []);
                if (! is_array($rows)) continue;

                foreach ($rows as $row) {
                    if (! is_array($row)) continue;
                    $id = data_get($row, 'id') ?? data_get($row, 'Id');
                    if (! is_string($id) || ! preg_match('/^[0-9a-fA-F-]{36}$/', $id)) continue;

                    if ($category === 'Products') {
                        $name = data_get($row, 'name') ?? data_get($row, 'Name') ?? 'Product';
                        $detail = data_get($row, 'sku') ?? data_get($row, 'SKU') ?? 'SKU unavailable';
                        $url = route('products.index', ['productId' => $id]);
                    } elseif ($category === 'Orders') {
                        $name = data_get($row, 'orderNumber') ?? data_get($row, 'OrderNumber') ?? 'Order';
                        $detail = Str::upper((string) (data_get($row, 'status') ?? data_get($row, 'Status') ?? 'Status unavailable'));
                        $url = route('orders.index', ['orderId' => $id]);
                    } else {
                        $first = data_get($row, 'firstName') ?? data_get($row, 'FirstName') ?? '';
                        $last = data_get($row, 'lastName') ?? data_get($row, 'LastName') ?? '';
                        $name = trim($first.' '.$last) ?: 'Customer';
                        $detail = data_get($row, 'email') ?? data_get($row, 'Email') ?? 'Email unavailable';
                        $url = route('customers.index', ['customerId' => $id]);
                    }

                    $results[$category][] = [
                        'label' => Str::limit((string) $name, 100),
                        'detail' => Str::limit((string) $detail, 120),
                        'url' => $url,
                    ];
                }
            } catch (ConnectionException) {
                $errors[] = $category;
            }
        }

        return response()->json(['results' => $results, 'errors' => array_values(array_unique($errors))]);
    }
}
