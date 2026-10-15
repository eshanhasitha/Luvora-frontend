<?php

namespace App\Http\Controllers;

use App\Services\LuvoraAdminApiClient;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class AdminApiPageController extends Controller
{
    private const PAGES = [
        'profile' => ['view' => 'security.profile', 'title' => 'Admin profile', 'requests' => []],
        'settings' => ['view' => 'settings.index', 'title' => 'Settings', 'requests' => []],
        'roles' => ['view' => 'security.roles', 'title' => 'Staff roles', 'requests' => []],
        'staff' => ['view' => 'security.staff', 'title' => 'Staff accounts', 'requests' => ['staff' => ['GET', '/api/admin/staff']]],
        'audit-logs' => ['view' => 'security.audit-logs', 'title' => 'Audit logs', 'requests' => ['logs' => ['GET', '/api/admin/audit-logs']]],
        'security-activity' => ['view' => 'security.security-activity', 'title' => 'Security activity', 'requests' => ['events' => ['GET', '/api/admin/audit-logs/security-events']]],
        'reported-reviews' => ['view' => 'reviews.reported', 'title' => 'Reported reviews', 'requests' => ['reportedReviews' => ['GET', '/api/admin/reviews/reported']]],
        'support-tickets' => ['view' => 'support.tickets', 'title' => 'Support tickets', 'requests' => ['tickets' => ['GET', '/api/admin/support/tickets']]],
        'support-complaints' => ['view' => 'support.complaints', 'title' => 'Complaints', 'requests' => ['complaints' => ['GET', '/api/admin/support/complaints']]],
        'promotions' => ['view' => 'marketing.promotions', 'title' => 'Promotions', 'requests' => ['promotions' => ['GET', '/api/admin/promotions']]],
        'coupons' => ['view' => 'marketing.coupons', 'title' => 'Coupons', 'requests' => ['coupons' => ['GET', '/api/admin/promotions/coupons']]],
        'campaigns' => ['view' => 'marketing.campaigns', 'title' => 'Campaigns', 'requests' => ['campaigns' => ['GET', '/api/admin/promotions/campaigns']]],
        'banners' => ['view' => 'marketing.banners', 'title' => 'Banners', 'requests' => ['banners' => ['GET', '/api/admin/promotions/banners']]],
        'dashboard' => ['view' => 'dashboard.index', 'title' => 'Dashboard', 'requests' => [
            'summary' => ['GET', '/api/admin/dashboard/summary'],
            'salesChart' => ['GET', '/api/admin/dashboard/sales-chart'],
            'ordersChart' => ['GET', '/api/admin/dashboard/orders-chart'],
            'recentOrders' => ['GET', '/api/admin/dashboard/recent-orders'],
            'topProducts' => ['GET', '/api/admin/dashboard/top-products'],
            'lowStock' => ['GET', '/api/admin/dashboard/low-stock'],
            'pendingTasks' => ['GET', '/api/admin/dashboard/pending-tasks'],
            'revenueSummary' => ['GET', '/api/admin/dashboard/revenue-summary'],
        ]],
        'products' => ['view' => 'products.index', 'title' => 'Products', 'requests' => ['products' => ['GET', '/api/admin/products']]],
        'inventory' => ['view' => 'inventory.index', 'title' => 'Inventory', 'requests' => [
            'summary' => ['GET', '/api/admin/inventory/summary'], 'stock' => ['GET', '/api/admin/inventory/stock'],
            'lowStock' => ['GET', '/api/admin/inventory/low-stock'], 'outOfStock' => ['GET', '/api/admin/inventory/out-of-stock'],
        ]],
        'orders' => ['view' => 'orders.index', 'title' => 'Orders', 'requests' => ['orders' => ['GET', '/api/admin/orders']]],
        'customers' => ['view' => 'customers.index', 'title' => 'Customers', 'requests' => ['customers' => ['GET', '/api/admin/customers']]],
        'categories' => ['view' => 'categories.index', 'title' => 'Categories', 'requests' => ['categories' => ['GET', '/api/admin/categories']]],
        'payments' => ['view' => 'payments.index', 'title' => 'Payments', 'requests' => [
            'payments' => ['GET', '/api/admin/payments'], 'summary' => ['GET', '/api/admin/payments/summary'],
            'transactions' => ['GET', '/api/admin/payments/transactions'],
        ]],
        'delivery' => ['view' => 'delivery.index', 'title' => 'Delivery', 'requests' => [
            'summary' => ['GET', '/api/admin/delivery/summary'], 'delivery' => ['GET', '/api/admin/delivery'],
            'shipments' => ['GET', '/api/admin/delivery/shipments'],
        ]],
        'reviews' => ['view' => 'reviews.index', 'title' => 'Reviews', 'requests' => [
            'reviews' => ['GET', '/api/admin/reviews'], 'summary' => ['GET', '/api/admin/reviews/summary'],
        ]],
        'reports' => ['view' => 'reports.index', 'title' => 'Reports', 'requests' => [
            'sales' => ['GET', '/api/admin/reports/sales'], 'revenue' => ['GET', '/api/admin/reports/revenue'],
            'orders' => ['GET', '/api/admin/reports/orders'], 'products' => ['GET', '/api/admin/reports/products'],
            'inventory' => ['GET', '/api/admin/reports/inventory'], 'customers' => ['GET', '/api/admin/reports/customers'],
            'payments' => ['GET', '/api/admin/reports/payments'], 'refunds' => ['GET', '/api/admin/reports/refunds'],
            'delivery' => ['GET', '/api/admin/reports/delivery'], 'coupons' => ['GET', '/api/admin/reports/coupons'],
        ]],
    ];

    public function show(Request $request, string $page, LuvoraAdminApiClient $api): View
    {
        abort_unless(isset(self::PAGES[$page]), 404);
        $config = self::PAGES[$page];
        $token = (string) session('admin_access_token', '');
        $query = $request->query();
        if ($page === 'profile') {
            try {
                $me = $api->request('GET', '/api/admin/auth/me', $token);
                if ($me->successful()) session(['admin_user' => data_get($me->json(), 'user') ?? data_get($me->json(), 'data.user') ?? $me->json()]);
            } catch (\Illuminate\Http\Client\ConnectionException) {
                // The profile page still renders with the login response when the API is unavailable.
            }
        }
        if ($page === 'settings') {
            $section = (string) ($query['section'] ?? 'general');
            if (! preg_match('/^[a-zA-Z0-9_-]+$/', $section)) abort(404);
            $config['requests']['settings'] = ['GET', '/api/admin/settings/'.rawurlencode($section)];
        }
        $selectedId = match ($page) {
            'products' => $query['productId'] ?? null,
            'categories' => $query['categoryId'] ?? null,
            'orders' => $query['orderId'] ?? null,
            'customers' => $query['customerId'] ?? null,
            default => null,
        };
        if ($page === 'roles' && ! empty($query['staffId'])) {
            $config['requests']['roles'] = ['GET', '/api/admin/staff/'.rawurlencode((string) $query['staffId']).'/roles'];
        }
        if ($selectedId) {
            $primaryKey = match ($page) { 'products' => 'products', 'categories' => 'categories', 'orders' => 'orders', default => 'customers' };
            $config['requests'][$primaryKey.'Detail'] = ['GET', '/api/admin/'.$page.'/'.rawurlencode((string) $selectedId)];
            $config['requests'][$primaryKey.'DetailItems'] = $page === 'orders' ? ['GET', '/api/admin/orders/'.rawurlencode((string) $selectedId).'/items'] : null;
            if (! $config['requests'][$primaryKey.'DetailItems']) unset($config['requests'][$primaryKey.'DetailItems']);
        }
        $data = [];
        $errors = [];

        foreach ($config['requests'] as $key => [$method, $endpoint]) {
            try {
                $response = $api->request($method, $endpoint, $token, $query);
                if ($response->successful()) {
                    $data[$key] = $response->json();
                } else {
                    $errors[$key] = data_get($response->json(), 'message', 'The requested data could not be loaded.');
                }
            } catch (\Illuminate\Http\Client\ConnectionException) {
                $errors[$key] = 'The admin API is unavailable.';
            }
        }

        return view($config['view'], [
            'apiData' => $data,
            'apiErrors' => $errors,
            'apiPage' => $page,
            'apiPageTitle' => $config['title'],
            'adminUser' => session('admin_user', []),
        ]);
    }

    public function mutate(Request $request, LuvoraAdminApiClient $api): \Illuminate\Http\RedirectResponse
    {
        $method = strtoupper((string) $request->input('_api_method', 'POST'));
        $endpoint = (string) $request->input('_api_endpoint', '');
        abort_unless(in_array($method, ['POST', 'PUT', 'PATCH', 'DELETE'], true), 405);
        abort_unless(Str::startsWith($endpoint, '/api/admin/'), 422);
        abort_unless(! str_contains($endpoint, '..'), 422);

        try {
            $response = $api->request($method, $endpoint, (string) session('admin_access_token', ''), $request->except(['_token', '_method', '_api_method', '_api_endpoint']));
        } catch (\Illuminate\Http\Client\ConnectionException) {
            return back()->withErrors(['api' => 'The admin API is unavailable.'])->withInput();
        }

        if ($response->failed()) {
            return back()->withErrors(['api' => data_get($response->json(), 'message', 'The requested change could not be saved.')])->withInput();
        }

        return back()->with('status', data_get($response->json(), 'message', 'Changes saved.'));
    }
}
