<?php

namespace App\Http\Controllers;

use App\Services\LuvoraAdminApiClient;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class AdminApiPageController extends Controller
{
    private const PAGES = [
        'profile' => ['view' => 'security.profile', 'title' => 'Admin profile', 'requests' => ['profile' => ['GET', '/api/admin/auth/me']]],
        'settings' => ['view' => 'settings.index', 'title' => 'Settings', 'requests' => []],
        'roles' => ['view' => 'security.roles', 'title' => 'Staff roles', 'requests' => []],
        'staff' => ['view' => 'security.staff', 'title' => 'Staff accounts', 'requests' => ['staff' => ['GET', '/api/admin/staff']]],
        'audit-logs' => ['view' => 'security.audit-logs', 'title' => 'Audit logs', 'requests' => ['logs' => ['GET', '/api/admin/audit-logs']]],
        'security-activity' => ['view' => 'security.security-activity', 'title' => 'Security activity', 'requests' => ['events' => ['GET', '/api/admin/audit-logs/security-events']]],
        'notifications' => ['view' => 'notifications.index', 'title' => 'Notifications', 'requests' => [
            'notifications' => ['GET', '/api/admin/notifications'],
            'unreadCount' => ['GET', '/api/admin/notifications/unread-count'],
        ]],
        'reported-reviews' => ['view' => 'reviews.reported', 'title' => 'Reported reviews', 'requests' => []],
        'support-tickets' => ['view' => 'support.tickets', 'title' => 'Support tickets', 'requests' => ['tickets' => ['GET', '/api/admin/support/tickets']]],
        'support-ticket-detail' => ['view' => 'support.ticket-details', 'title' => 'Ticket details', 'requests' => []],
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
            'stock' => ['GET', '/api/admin/inventory/stock'],
        ]],
        'orders' => ['view' => 'orders.index', 'title' => 'Orders', 'requests' => ['orders' => ['GET', '/api/admin/orders']]],
        'customers' => ['view' => 'customers.index', 'title' => 'Customers', 'requests' => ['customers' => ['GET', '/api/admin/customers']]],
        'categories' => ['view' => 'categories.index', 'title' => 'Categories', 'requests' => ['categories' => ['GET', '/api/admin/categories']]],
        'payments' => ['view' => 'payments.index', 'title' => 'Payments', 'requests' => [
            'payments' => ['GET', '/api/admin/payments'], 'summary' => ['GET', '/api/admin/payments/summary'],
            'transactions' => ['GET', '/api/admin/payments/transactions'],
        ]],
        'payment-details' => ['view' => 'finance.payment-details', 'title' => 'Payment details', 'requests' => [
            'transactions' => ['GET', '/api/admin/payments/transactions'],
        ]],
        'finance-reports' => ['view' => 'finance.reports', 'title' => 'Finance reports', 'requests' => [
            'reports' => ['GET', '/api/admin/reports'],
        ]],
        'delivery' => ['view' => 'delivery.index', 'title' => 'Delivery', 'requests' => [
            'shipments' => ['GET', '/api/admin/delivery/shipments'],
        ]],
        'delivery-assignments' => ['view' => 'delivery.assignments', 'title' => 'Delivery assignments', 'requests' => [
            'shipments' => ['GET', '/api/admin/delivery/shipments'],
        ]],
        'reviews' => ['view' => 'reviews.index', 'title' => 'Reviews', 'requests' => [
            'reviews' => ['GET', '/api/admin/reviews'],
        ]],
        'reports' => ['view' => 'reports.index', 'title' => 'Reports', 'requests' => [
            'reports' => ['GET', '/api/admin/reports'],
        ]],
    ];

    public function show(Request $request, string $page, LuvoraAdminApiClient $api): View
    {
        abort_unless(isset(self::PAGES[$page]), 404);
        $config = self::PAGES[$page];
        $token = (string) session('admin_access_token', '');
        $query = $request->query();
        $apiQuery = $query;
        $apiQuery['page'] = filter_var($query['page'] ?? 1, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]) ?: 1;
        $apiQuery['pageSize'] = filter_var($query['pageSize'] ?? 10, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1, 'max_range' => 100]]) ?: 10;
        foreach ([
            'categoryId', 'campaignId', 'complaintId', 'couponId', 'customerId', 'deliveryId',
            'notificationId', 'orderId', 'productId', 'promotionId', 'reportType', 'reviewId',
            'staffId', 'ticketId', 'transactionId',
        ] as $detailParameter) {
            unset($apiQuery[$detailParameter]);
        }
        if ($page === 'settings') {
            $section = (string) ($query['section'] ?? 'general');
            if (! preg_match('/^[a-zA-Z0-9_-]+$/', $section)) {
                abort(404);
            }
            $config['requests']['settings'] = ['GET', '/api/admin/settings/'.rawurlencode($section)];
        }
        if ($page === 'reports' && ! empty($query['reportType'])) {
            $reportType = (string) $query['reportType'];
            if (! preg_match('/^[a-zA-Z0-9_-]+$/', $reportType)) {
                abort(404);
            }
            $config['requests']['report'] = ['GET', '/api/admin/reports/'.rawurlencode($reportType)];
        }
        if (in_array($page, ['delivery', 'delivery-assignments'], true) && ! empty($query['deliveryId'])) {
            $config['requests']['shipment'] = ['GET', '/api/admin/delivery/shipments/'.rawurlencode((string) $query['deliveryId'])];
        }
        if ($page === 'inventory' && ! empty($query['productId'])) {
            $config['requests']['stockDetail'] = ['GET', '/api/admin/inventory/stock/'.rawurlencode((string) $query['productId'])];
        }
        if ($page === 'products' && ! empty($query['productId'])) {
            $config['requests']['product'] = ['GET', '/api/admin/products/'.rawurlencode((string) $query['productId'])];
        }
        if ($page === 'customers' && ! empty($query['customerId'])) {
            $config['requests']['customer'] = ['GET', '/api/admin/customers/'.rawurlencode((string) $query['customerId'])];
        }
        if ($page === 'orders' && ! empty($query['orderId'])) {
            $config['requests']['order'] = ['GET', '/api/admin/orders/'.rawurlencode((string) $query['orderId'])];
        }
        if ($page === 'payments' && ! empty($query['transactionId'])) {
            $config['requests']['transaction'] = ['GET', '/api/admin/payments/transactions/'.rawurlencode((string) $query['transactionId'])];
        }
        if ($page === 'payment-details' && ! empty($query['transactionId'])) {
            $config['requests']['transaction'] = ['GET', '/api/admin/payments/transactions/'.rawurlencode((string) $query['transactionId'])];
        }
        if ($page === 'payments' && ! empty($query['orderId'])) {
            $config['requests']['orderTransactions'] = ['GET', '/api/admin/payments/orders/'.rawurlencode((string) $query['orderId']).'/transactions'];
        }
        if ($page === 'reviews' && ! empty($query['reviewId'])) {
            $config['requests']['review'] = ['GET', '/api/admin/reviews/'.rawurlencode((string) $query['reviewId'])];
        }
        if ($page === 'staff' && ! empty($query['staffId'])) {
            $staffId = rawurlencode((string) $query['staffId']);
            $config['requests']['staffDetail'] = ['GET', '/api/admin/staff/'.$staffId];
            $config['requests']['roles'] = ['GET', '/api/admin/staff/'.$staffId.'/roles'];
        }
        if ($page === 'notifications' && ! empty($query['notificationId'])) {
            $config['requests']['notification'] = ['GET', '/api/admin/notifications/'.rawurlencode((string) $query['notificationId'])];
        }
        if ($page === 'support-tickets' && ! empty($query['ticketId'])) {
            $config['requests']['ticket'] = ['GET', '/api/admin/support/tickets/'.rawurlencode((string) $query['ticketId'])];
        }
        if ($page === 'support-ticket-detail' && ! empty($query['ticketId'])) {
            $config['requests']['ticket'] = ['GET', '/api/admin/support/tickets/'.rawurlencode((string) $query['ticketId'])];
        }
        if ($page === 'support-complaints' && ! empty($query['complaintId'])) {
            $config['requests']['complaint'] = ['GET', '/api/admin/support/complaints/'.rawurlencode((string) $query['complaintId'])];
        }
        if ($page === 'categories' && ! empty($query['categoryId'])) {
            $config['requests']['category'] = ['GET', '/api/admin/categories/'.rawurlencode((string) $query['categoryId'])];
        }
        foreach ([
            'promotions' => ['promotionId', '/api/admin/promotions/'],
            'coupons' => ['couponId', '/api/admin/promotions/coupons/'],
            'campaigns' => ['campaignId', '/api/admin/promotions/campaigns/'],
            'banners' => ['bannerId', '/api/admin/promotions/banners/'],
        ] as $resourcePage => [$parameter, $path]) {
            if ($page === $resourcePage && ! empty($query[$parameter])) {
                $config['requests'][rtrim($resourcePage, 's').'Detail'] = ['GET', $path.rawurlencode((string) $query[$parameter])];
            }
        }
        if ($page === 'roles' && ! empty($query['staffId'])) {
            $config['requests']['roles'] = ['GET', '/api/admin/staff/'.rawurlencode((string) $query['staffId']).'/roles'];
        }
        $data = [];
        $errors = [];
        $records = [];
        $pagination = [];
        $unauthorized = false;

        foreach ($config['requests'] as $key => [$method, $endpoint]) {
            try {
                $response = $api->request($method, $endpoint, $token, $apiQuery);
                if ($response->successful()) {
                    $data[$key] = $response->json();
                    $records[$key] = $this->records($response->json());
                    $pagination[$key] = $this->pagination($response->json(), $records[$key], $query);
                    if ($pagination[$key]['isUnpagedList']) {
                        $records[$key] = array_slice($records[$key], ($pagination[$key]['page'] - 1) * $pagination[$key]['pageSize'], $pagination[$key]['pageSize']);
                    }
                    if ($page === 'profile' && $key === 'profile') {
                        session(['admin_user' => data_get($response->json(), 'user') ?? data_get($response->json(), 'data.user') ?? $response->json()]);
                    }
                } else {
                    $unauthorized = $unauthorized || $response->status() === 401;
                    $errors[$key] = data_get($response->json(), 'message', 'The requested data could not be loaded.');
                }
            } catch (ConnectionException) {
                $errors[$key] = 'The admin API is unavailable.';
            }
        }

        if ($unauthorized) {
            session()->forget(['admin_access_token', 'admin_refresh_token', 'admin_user']);

            return redirect()->route('login')->withErrors([
                'email' => 'Your admin session was rejected by the API. Please sign in again. If this continues, contact your API administrator.',
            ]);
        }

        return view($config['view'], [
            'apiData' => $data,
            'apiRecords' => $records,
            'apiPagination' => $pagination,
            'apiLabels' => $this->labels($page),
            'apiErrors' => $errors,
            'apiPage' => $page,
            'apiConfigured' => $config['requests'] !== [],
            'apiPageTitle' => $config['title'],
            'adminUser' => session('admin_user', []),
        ]);
    }

    /** Convert common collection envelopes into rows while preserving API fields. */
    private function records(mixed $payload): array
    {
        if (! is_array($payload) || $payload === []) {
            return [];
        }
        if (array_is_list($payload)) {
            return array_values(array_map(
                static fn (mixed $row): array => is_array($row) ? $row : ['value' => $row],
                $payload,
            ));
        }

        foreach (['items', 'results', 'records', 'data', 'notifications', 'customers', 'staff', 'products', 'categories', 'orders', 'shipments', 'stock', 'payments', 'transactions', 'reviews', 'promotions', 'coupons', 'campaigns', 'banners', 'reports', 'events', 'logs', 'tickets', 'complaints'] as $key) {
            if (isset($payload[$key]) && is_array($payload[$key])) {
                return $this->records($payload[$key]);
            }
        }

        return [$payload];
    }

    /** Normalize the paging metadata used by common Laravel and ASP.NET API envelopes. */
    private function pagination(mixed $payload, array $rows, array $query): array
    {
        $metaPaths = ['', 'meta', 'pagination', 'data', 'data.meta', 'data.pagination'];
        $firstValue = static function (array $keys) use ($payload, $metaPaths): mixed {
            foreach ($metaPaths as $path) {
                foreach ($keys as $key) {
                    $value = data_get($payload, ($path === '' ? '' : $path.'.').$key);
                    if ($value !== null && $value !== '') {
                        return $value;
                    }
                }
            }

            return null;
        };

        $requestedPage = filter_var($query['page'] ?? 1, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]) ?: 1;
        $requestedSize = filter_var($query['pageSize'] ?? 10, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1, 'max_range' => 100]]) ?: 10;
        $page = max(1, (int) ($firstValue(['currentPage', 'page', 'pageNumber', 'current_page']) ?? $requestedPage));
        $pageSize = max(1, min(100, (int) ($firstValue(['pageSize', 'perPage', 'page_size', 'limit']) ?? $requestedSize)));
        $total = $firstValue(['totalCount', 'totalItems', 'totalRecords', 'resultCount', 'total_count', 'total']);
        $pagesValue = $firstValue(['totalPages', 'pageCount', 'lastPage', 'total_pages', 'last_page']);
        $hasPagingMetadata = $firstValue(['currentPage', 'page', 'pageNumber', 'current_page', 'pageSize', 'perPage', 'page_size', 'limit']) !== null || $total !== null || $pagesValue !== null;
        $isUnpagedList = (is_array($payload) && array_is_list($payload))
            || count($rows) > $pageSize
            || (! $hasPagingMetadata && $requestedPage === 1 && count($rows) < $pageSize);
        if ($total === null && $isUnpagedList) {
            $total = count($rows);
        }
        $total = is_numeric($total) ? max(0, (int) $total) : null;
        $pages = is_numeric($pagesValue) ? max(1, (int) $pagesValue) : ($total === null ? null : max(1, (int) ceil($total / $pageSize)));
        $hasNextValue = $firstValue(['hasNextPage', 'hasMore', 'has_next_page', 'has_more']);
        $hasNextValue = is_bool($hasNextValue) ? $hasNextValue : filter_var($hasNextValue, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
        $hasNext = $pages !== null ? $page < $pages : ($hasNextValue ?? (data_get($payload, 'links.next') !== null || count($rows) >= $pageSize));
        $from = count($rows) === 0 ? 0 : (($page - 1) * $pageSize) + 1;
        $to = count($rows) === 0 ? 0 : $from + count($rows) - 1;

        return [
            'page' => $page,
            'pageSize' => $pageSize,
            'total' => $total,
            'from' => $from,
            'to' => $to,
            'pages' => $pages,
            'hasNext' => $hasNext,
            'isUnpagedList' => $isUnpagedList,
        ];
    }

    private function labels(string $page): array
    {
        return match ($page) {
            'products' => ['products' => 'master products'],
            'inventory' => ['stock' => 'inventory items'],
            'settings' => ['settings' => 'settings'],
            'roles' => ['roles' => 'staff roles'],
            'customers' => ['customers' => 'customers'],
            'orders' => ['orders' => 'orders'],
            'delivery', 'delivery-assignments' => ['shipments' => 'deliveries'],
            'payments' => ['payments' => 'payments', 'transactions' => 'transactions'],
            'orderTransactions' => ['orderTransactions' => 'order transactions'],
            'payment-details' => ['transactions' => 'transactions'],
            'finance-reports' => ['reports' => 'financial reports'],
            'notifications' => ['notifications' => 'notifications'],
            'reviews' => ['reviews' => 'reviews'],
            'categories' => ['categories' => 'categories'],
            'staff' => ['staff' => 'staff accounts'],
            'audit-logs' => ['logs' => 'audit logs'],
            'security-activity' => ['events' => 'security events'],
            'support-tickets' => ['tickets' => 'support tickets'],
            'support-complaints' => ['complaints' => 'complaints'],
            'promotions' => ['promotions' => 'promotions'],
            'coupons' => ['coupons' => 'coupons'],
            'campaigns' => ['campaigns' => 'campaigns'],
            'banners' => ['banners' => 'banners'],
            'recentOrders' => ['recentOrders' => 'recent orders'],
            'topProducts' => ['topProducts' => 'top products'],
            'lowStock' => ['lowStock' => 'low stock items'],
            'pendingTasks' => ['pendingTasks' => 'pending tasks'],
            'salesChart' => ['salesChart' => 'sales chart points'],
            'ordersChart' => ['ordersChart' => 'orders chart points'],
            'summary' => ['summary' => 'dashboard summary'],
            'revenueSummary' => ['revenueSummary' => 'revenue summary'],
            default => [],
        };
    }

    public function mutate(Request $request, LuvoraAdminApiClient $api): RedirectResponse
    {
        $method = strtoupper((string) $request->input('_api_method', 'POST'));
        $endpoint = (string) $request->input('_api_endpoint', '');
        abort_unless(in_array($method, ['POST', 'PUT', 'PATCH', 'DELETE'], true), 405);
        abort_unless(Str::startsWith($endpoint, '/api/admin/'), 422);
        abort_unless(! str_contains($endpoint, '..'), 422);

        try {
            $response = $api->request($method, $endpoint, (string) session('admin_access_token', ''), $request->except(['_token', '_method', '_api_method', '_api_endpoint']));
        } catch (ConnectionException) {
            return back()->withErrors(['api' => 'The admin API is unavailable.'])->withInput();
        }

        if ($response->failed()) {
            if ($response->status() === 401) {
                session()->forget(['admin_access_token', 'admin_refresh_token', 'admin_user']);

                return redirect()->route('login')->withErrors([
                    'email' => 'Your admin session was rejected by the API. Please sign in again.',
                ]);
            }

            return back()->withErrors(['api' => data_get($response->json(), 'message', 'The requested change could not be saved.')])->withInput();
        }

        return back()->with('status', data_get($response->json(), 'message', 'Changes saved.'));
    }
}
