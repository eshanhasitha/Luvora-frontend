<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/', '/dashboard');

// The admin dashboard stays behind the authentication flow that will be added later.
Route::middleware('guest')->group(function (): void {
    Route::get('/login', [App\Http\Controllers\AdminSecurityController::class, 'showLogin'])->name('login');
    Route::post('/login', [App\Http\Controllers\AdminSecurityController::class, 'login'])->name('login.store');
});

Route::middleware('admin.api.session')->group(function (): void {
    Route::get('/admin/profile', [App\Http\Controllers\AdminApiPageController::class, 'show'])->defaults('page', 'profile')->name('admin.profile');
    Route::post('/api-action', [App\Http\Controllers\AdminApiPageController::class, 'mutate'])->name('admin.api-mutate');
    Route::get('/dashboard', [App\Http\Controllers\AdminApiPageController::class, 'show'])->defaults('page', 'dashboard')->name('dashboard');
    Route::get('/reports', [App\Http\Controllers\AdminApiPageController::class, 'show'])->defaults('page', 'reports')->name('reports.index');
    Route::get('/settings/{section?}', [App\Http\Controllers\AdminApiPageController::class, 'show'])->defaults('page', 'settings')->name('settings.index');
    Route::post('/logout', [App\Http\Controllers\AdminSecurityController::class, 'logout'])->name('logout');
    Route::get('/admin/staff', [App\Http\Controllers\AdminApiPageController::class, 'show'])->defaults('page', 'staff')->name('admin.staff');
    Route::get('/admin/roles', [App\Http\Controllers\AdminApiPageController::class, 'show'])->defaults('page', 'roles')->name('admin.roles');
    Route::get('/admin/audit-logs', [App\Http\Controllers\AdminApiPageController::class, 'show'])->defaults('page', 'audit-logs')->name('admin.audit-logs');
    Route::get('/admin/security-activity', [App\Http\Controllers\AdminApiPageController::class, 'show'])->defaults('page', 'security-activity')->name('admin.security-activity');
    Route::get('/admin/notifications', [App\Http\Controllers\AdminApiPageController::class, 'show'])->defaults('page', 'notifications')->name('admin.notifications');
    Route::patch('/admin/profile', [App\Http\Controllers\AdminSecurityController::class, 'updateProfile'])->name('admin.profile.update');
    Route::get('/products', [App\Http\Controllers\AdminApiPageController::class, 'show'])->defaults('page', 'products')->name('products.index');
    Route::get('/inventory', [App\Http\Controllers\AdminApiPageController::class, 'show'])->defaults('page', 'inventory')->name('inventory.index');
    Route::get('/orders', [App\Http\Controllers\AdminApiPageController::class, 'show'])->defaults('page', 'orders')->name('orders.index');
    Route::get('/customers', [App\Http\Controllers\AdminApiPageController::class, 'show'])->defaults('page', 'customers')->name('customers.index');
    Route::get('/reviews', [App\Http\Controllers\AdminApiPageController::class, 'show'])->defaults('page', 'reviews')->name('reviews.index');
    Route::get('/reviews/reported', [App\Http\Controllers\AdminApiPageController::class, 'show'])->defaults('page', 'reported-reviews')->name('reviews.reported');
    Route::get('/support/tickets', [App\Http\Controllers\AdminApiPageController::class, 'show'])->defaults('page', 'support-tickets')->name('support.tickets');
    Route::get('/support/tickets/details', [App\Http\Controllers\AdminApiPageController::class, 'show'])->defaults('page', 'support-ticket-detail')->name('support.ticket-details');
    Route::get('/support/complaints', [App\Http\Controllers\AdminApiPageController::class, 'show'])->defaults('page', 'support-complaints')->name('support.complaints');
    Route::get('/categories', [App\Http\Controllers\AdminApiPageController::class, 'show'])->defaults('page', 'categories')->name('categories.index');
    Route::get('/brands', [App\Http\Controllers\AdminApiPageController::class, 'show'])->defaults('page', 'categories')->name('brands.index');
    Route::get('/payments/details', [App\Http\Controllers\AdminApiPageController::class, 'show'])->defaults('page', 'payment-details')->name('payments.details');
    Route::view('/payments/refunds', 'finance.refunds')->name('payments.refunds');
    Route::view('/payments/failed', 'finance.failed')->name('payments.failed');
    Route::get('/payments/reports', [App\Http\Controllers\AdminApiPageController::class, 'show'])->defaults('page', 'finance-reports')->name('payments.reports');
    Route::get('/payments', [App\Http\Controllers\AdminApiPageController::class, 'show'])->defaults('page', 'payments')->name('payments.index');
    Route::get('/delivery/assignments', [App\Http\Controllers\AdminApiPageController::class, 'show'])->defaults('page', 'delivery-assignments')->name('delivery.assignments');
    Route::view('/delivery/personnel', 'delivery.personnel')->name('delivery.personnel');
    Route::view('/delivery/zones', 'delivery.zones')->name('delivery.zones');
    Route::view('/delivery/failed', 'delivery.failed')->name('delivery.failed');
    Route::get('/marketing/coupons', [App\Http\Controllers\AdminApiPageController::class, 'show'])->defaults('page', 'coupons')->name('marketing.coupons');
    Route::get('/marketing/promotions', [App\Http\Controllers\AdminApiPageController::class, 'show'])->defaults('page', 'promotions')->name('marketing.promotions');
    Route::get('/marketing/campaigns', [App\Http\Controllers\AdminApiPageController::class, 'show'])->defaults('page', 'campaigns')->name('marketing.campaigns');
    Route::get('/marketing/banners', [App\Http\Controllers\AdminApiPageController::class, 'show'])->defaults('page', 'banners')->name('marketing.banners');
    Route::view('/marketing/featured', 'marketing.featured')->name('marketing.featured');
    Route::get('/delivery', [App\Http\Controllers\AdminApiPageController::class, 'show'])->defaults('page', 'delivery')->name('delivery.index');
});















