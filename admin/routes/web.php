<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/', '/dashboard');

// The admin dashboard stays behind the authentication flow that will be added later.
Route::middleware('guest')->group(function (): void {
    Route::get('/login', [App\Http\Controllers\AdminSecurityController::class, 'showLogin'])->name('login');
    Route::post('/login', [App\Http\Controllers\AdminSecurityController::class, 'login'])->name('login.store');
});

Route::middleware('auth')->group(function (): void {
    Route::view('/dashboard', 'dashboard.index')->name('dashboard');
    Route::view('/reports', 'reports.index')->name('reports.index');
    Route::view('/settings', 'settings.index')->name('settings.index');
    Route::post('/logout', [App\Http\Controllers\AdminSecurityController::class, 'logout'])->name('logout');
    Route::view('/admin/staff', 'security.staff')->name('admin.staff');
    Route::view('/admin/roles', 'security.roles')->name('admin.roles');
    Route::view('/admin/audit-logs', 'security.audit-logs')->name('admin.audit-logs');
    Route::view('/admin/security-activity', 'security.security-activity')->name('admin.security-activity');
    Route::view('/admin/profile', 'security.profile')->name('admin.profile');
    Route::patch('/admin/profile', [App\Http\Controllers\AdminSecurityController::class, 'updateProfile'])->name('admin.profile.update');
    Route::view('/products', 'products.index')->name('products.index');
    Route::view('/inventory', 'inventory.index')->name('inventory.index');
    Route::view('/orders', 'orders.index')->name('orders.index');
    Route::view('/customers', 'customers.index')->name('customers.index');
    Route::view('/reviews', 'reviews.index')->name('reviews.index');
    Route::view('/reviews/reported', 'reviews.reported')->name('reviews.reported');
    Route::view('/support/tickets', 'support.tickets')->name('support.tickets');
    Route::view('/support/tickets/details', 'support.ticket-details')->name('support.ticket-details');
    Route::view('/support/complaints', 'support.complaints')->name('support.complaints');
    Route::view('/categories', 'categories.index')->name('categories.index');
    Route::view('/brands', 'categories.index')->name('brands.index');
    Route::view('/payments/details', 'finance.payment-details')->name('payments.details');
    Route::view('/payments/refunds', 'finance.refunds')->name('payments.refunds');
    Route::view('/payments/failed', 'finance.failed')->name('payments.failed');
    Route::view('/payments/reports', 'finance.reports')->name('payments.reports');
    Route::view('/payments', 'payments.index')->name('payments.index');
    Route::view('/delivery/assignments', 'delivery.assignments')->name('delivery.assignments');
    Route::view('/delivery/personnel', 'delivery.personnel')->name('delivery.personnel');
    Route::view('/delivery/zones', 'delivery.zones')->name('delivery.zones');
    Route::view('/delivery/failed', 'delivery.failed')->name('delivery.failed');
    Route::view('/marketing/coupons', 'marketing.coupons')->name('marketing.coupons');
    Route::view('/marketing/promotions', 'marketing.promotions')->name('marketing.promotions');
    Route::view('/marketing/campaigns', 'marketing.campaigns')->name('marketing.campaigns');
    Route::view('/marketing/banners', 'marketing.banners')->name('marketing.banners');
    Route::view('/marketing/featured', 'marketing.featured')->name('marketing.featured');
    Route::view('/delivery', 'delivery.index')->name('delivery.index');
});















