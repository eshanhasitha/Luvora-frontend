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
        'settings' => ['view' => 'settings.index', 'title' => 'Settings', 'requests' => [
            'paymentSettings' => ['GET', '/api/admin/settings/payments'],
            'emailTemplates' => ['GET', '/api/admin/settings/email-templates'],
        ]],
        'roles' => ['view' => 'security.roles', 'title' => 'Roles and permissions', 'requests' => ['staff' => ['GET', '/api/admin/staff']]],
        'staff' => ['view' => 'security.staff', 'title' => 'Staff accounts', 'requests' => ['staff' => ['GET', '/api/admin/staff']]],
        'audit-logs' => ['view' => 'security.audit-logs', 'title' => 'Audit logs', 'requests' => ['logs' => ['GET', '/api/admin/audit-logs']]],
        'security-activity' => ['view' => 'security.security-activity', 'title' => 'Security activity', 'requests' => ['events' => ['GET', '/api/admin/audit-logs/security-events']]],
        'system-health' => ['view' => 'security.system-health', 'title' => 'System health', 'requests' => [
            'health' => ['GET', '/api/admin/system/health'],
            'services' => ['GET', '/api/admin/system/services'],
        ]],
        'notifications' => ['view' => 'notifications.index', 'title' => 'Notifications', 'requests' => [
            'notifications' => ['GET', '/api/admin/notifications'],
            'unreadCount' => ['GET', '/api/admin/notifications/unread-count'],
        ]],
        'reported-reviews' => ['view' => 'reviews.reported', 'title' => 'Reported reviews', 'requests' => ['reports' => ['GET', '/api/admin/reviews/reported']]],
        'support-tickets' => ['view' => 'support.tickets', 'title' => 'Support tickets', 'requests' => ['tickets' => ['GET', '/api/admin/support/tickets']]],
        'support-ticket-detail' => ['view' => 'support.ticket-details', 'title' => 'Ticket details', 'requests' => []],
        'support-complaints' => ['view' => 'support.complaints', 'title' => 'Complaints', 'requests' => ['complaints' => ['GET', '/api/admin/support/complaints']]],
        'promotions' => ['view' => 'marketing.promotions', 'title' => 'Promotions', 'requests' => [
            'promotions' => ['GET', '/api/admin/promotions'],
            'products' => ['GET', '/api/admin/products'],
        ]],
        'coupons' => ['view' => 'marketing.coupons', 'title' => 'Coupons', 'requests' => ['coupons' => ['GET', '/api/admin/promotions/coupons']]],
        'campaigns' => ['view' => 'marketing.campaigns', 'title' => 'Campaigns', 'requests' => ['campaigns' => ['GET', '/api/admin/promotions/campaigns']]],
        'banners' => ['view' => 'marketing.banners', 'title' => 'Banners', 'requests' => ['banners' => ['GET', '/api/admin/promotions/banners']]],
        'dashboard' => ['view' => 'dashboard.index', 'title' => 'Dashboard', 'requests' => [
            'summary' => ['GET', '/api/admin/dashboard/summary'],
            'salesChart' => ['GET', '/api/admin/dashboard/sales-chart'],
            'ordersChart' => ['GET', '/api/admin/dashboard/orders-chart'],
            'recentOrders' => ['GET', '/api/admin/dashboard/recent-orders'],
            'topProducts' => ['GET', '/api/admin/dashboard/top-products'],
            'revenueSummary' => ['GET', '/api/admin/dashboard/revenue-summary'],
            'stock' => ['GET', '/api/admin/inventory/stock'],
            'orders' => ['GET', '/api/admin/orders'],
            'customers' => ['GET', '/api/admin/customers'],
        ]],
        'products' => ['view' => 'products.index', 'title' => 'Products', 'requests' => [
            'products' => ['GET', '/api/admin/products'],
            'categories' => ['GET', '/api/admin/categories'],
        ]],
        'inventory' => ['view' => 'inventory.index', 'title' => 'Inventory', 'requests' => [
            'summary' => ['GET', '/api/admin/inventory/summary'],
            'stock' => ['GET', '/api/admin/inventory/stock'],
            'movements' => ['GET', '/api/admin/inventory/movements'],
            'products' => ['GET', '/api/admin/products'],
        ]],
        'orders' => ['view' => 'orders.index', 'title' => 'Orders', 'requests' => [
            'orders' => ['GET', '/api/admin/orders'],
            'customers' => ['GET', '/api/admin/customers'],
            'payments' => ['GET', '/api/admin/payments/transactions'],
            'shipments' => ['GET', '/api/admin/delivery/shipments'],
        ]],
        'customers' => ['view' => 'customers.index', 'title' => 'Customers', 'requests' => ['customers' => ['GET', '/api/admin/customers']]],
        'categories' => ['view' => 'categories.index', 'title' => 'Categories', 'requests' => ['categories' => ['GET', '/api/admin/categories']]],
        'brands' => ['view' => 'categories.index', 'title' => 'Brands', 'requests' => ['products' => ['GET', '/api/admin/products']]],
        'payments' => ['view' => 'payments.index', 'title' => 'Payments', 'requests' => [
            'payments' => ['GET', '/api/admin/payments'], 'summary' => ['GET', '/api/admin/payments/summary'],
            'transactions' => ['GET', '/api/admin/payments/transactions'],
        ]],
        'payment-details' => ['view' => 'finance.payment-details', 'title' => 'Payment details', 'requests' => [
            'transactions' => ['GET', '/api/admin/payments/transactions'],
        ]],
        'finance-reports' => ['view' => 'finance.reports', 'title' => 'Finance reports', 'requests' => [
            'sales' => ['GET', '/api/admin/reports/sales'], 'revenue' => ['GET', '/api/admin/reports/revenue'],
            'payments' => ['GET', '/api/admin/reports/payments'], 'refunds' => ['GET', '/api/admin/reports/refunds'],
        ]],
        'finance-refunds' => ['view' => 'finance.refunds', 'title' => 'Refunds', 'requests' => ['refunds' => ['GET', '/api/admin/reports/refunds']]],
        'finance-failed' => ['view' => 'finance.failed', 'title' => 'Failed payments', 'requests' => ['transactions' => ['GET', '/api/admin/payments/transactions']]],
        'delivery' => ['view' => 'delivery.index', 'title' => 'Delivery', 'requests' => [
            'summary' => ['GET', '/api/admin/delivery/summary'],
            'shipments' => ['GET', '/api/admin/delivery/shipments'],
        ]],
        'delivery-failed' => ['view' => 'delivery.failed', 'title' => 'Failed deliveries', 'requests' => ['shipments' => ['GET', '/api/admin/delivery/shipments']]],
        'delivery-assignments' => ['view' => 'delivery.assignments', 'title' => 'Delivery assignments', 'requests' => [
            'shipments' => ['GET', '/api/admin/delivery/shipments'],
        ]],
        'reviews' => ['view' => 'reviews.index', 'title' => 'Reviews', 'requests' => [
            'reviews' => ['GET', '/api/admin/reviews'],
        ]],
        'reports' => ['view' => 'reports.index', 'title' => 'Reports', 'requests' => [
            'sales' => ['GET', '/api/admin/reports/sales'],
            'revenue' => ['GET', '/api/admin/reports/revenue'],
            'orders' => ['GET', '/api/admin/reports/orders'],
            'products' => ['GET', '/api/admin/reports/products'],
            'inventory' => ['GET', '/api/admin/reports/inventory'],
            'payments' => ['GET', '/api/admin/reports/payments'],
            'customers' => ['GET', '/api/admin/reports/customers'],
        ]],
    ];

    public function show(Request $request, string $page, LuvoraAdminApiClient $api): View|RedirectResponse
    {
        abort_unless(isset(self::PAGES[$page]), 404);
        $config = self::PAGES[$page];
        $token = (string) session('admin_access_token', '');
        $query = $request->query();
        $apiQuery = $query;
        $apiQuery['page'] = filter_var($query['page'] ?? 1, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]) ?: 1;
        $apiQuery['pageSize'] = filter_var($query['pageSize'] ?? 10, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1, 'max_range' => 100]]) ?: 10;
        if ($page === 'products') {
            $apiQuery['page'] = filter_var($query['page'] ?? 1, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]) ?: 1;
            $apiQuery['pageSize'] = filter_var($query['pageSize'] ?? 100, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1, 'max_range' => 100]]) ?: 100;
        }
        if ($page === 'categories') {
            $apiQuery['page'] = 1;
            $apiQuery['pageSize'] = 100;
        }
        if ($page === 'brands') {
            $apiQuery['page'] = filter_var($query['page'] ?? 1, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]) ?: 1;
            $apiQuery['pageSize'] = filter_var($query['pageSize'] ?? 100, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1, 'max_range' => 100]]) ?: 100;
            unset($apiQuery['status']);
        }
        if ($page === 'inventory') {
            $apiQuery['page'] = filter_var($query['page'] ?? 1, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]) ?: 1;
            $apiQuery['pageSize'] = filter_var($query['pageSize'] ?? 100, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1, 'max_range' => 100]]) ?: 100;
        }
        if ($page === 'promotions') {
            $apiQuery['page'] = filter_var($query['page'] ?? 1, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]) ?: 1;
            $apiQuery['pageSize'] = filter_var($query['pageSize'] ?? 25, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1, 'max_range' => 100]]) ?: 25;
            if (isset($query['status']) && ! in_array((string) $query['status'], ['true', 'false'], true)) unset($apiQuery['status']);
        }
        if (in_array($page, ['support-tickets', 'support-complaints', 'finance-failed', 'delivery-failed'], true)) {
            $apiQuery['page'] = filter_var($query['page'] ?? 1, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]) ?: 1;
            $apiQuery['pageSize'] = filter_var($query['pageSize'] ?? 25, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1, 'max_range' => 100]]) ?: 25;
        }
        if (in_array($page, ['support-tickets', 'support-complaints'], true)) {
            $apiQuery['page'] = filter_var($query['page'] ?? 1, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]) ?: 1;
            $apiQuery['pageSize'] = filter_var($query['pageSize'] ?? 25, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1, 'max_range' => 100]]) ?: 25;
        }
        if (in_array($page, ['coupons', 'campaigns', 'banners'], true)) {
            $apiQuery['page'] = filter_var($query['page'] ?? 1, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]) ?: 1;
            $apiQuery['pageSize'] = filter_var($query['pageSize'] ?? 25, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1, 'max_range' => 100]]) ?: 25;
        }
        if ($page === 'reported-reviews') {
            $apiQuery['page'] = filter_var($query['page'] ?? 1, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]) ?: 1;
            $apiQuery['pageSize'] = filter_var($query['pageSize'] ?? 25, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1, 'max_range' => 100]]) ?: 25;
        }
        if ($page === 'finance-failed') {
            foreach (['from', 'to'] as $dateKey) {
                if (! empty($query[$dateKey]) && ! \Illuminate\Support\Carbon::hasFormat((string) $query[$dateKey], 'Y-m-d')) abort(422, 'Payment dates must use YYYY-MM-DD format.');
            }
            if (! empty($query['from']) && ! empty($query['to']) && $query['to'] < $query['from']) abort(422, 'The payment end date must not precede the start date.');
            foreach (['from', 'to'] as $dateKey) unset($apiQuery[$dateKey]);
            if (! empty($query['from'])) $apiQuery['from'] = $query['from'].'T00:00:00Z';
            if (! empty($query['to'])) $apiQuery['to'] = $query['to'].'T23:59:59Z';
        }
        if ($page === 'finance-failed') $apiQuery['status'] = 'FAILED';
        if ($page === 'delivery-failed') $apiQuery['status'] = 'FAILED';
        if ($page === 'orders') {
            $apiQuery['page'] = filter_var($query['page'] ?? 1, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]) ?: 1;
            $apiQuery['pageSize'] = filter_var($query['pageSize'] ?? 25, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1, 'max_range' => 100]]) ?: 25;
        }
        if ($page === 'payments') {
            $apiQuery['page'] = filter_var($query['page'] ?? 1, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]) ?: 1;
            $apiQuery['pageSize'] = filter_var($query['pageSize'] ?? 25, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1, 'max_range' => 100]]) ?: 25;
            if (isset($query['status']) && in_array(strtoupper((string) $query['status']), ['PENDING', 'COMPLETED', 'SUCCEEDED', 'SUCCESS', 'FAILED', 'REFUNDED'], true)) {
                $apiQuery['status'] = strtoupper((string) $query['status']);
            } else {
                unset($apiQuery['status']);
            }
            foreach (['from', 'to'] as $dateKey) {
                if (! empty($query[$dateKey]) && ! \Illuminate\Support\Carbon::hasFormat((string) $query[$dateKey], 'Y-m-d')) abort(422, 'Payment dates must use YYYY-MM-DD format.');
                unset($apiQuery[$dateKey]);
            }
            if (! empty($query['from']) && ! empty($query['to']) && $query['to'] < $query['from']) abort(422, 'The payment end date must not precede the start date.');
            if (! empty($query['from'])) $apiQuery['from'] = $query['from'].'T00:00:00Z';
            if (! empty($query['to'])) $apiQuery['to'] = $query['to'].'T23:59:59Z';
        }
        if ($page === 'reviews') {
            $apiQuery['page'] = filter_var($query['page'] ?? 1, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]) ?: 1;
            $apiQuery['pageSize'] = filter_var($query['pageSize'] ?? 25, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1, 'max_range' => 100]]) ?: 25;
            if (isset($query['status']) && in_array($query['status'], ['pending', 'approved'], true)) {
                $apiQuery['approved'] = $query['status'] === 'approved' ? 'true' : 'false';
            }
            unset($apiQuery['status'], $apiQuery['rating']);
        }
        if ($page === 'notifications') {
            $apiQuery['page'] = filter_var($query['page'] ?? 1, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]) ?: 1;
            $apiQuery['pageSize'] = filter_var($query['pageSize'] ?? 25, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1, 'max_range' => 100]]) ?: 25;
            if (isset($query['readStatus']) && in_array($query['readStatus'], ['read', 'unread'], true)) {
                $apiQuery['unread'] = $query['readStatus'] === 'unread' ? 'true' : 'false';
            }
            unset($apiQuery['readStatus'], $apiQuery['type'], $apiQuery['from'], $apiQuery['to']);
        }
        if ($page === 'delivery') {
            $apiQuery['page'] = filter_var($query['page'] ?? 1, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]) ?: 1;
            $apiQuery['pageSize'] = filter_var($query['pageSize'] ?? 25, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1, 'max_range' => 100]]) ?: 25;
        }
        if ($page === 'customers') {
            $apiQuery['page'] = filter_var($query['page'] ?? 1, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]) ?: 1;
            $apiQuery['pageSize'] = filter_var($query['pageSize'] ?? 25, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1, 'max_range' => 100]]) ?: 25;
        }
        if ($page === 'audit-logs') {
            $apiQuery['page'] = filter_var($query['page'] ?? 1, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]) ?: 1;
            $apiQuery['pageSize'] = filter_var($query['pageSize'] ?? 25, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1, 'max_range' => 200]]) ?: 25;
            if (! empty($query['actorUserId']) && ! preg_match('/^[0-9a-fA-F-]{36}$/', (string) $query['actorUserId'])) {
                abort(422, 'Actor ID must be a valid identifier.');
            }
            foreach (['from', 'to'] as $dateKey) {
                if (! empty($query[$dateKey]) && ! \Illuminate\Support\Carbon::hasFormat((string) $query[$dateKey], 'Y-m-d')) {
                    abort(422, 'Audit log dates must use YYYY-MM-DD format.');
                }
            }
            if (! empty($query['from']) && ! empty($query['to']) && $query['to'] < $query['from']) {
                abort(422, 'The audit log end date must not precede the start date.');
            }
            unset($apiQuery['search']);
            if (empty($apiQuery['actorUserId'])) unset($apiQuery['actorUserId']);
        }
        if (in_array($page, ['staff', 'roles'], true)) {
            $apiQuery['page'] = filter_var($query['page'] ?? 1, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]) ?: 1;
            $apiQuery['pageSize'] = filter_var($query['pageSize'] ?? 25, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1, 'max_range' => 100]]) ?: 25;
            if (isset($query['status']) && in_array($query['status'], ['active', 'inactive'], true)) {
                $apiQuery['active'] = $query['status'] === 'active' ? 'true' : 'false';
            }
            unset($apiQuery['status']);
        }
        if ($page === 'dashboard') {
            unset($apiQuery['page'], $apiQuery['pageSize']);
            $apiQuery['startDate'] = $query['startDate'] ?? now()->subDays(29)->toDateString();
            $apiQuery['endDate'] = $query['endDate'] ?? now()->toDateString();
            unset($apiQuery['search'], $apiQuery['metric']);
            foreach (['startDate', 'endDate'] as $dateKey) {
                if (! empty($apiQuery[$dateKey]) && ! \Illuminate\Support\Carbon::hasFormat($apiQuery[$dateKey], 'Y-m-d')) {
                    abort(422, 'Dashboard dates must use YYYY-MM-DD format.');
                }
            }
        }
        if ($page === 'reports') {
            unset($apiQuery['page'], $apiQuery['pageSize'], $apiQuery['search']);
            $apiQuery['from'] = $query['from'] ?? now('UTC')->subDays(29)->toDateString();
            $apiQuery['to'] = $query['to'] ?? now('UTC')->toDateString();
            foreach (['from', 'to'] as $dateKey) {
                if (! \Illuminate\Support\Carbon::hasFormat((string) $apiQuery[$dateKey], 'Y-m-d')) {
                    abort(422, 'Report dates must use YYYY-MM-DD format.');
                }
            }
            if ($apiQuery['to'] < $apiQuery['from']) {
                abort(422, 'The report end date must not precede the start date.');
            }
            $apiQuery['from'] .= 'T00:00:00Z';
            $apiQuery['to'] .= 'T23:59:59Z';
        }
        if ($page === 'finance-reports') {
            $apiQuery['from'] = $query['from'] ?? now('UTC')->subDays(29)->toDateString();
            $apiQuery['to'] = $query['to'] ?? now('UTC')->toDateString();
            foreach (['from', 'to'] as $dateKey) {
                if (! \Illuminate\Support\Carbon::hasFormat((string) $apiQuery[$dateKey], 'Y-m-d')) abort(422, 'Report dates must use YYYY-MM-DD format.');
            }
            if ($apiQuery['to'] < $apiQuery['from']) abort(422, 'The report end date must not precede the start date.');
            $apiQuery['from'] .= 'T00:00:00Z';
            $apiQuery['to'] .= 'T23:59:59Z';
            unset($apiQuery['page'], $apiQuery['pageSize'], $apiQuery['search']);
        }
        foreach ([
            'categoryId', 'campaignId', 'complaintId', 'couponId', 'customerId', 'deliveryId',
            'notificationId', 'orderId', 'productId', 'promotionId', 'reportType', 'reviewId',
            'staffId', 'templateId', 'ticketId', 'transactionId',
        ] as $detailParameter) {
            unset($apiQuery[$detailParameter]);
        }
        if ($page === 'settings' && ! empty($query['templateId'])) {
            abort_unless((bool) preg_match('/^[0-9a-fA-F-]{36}$/', (string) $query['templateId']), 404);
            $config['requests']['emailTemplate'] = ['GET', '/api/admin/settings/email-templates/'.rawurlencode((string) $query['templateId'])];
        }
        if (in_array($page, ['delivery', 'delivery-assignments'], true) && ! empty($query['deliveryId'])) {
            abort_unless((bool) preg_match('/^[0-9a-fA-F-]{36}$/', (string) $query['deliveryId']), 404);
            $config['requests'] = ['shipment' => ['GET', '/api/admin/delivery/shipments/'.rawurlencode((string) $query['deliveryId'])]];
        }
        if ($page === 'inventory' && ! empty($query['productId'])) {
            $config['requests']['stockDetail'] = ['GET', '/api/admin/inventory/stock/'.rawurlencode((string) $query['productId'])];
        }
        if ($page === 'products' && ! empty($query['productId'])) {
            $config['requests']['product'] = ['GET', '/api/admin/products/'.rawurlencode((string) $query['productId'])];
        }
        if ($page === 'customers' && ! empty($query['customerId'])) {
            abort_unless((bool) preg_match('/^[0-9a-fA-F-]{36}$/', (string) $query['customerId']), 404);
            $customerId = rawurlencode((string) $query['customerId']);
            $config['requests'] = [
                'customer' => ['GET', '/api/admin/customers/'.$customerId],
                'customerOrders' => ['GET', '/api/admin/orders'],
            ];
        }
        if ($page === 'orders' && ! empty($query['orderId'])) {
            $config['requests'] = [];
            $config['requests']['order'] = ['GET', '/api/admin/orders/'.rawurlencode((string) $query['orderId'])];
            $config['requests']['orderTransactions'] = ['GET', '/api/admin/payments/orders/'.rawurlencode((string) $query['orderId']).'/transactions'];
            $config['requests']['orderShipments'] = ['GET', '/api/admin/delivery/shipments'];
            if (! empty($query['customerId'])) {
                $config['requests']['customer'] = ['GET', '/api/admin/customers/'.rawurlencode((string) $query['customerId'])];
            }
        }
        if ($page === 'payments' && ! empty($query['transactionId'])) {
            abort_unless((bool) preg_match('/^[0-9a-fA-F-]{36}$/', (string) $query['transactionId']), 404);
            $config['requests'] = ['transaction' => ['GET', '/api/admin/payments/transactions/'.rawurlencode((string) $query['transactionId'])]];
        }
        if ($page === 'payment-details' && ! empty($query['transactionId'])) {
            $config['requests']['transaction'] = ['GET', '/api/admin/payments/transactions/'.rawurlencode((string) $query['transactionId'])];
        }
        if ($page === 'payments' && ! empty($query['orderId'])) {
            $config['requests']['orderTransactions'] = ['GET', '/api/admin/payments/orders/'.rawurlencode((string) $query['orderId']).'/transactions'];
        }
        if ($page === 'reviews' && ! empty($query['reviewId'])) {
            abort_unless((bool) preg_match('/^[0-9a-fA-F-]{36}$/', (string) $query['reviewId']), 404);
            $config['requests'] = ['review' => ['GET', '/api/admin/reviews/'.rawurlencode((string) $query['reviewId'])]];
        }
        if (in_array($page, ['staff', 'roles'], true) && ! empty($query['staffId'])) {
            abort_unless((bool) preg_match('/^[0-9a-fA-F-]{36}$/', (string) $query['staffId']), 404);
            $staffId = rawurlencode((string) $query['staffId']);
            $config['requests']['staffDetail'] = ['GET', '/api/admin/staff/'.$staffId];
            $config['requests']['roles'] = ['GET', '/api/admin/staff/'.$staffId.'/roles'];
        }
        if ($page === 'notifications' && ! empty($query['notificationId'])) {
            abort_unless((bool) preg_match('/^[0-9a-fA-F-]{36}$/', (string) $query['notificationId']), 404);
            $config['requests'] = ['notification' => ['GET', '/api/admin/notifications/'.rawurlencode((string) $query['notificationId'])]];
        }
        if ($page === 'support-tickets' && ! empty($query['ticketId'])) {
            $config['requests']['ticket'] = ['GET', '/api/admin/support/tickets/'.rawurlencode((string) $query['ticketId'])];
        }
        if ($page === 'support-ticket-detail' && ! empty($query['ticketId'])) {
            $config['requests']['ticket'] = ['GET', '/api/admin/support/tickets/'.rawurlencode((string) $query['ticketId'])];
            $config['requests']['messages'] = ['GET', '/api/admin/support/tickets/'.rawurlencode((string) $query['ticketId']).'/messages'];
        }
        if ($page === 'support-complaints' && ! empty($query['complaintId'])) {
            abort_unless((bool) preg_match('/^[0-9a-fA-F-]{36}$/', (string) $query['complaintId']), 404);
            $config['requests']['complaint'] = ['GET', '/api/admin/support/complaints/'.rawurlencode((string) $query['complaintId'])];
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

        foreach ($config['requests'] as $key => [$method, $endpoint]) {
            try {
                $requestQuery = $page === 'settings' ? [] : $apiQuery;
                if ($page === 'products' && $key === 'categories') {
                    $requestQuery = ['page' => 1, 'pageSize' => 100, 'status' => 'true'];
                } elseif ($page === 'promotions' && $key === 'products') {
                    $requestQuery = ['page' => 1, 'pageSize' => 100];
                } elseif ($page === 'orders' && $key === 'customers') {
                    $requestQuery = ['page' => 1, 'pageSize' => 100];
                } elseif ($page === 'orders' && $key === 'payments') {
                    $requestQuery = array_filter([
                        'page' => 1,
                        'pageSize' => 100,
                        'from' => $query['from'] ?? null,
                        'to' => $query['to'] ?? null,
                    ], static fn ($value) => $value !== null && $value !== '');
                } elseif ($page === 'orders' && $key === 'shipments') {
                    $requestQuery = ['page' => 1, 'pageSize' => 100];
                } elseif ($page === 'orders' && $key === 'orderShipments') {
                    $requestQuery = ['orderId' => $query['orderId']];
                } elseif ($page === 'customers' && $key === 'customerOrders') {
                    $requestQuery = ['customerId' => $query['customerId'], 'page' => 1, 'pageSize' => 100];
                }
                $response = $api->request($method, $endpoint, $token, $requestQuery);
                if ($response->successful()) {
                    $data[$key] = $response->json();
                    $records[$key] = $this->records($response->json());
                    if ($page !== 'dashboard') {
                        $pagination[$key] = $this->pagination($response->json(), $records[$key], $requestQuery);
                    if ($pagination[$key]['isUnpagedList'] && ! in_array($page, ['categories', 'settings'], true)) {
                            $records[$key] = array_slice($records[$key], ($pagination[$key]['page'] - 1) * $pagination[$key]['pageSize'], $pagination[$key]['pageSize']);
                        }
                    }
                    if ($page === 'profile' && $key === 'profile') {
                        session(['admin_user' => data_get($response->json(), 'user') ?? data_get($response->json(), 'data.user') ?? $response->json()]);
                    }
                } else {
                    // A 401 from an optional API section should be shown as an API error,
                    // not tear down the Laravel session for every other section.
                    $errors[$key] = $page === 'system-health'
                        ? 'The health check could not be completed.'
                        : ($page === 'audit-logs' ? 'Audit records could not be loaded.'
                        : data_get($response->json(), 'message', 'The requested data could not be loaded.'));
                }
            } catch (ConnectionException) {
                $errors[$key] = $page === 'system-health' ? 'The health check could not be reached.' : ($page === 'audit-logs' ? 'Audit records could not be reached.' : 'The admin API is unavailable.');
            }
        }

        $orderProducts = [];
        if ($page === 'orders' && isset($data['order']) && is_array($data['order'])) {
            $orderPayload = data_get($data['order'], 'data.order') ?? data_get($data['order'], 'data') ?? $data['order'];
            $seenProducts = [];
            foreach ((array) data_get($orderPayload, 'items', []) as $item) {
                $productId = data_get($item, 'productId');
                if (! is_string($productId) || ! preg_match('/^[0-9a-fA-F-]{36}$/', $productId)) {
                    continue;
                }
                $productKey = strtolower($productId);
                if (isset($seenProducts[$productKey])) continue;
                $seenProducts[$productKey] = true;
                if (count($seenProducts) > 30) break;
                try {
                    $productResponse = $api->request('GET', '/api/admin/products/'.rawurlencode($productId), $token);
                    if ($productResponse->successful()) {
                        $productPayload = $productResponse->json();
                        $orderProducts[$productKey] = data_get($productPayload, 'product') ?? data_get($productPayload, 'data.product') ?? data_get($productPayload, 'data') ?? $productPayload;
                    }
                } catch (ConnectionException) {
                    // The order item and price remain available when catalog enrichment is down.
                }
            }
        }

        return view($config['view'], [
            'apiData' => $data,
            'apiRecords' => $records,
            'apiPagination' => $pagination,
            'apiLabels' => $this->labels($page),
            'apiOrderProducts' => $orderProducts,
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

        foreach (['items', 'results', 'records', 'data', 'notifications', 'customers', 'staff', 'products', 'categories', 'orders', 'shipments', 'stock', 'payments', 'transactions', 'reviews', 'promotions', 'coupons', 'campaigns', 'banners', 'emailTemplates', 'reports', 'events', 'logs', 'tickets', 'complaints', 'points', 'series', 'chartData', 'sales', 'revenue', 'topProducts', 'recentOrders', 'lowStock', 'pendingTasks'] as $key) {
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
            'inventory' => [
                'summary' => 'inventory summary',
                'stock' => 'stock records',
                'movements' => 'stock movements',
                'products' => 'product details',
            ],
            'settings' => [
                'paymentSettings' => 'safe payment settings', 'emailTemplates' => 'email templates',
                'emailTemplate' => 'email template details',
            ],
            'customers' => ['customers' => 'customers'],
            'orders' => [
                'orders' => 'orders', 'customers' => 'customers', 'payments' => 'payment transactions',
                'shipments' => 'shipments', 'order' => 'order details', 'customer' => 'customer details',
                'orderTransactions' => 'order payment records', 'orderShipments' => 'order shipment records',
            ],
            'delivery', 'delivery-assignments' => ['shipments' => 'deliveries'],
            'payments' => ['payments' => 'payments', 'transactions' => 'transactions'],
            'orderTransactions' => ['orderTransactions' => 'order transactions'],
            'payment-details' => ['transactions' => 'transactions'],
            'finance-reports' => ['reports' => 'financial reports'],
            'notifications' => ['notifications' => 'notifications'],
            'reviews' => ['reviews' => 'reviews'],
            'categories' => ['categories' => 'categories'],
            'staff' => ['staff' => 'staff accounts'],
            'roles' => ['staff' => 'staff accounts', 'staffDetail' => 'staff account', 'roles' => 'assigned role'],
            'audit-logs' => ['logs' => 'audit logs'],
            'security-activity' => ['events' => 'security events'],
            'system-health' => ['health' => 'gateway and database health', 'services' => 'service health'],
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
            'reports' => [
                'sales' => 'sales report', 'revenue' => 'revenue report', 'orders' => 'order volume report',
                'products' => 'best-selling products report', 'inventory' => 'inventory health snapshot',
                'payments' => 'payment outcomes report', 'customers' => 'customer directory snapshot',
            ],
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

        $payload = $request->except(['_token', '_method', '_api_method', '_api_endpoint']);
        $promotionWrite = ($method === 'POST' && $endpoint === '/api/admin/promotions')
            || ($method === 'PUT' && preg_match('#^/api/admin/promotions/[0-9a-fA-F-]{36}$#', $endpoint));
        if ($promotionWrite) {
            $name = trim((string) ($payload['Name'] ?? ''));
            $type = (string) ($payload['DiscountType'] ?? '');
            $value = filter_var($payload['Value'] ?? null, FILTER_VALIDATE_FLOAT);
            $minimum = filter_var($payload['MinimumOrderAmount'] ?? 0, FILTER_VALIDATE_FLOAT);
            $usage = ($payload['UsageLimit'] ?? '') === '' ? null : filter_var($payload['UsageLimit'], FILTER_VALIDATE_INT);
            $parseDate = static function ($value) {
                if (! is_string($value) || $value === '') return null;
                try {
                    $date = \Illuminate\Support\Carbon::createFromFormat('Y-m-d\\TH:i', $value, config('app.timezone'));
                    return $date instanceof \Illuminate\Support\Carbon ? $date : null;
                }
                catch (\Throwable) { return null; }
            };
            $startsAt = $parseDate($payload['StartsAt'] ?? null);
            $endsAt = $parseDate($payload['EndsAt'] ?? null);
            $validType = in_array($type, ['Percent', 'Fixed'], true);
            if ($name === '' || ! $validType || $value === false || $value <= 0
                || ($type === 'Percent' && $value > 100) || $minimum === false || $minimum < 0
                || ($usage !== null && (! is_int($usage) || $usage <= 0))
                || ! $startsAt || ! $endsAt || $endsAt->lessThanOrEqualTo($startsAt)) {
                return back()->withErrors(['api' => 'Enter a name, valid discount value, positive optional usage limit, non-negative minimum order amount, and an end date after the start date. Percentage discounts must be between 0 and 100.'])->withInput();
            }
            $eligibleIds = $payload['EligibleProductIds'] ?? [];
            if (! is_array($eligibleIds) || count(array_filter($eligibleIds, static fn ($id) => ! is_string($id) || ! preg_match('/^[0-9a-fA-F-]{36}$/', $id))) > 0) {
                return back()->withErrors(['api' => 'Select valid eligible product IDs.'])->withInput();
            }
            $payload = [
                'Name' => $name,
                'Description' => trim((string) ($payload['Description'] ?? '')),
                'DiscountType' => $type,
                'Value' => $value,
                'StartsAt' => $startsAt->utc()->toIso8601String(),
                'EndsAt' => $endsAt->utc()->toIso8601String(),
                'MinimumOrderAmount' => $minimum,
                'EligibleProductIds' => array_values(array_unique($eligibleIds)),
                'UsageLimit' => $usage,
                'IsCombinable' => filter_var($payload['IsCombinable'] ?? false, FILTER_VALIDATE_BOOLEAN),
            ];
        }
        if ($method === 'PATCH' && preg_match('#^/api/admin/promotions/[0-9a-fA-F-]{36}/status$#', $endpoint)) {
            $payload = ['Active' => filter_var($payload['Active'] ?? false, FILTER_VALIDATE_BOOLEAN)];
        }
        $couponWrite = ($method === 'POST' && $endpoint === '/api/admin/promotions/coupons')
            || ($method === 'PUT' && preg_match('#^/api/admin/promotions/coupons/[0-9a-fA-F-]{36}$#', $endpoint));
        $campaignWrite = ($method === 'POST' && $endpoint === '/api/admin/promotions/campaigns')
            || ($method === 'PUT' && preg_match('#^/api/admin/promotions/campaigns/[0-9a-fA-F-]{36}$#', $endpoint));
        $bannerWrite = ($method === 'POST' && $endpoint === '/api/admin/promotions/banners')
            || ($method === 'PUT' && preg_match('#^/api/admin/promotions/banners/[0-9a-fA-F-]{36}$#', $endpoint));
        if ($couponWrite || $campaignWrite || $bannerWrite) {
            foreach (['StartsAt', 'EndsAt'] as $dateKey) {
                if (empty($payload[$dateKey])) {
                    $payload[$dateKey] = null;
                    continue;
                }
                try {
                    $date = \Illuminate\Support\Carbon::createFromFormat('Y-m-d\\TH:i', (string) $payload[$dateKey], config('app.timezone'));
                    $payload[$dateKey] = $date instanceof \Illuminate\Support\Carbon ? $date->utc()->toIso8601String() : $payload[$dateKey];
                } catch (\Throwable) {
                    return back()->withErrors(['api' => 'Enter valid promotion dates.'])->withInput();
                }
            }
            if ($couponWrite && empty($payload['PromotionId'])) $payload['PromotionId'] = null;
            if ($bannerWrite) $payload['IsActive'] = filter_var($payload['IsActive'] ?? false, FILTER_VALIDATE_BOOLEAN);
        }
        if ($method === 'PUT' && $endpoint === '/api/admin/settings/payments') {
            $providerName = trim((string) ($payload['providerName'] ?? ''));
            $enabled = filter_var($payload['enabled'] ?? false, FILTER_VALIDATE_BOOLEAN);
            if ($enabled && $providerName === '') {
                return back()->withErrors(['api' => 'Enter a provider name before marking the provider enabled.']);
            }
            if (Str::length($providerName) > 80) {
                return back()->withErrors(['api' => 'Provider name must be 80 characters or fewer.']);
            }
            $payload = ['Values' => [
                'providerName' => $providerName !== '' ? $providerName : null,
                'enabled' => $enabled,
            ]];
        }
        if ($method === 'PUT' && preg_match('#^/api/admin/settings/email-templates/[0-9a-fA-F-]{36}$#', $endpoint) && array_key_exists('IsActive', $payload)) {
            $payload['IsActive'] = filter_var($payload['IsActive'], FILTER_VALIDATE_BOOLEAN);
        }
        if ($method === 'PATCH' && preg_match('#^/api/admin/reviews/[0-9a-fA-F-]{36}/status$#', $endpoint)) {
            $status = strtolower((string) ($payload['Status'] ?? ''));
            abort_unless(in_array($status, ['approved', 'hidden', 'rejected'], true), 422, 'Unsupported review moderation status.');
            $payload = ['Status' => $status];
        }

        if ($method === 'PATCH' && preg_match('#^/api/admin/(?:customers|staff)/[0-9a-fA-F-]{36}/status$#', $endpoint) && array_key_exists('Active', $payload)) {
            $payload['Active'] = filter_var($payload['Active'], FILTER_VALIDATE_BOOLEAN);
        }
        if ($method === 'PATCH' && preg_match('#^/api/admin/categories/[0-9a-fA-F-]{36}/status$#', $endpoint) && array_key_exists('Active', $payload)) {
            $payload = ['Active' => filter_var($payload['Active'], FILTER_VALIDATE_BOOLEAN)];
        }

        $staffCreation = $method === 'POST' && $endpoint === '/api/admin/staff';
        $settingsMutation = $method === 'PUT' && Str::startsWith($endpoint, '/api/admin/settings/');
        try {
            $response = $api->request($method, $endpoint, (string) session('admin_access_token', ''), $payload);
        } catch (ConnectionException) {
            $redirect = back()->withErrors(['api' => 'The admin API is unavailable.']);
            return ($staffCreation || $settingsMutation) ? $redirect : $redirect->withInput();
        }

        if ($response->failed()) {
            if ($response->status() === 401) {
                session()->forget(['admin_access_token', 'admin_refresh_token', 'admin_user']);

                return redirect()->route('login')->withErrors([
                    'email' => 'Your admin session was rejected by the API. Please sign in again.',
                ]);
            }

            $body = $response->json();
            $message = data_get($body, 'message') ?? data_get($body, 'title');
            if (! is_string($message) || $message === '') {
                $messages = collect(data_get($body, 'errors', []))->flatten()->filter(fn ($value) => is_string($value))->all();
                $message = $messages !== [] ? implode(' ', $messages) : 'The API rejected the request (HTTP '.$response->status().').';
            }
            $redirect = back()->withErrors(['api' => $message]);
            return ($staffCreation || $settingsMutation) ? $redirect : $redirect->withInput();
        }

        if ($method === 'POST' && $endpoint === '/api/admin/categories') {
            return back()->with('status', 'Category created successfully. ProductService generated its unique slug.');
        }
        if ($method === 'PUT' && preg_match('#^/api/admin/categories/[0-9a-fA-F-]{36}$#', $endpoint)) {
            return back()->with('status', 'Category updated successfully. ProductService refreshed its slug.');
        }
        if ($method === 'PATCH' && preg_match('#^/api/admin/categories/[0-9a-fA-F-]{36}/status$#', $endpoint)) {
            return back()->with('status', 'Category status updated successfully.');
        }
        if ($method === 'DELETE' && preg_match('#^/api/admin/categories/[0-9a-fA-F-]{36}$#', $endpoint)) {
            return back()->with('status', 'Category deleted successfully.');
        }

        if ($staffCreation) {
            return back()->with('status', 'Staff account created. Share the initial password with the new staff member through your approved secure channel.');
        }

        if ($promotionWrite) {
            return back()->with('status', $method === 'POST' ? 'Promotion created as inactive.' : 'Promotion changes saved.');
        }

        if ($couponWrite || $campaignWrite || $bannerWrite) {
            $resource = $couponWrite ? 'coupon' : ($campaignWrite ? 'campaign' : 'banner');
            return back()->with('status', ucfirst($resource).($method === 'POST' ? ' created.' : ' changes saved.'));
        }

        if ($method === 'PATCH' && preg_match('#^/api/admin/promotions/coupons/[0-9a-fA-F-]{36}/status$#', $endpoint)) {
            $active = filter_var(data_get($response->json(), 'isActive', $payload['Active'] ?? false), FILTER_VALIDATE_BOOLEAN);
            return back()->with('status', $active ? 'Coupon activated.' : 'Coupon deactivated.');
        }

        if ($method === 'PATCH' && preg_match('#^/api/admin/promotions/[0-9a-fA-F-]{36}/status$#', $endpoint)) {
            $active = filter_var(data_get($response->json(), 'isActive', $payload['Active'] ?? false), FILTER_VALIDATE_BOOLEAN);
            return back()->with('status', $active ? 'Promotion activated.' : 'Promotion deactivated.');
        }

        if ($method === 'PATCH' && preg_match('#^/api/admin/delivery/shipments/[0-9a-fA-F-]{36}/status$#', $endpoint)) {
            $status = strtoupper((string) data_get($response->json(), 'status', data_get($payload, 'Status', 'updated')));

            return back()->with('status', 'Shipment status updated to '.str_replace('_', ' ', $status).'.');
        }

        if ($method === 'PATCH' && preg_match('#^/api/admin/reviews/[0-9a-fA-F-]{36}/status$#', $endpoint)) {
            $status = strtolower((string) data_get($response->json(), 'status', data_get($payload, 'Status', 'updated')));

            return back()->with('status', 'Review moderation status updated to '.ucfirst($status).'.');
        }

        return back()->with('status', data_get($response->json(), 'message', 'Changes saved.'));
    }
}
