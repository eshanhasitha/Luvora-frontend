<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiTestController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductEngagementController;
use App\Http\Controllers\DiscoveryController;
use App\Http\Controllers\SystemPageController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\InformationPageController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get(
    '/api-test',
    [ApiTestController::class, 'test']
);

Route::get(
    '/login',
    [AuthController::class, 'showLogin']
)->name('login.show');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register.show');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendPasswordReset'])->name('password.email');
Route::get('/reset-password/{token}', [AuthController::class, 'showResetPassword'])->name('password.reset');
Route::post('/reset-password/{token}', [AuthController::class, 'resetPassword'])->name('password.update');

Route::get('/email/verify', [AccountController::class, 'verification'])->name('verification.notice');
Route::post('/email/verify', [AccountController::class, 'resendVerification'])->name('verification.send');
Route::get('/account', [AccountController::class, 'dashboard'])->name('account.dashboard');
Route::get('/account/profile', [AccountController::class, 'profile'])->name('account.profile');
Route::get('/account/profile/edit', [AccountController::class, 'editProfile'])->name('account.profile.edit');
Route::put('/account/profile', [AccountController::class, 'updateProfile'])->name('account.profile.update');
Route::get('/account/password', [AccountController::class, 'password'])->name('account.password');
Route::put('/account/password', [AccountController::class, 'updatePassword'])->name('account.password.update');
Route::get('/account/addresses', [AccountController::class, 'addresses'])->name('account.addresses.index');
Route::get('/account/addresses/create', [AccountController::class, 'createAddress'])->name('account.addresses.create');
Route::post('/account/addresses', [AccountController::class, 'storeAddress'])->name('account.addresses.store');
Route::get('/account/addresses/{id}/edit', [AccountController::class, 'editAddress'])->name('account.addresses.edit');
Route::put('/account/addresses/{id}', [AccountController::class, 'updateAddress'])->name('account.addresses.update');
Route::delete('/account/addresses/{id}', [AccountController::class, 'deleteAddress'])->name('account.addresses.delete');
Route::get('/account/settings', [AccountController::class, 'settings'])->name('account.settings');
Route::put('/account/settings', [AccountController::class, 'updateSettings'])->name('account.settings.update');
Route::get('/account/notifications', [AccountController::class, 'notifications'])->name('account.notifications');
Route::put('/account/notifications', [AccountController::class, 'updateNotifications'])->name('account.notifications.update');
Route::get('/account/delete', [AccountController::class, 'deleteAccount'])->name('account.delete');

Route::post(
    '/login',
    [AuthController::class, 'login']
)->name('login');

Route::post(
    '/logout',
    [AuthController::class, 'logout']
)->name('logout');

$informationPages = [
    '/customer-care/contact' => ['contact', 'customer-care.contact'],
    '/customer-care/concierge' => ['concierge', 'customer-care.concierge'],
    '/help' => ['help', 'help'],
    '/faq' => ['faq', 'faq'],
    '/customer-care/shipping' => ['shipping-info', 'customer-care.shipping'],
    '/customer-care/returns' => ['returns-info', 'customer-care.returns'],
    '/customer-care/delivery' => ['delivery-info', 'customer-care.delivery'],
    '/customer-care/colombo-express' => ['colombo-express', 'customer-care.colombo-express'],
    '/customer-care/payment' => ['payment-info', 'customer-care.payment'],
    '/customer-care/orders' => ['order-help', 'customer-care.orders'],
    '/customer-care/report-issue' => ['report-issue', 'customer-care.report-issue'],
    '/about' => ['about', 'about'],
    '/about/heritage' => ['heritage', 'about.heritage'],
    '/about/artisans' => ['artisans', 'about.artisans'],
    '/about/craftsmanship' => ['craftsmanship', 'about.craftsmanship'],
    '/about/sustainability' => ['sustainability', 'about.sustainability'],
    '/about/collections' => ['collections-story', 'about.collections'],
    '/authenticity' => ['authenticity', 'authenticity'],
    '/newsletter' => ['newsletter', 'newsletter'],
    '/newsletter/confirmation' => ['newsletter-confirmation', 'newsletter.confirmation'],
    '/offers' => ['offers', 'offers'],
    '/gift-cards' => ['gift-cards', 'gift-cards.index'],
    '/gift-cards/check-balance' => ['gift-card-balance', 'gift-cards.balance'],
    '/loyalty' => ['loyalty', 'loyalty.index'],
    '/account/rewards' => ['rewards', 'account.rewards'],
    '/referrals' => ['referrals', 'referrals.index'],
    '/privacy' => ['privacy', 'legal.privacy'],
    '/terms' => ['terms', 'legal.terms'],
    '/cookies' => ['cookies', 'legal.cookies'],
    '/policies/shipping' => ['shipping-policy', 'policies.shipping'],
    '/policies/returns' => ['returns-policy', 'policies.returns'],
    '/policies/payment' => ['payment-policy', 'policies.payment'],
    '/policies/authenticity' => ['authenticity-policy', 'policies.authenticity'],
    '/policies/warranty' => ['warranty-policy', 'policies.warranty'],
];

foreach ($informationPages as $path => [$page, $routeName]) {
    Route::get($path, [InformationPageController::class, 'show'])
        ->defaults('page', $page)
        ->name($routeName);
}

Route::post('/customer-care/contact', [InformationPageController::class, 'submitContact'])->name('customer-care.contact.submit');
Route::post('/customer-care/report-issue', [InformationPageController::class, 'submitIssue'])->name('customer-care.report-issue.submit');
Route::post('/newsletter', [InformationPageController::class, 'subscribe'])->name('newsletter.subscribe');
Route::post('/gift-cards/check-balance', [InformationPageController::class, 'checkGiftCard'])->name('gift-cards.check-balance');

Route::get('/dashboard', function () {

    if (!session('access_token')) {
        return redirect()->route('login.show');
    }

    return view('home');

})->name('dashboard');

Route::get(
    '/collections',
    [ProductController::class, 'collections']
)->name('collections.index');

Route::get('/wishlist', function () {
    return view('wishlist.index');
})->name('wishlist.index');

Route::get('/cart/saved', function () {
    return view('cart.saved');
})->name('cart.saved');

Route::get(
    '/collections/{slug}',
    [ProductController::class, 'collection']
)->name('collections.show');

Route::get(
    '/search',
    [ProductController::class, 'search']
)->name('search');

Route::get(
    '/shop',
    [ProductController::class, 'index']
)->name('shop.index');

Route::get(
    '/shop/{category}',
    [ProductController::class, 'category']
)->where('category', 'women|men|kids|shoes|bags|accessories|jewelry|essentials|new-arrivals|best-sellers|featured|sale')
    ->name('shop.category');

Route::get(
    '/products/{slug}/reviews',
    [ProductEngagementController::class, 'reviews']
)->name('products.reviews');
Route::get('/products/{slug}/reviews/create', [ProductEngagementController::class, 'createReview'])->name('products.reviews.create');
Route::post('/products/{slug}/reviews', [ProductEngagementController::class, 'storeReview'])->name('products.reviews.store');
Route::get('/products/{slug}/availability', [ProductEngagementController::class, 'availability'])->name('products.availability');
Route::get('/customer-care/size-guide', [ProductEngagementController::class, 'sizeGuide'])->name('customer-care.size-guide');
Route::get('/compare', [ProductEngagementController::class, 'compare'])->name('compare');
Route::post('/compare/items', [ProductEngagementController::class, 'addToCompare'])->name('compare.add');
Route::delete('/compare/items', [ProductEngagementController::class, 'removeFromCompare'])->name('compare.remove');
Route::get('/recently-viewed', [ProductEngagementController::class, 'recentlyViewed'])->name('recently-viewed');

Route::get('/stores', [DiscoveryController::class, 'stores'])->name('stores.index');
Route::get('/stores/{slug}', [DiscoveryController::class, 'store'])->name('stores.show');
Route::get('/gift-guide', [DiscoveryController::class, 'giftGuide'])->name('gift-guide');
Route::get('/journal', [DiscoveryController::class, 'journal'])->name('journal.index');
Route::get('/journal/{slug}', [DiscoveryController::class, 'article'])->name('journal.show');
Route::get('/sitemap', [DiscoveryController::class, 'sitemap'])->name('sitemap');

Route::get('/unauthorized', [SystemPageController::class, 'unauthorized'])->name('system.unauthorized');
Route::get('/404', [SystemPageController::class, 'notFound'])->name('system.not-found');
Route::get('/503', [SystemPageController::class, 'serviceUnavailable'])->name('system.unavailable');
Route::get('/429', [SystemPageController::class, 'rateLimited'])->name('system.rate-limited');
Route::get('/500', [SystemPageController::class, 'serverError'])->name('system.server-error');
Route::get('/offline', [SystemPageController::class, 'offline'])->name('system.offline');
Route::get('/session-expired', [SystemPageController::class, 'sessionExpired'])->name('system.session-expired');

Route::get(
    '/products/{slug}',
    [ProductController::class, 'show']
)->name('products.show');

Route::get(
    '/cart',
    [CartController::class, 'index']
)->name('cart.index');

Route::get(
    '/checkout',
    [CheckoutController::class, 'index']
)->name('checkout.index');

Route::get('/checkout/address', [CheckoutController::class, 'address'])->name('checkout.address');
Route::post('/checkout/address', [CheckoutController::class, 'saveAddress'])->name('checkout.address.save');
Route::get('/checkout/shipping', [CheckoutController::class, 'shipping'])->name('checkout.shipping');
Route::post('/checkout/shipping', [CheckoutController::class, 'saveShipping'])->name('checkout.shipping.save');
Route::get('/checkout/payment', [CheckoutController::class, 'payment'])->name('checkout.payment');
Route::post('/checkout/payment', [CheckoutController::class, 'savePayment'])->name('checkout.payment.save');
Route::get('/checkout/review', [CheckoutController::class, 'review'])->name('checkout.review');
Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');
Route::get('/checkout/failed', [CheckoutController::class, 'failed'])->name('checkout.failed');

Route::get(
    '/orders',
    [OrderController::class, 'index']
)->name('orders.index');

Route::get('/orders/track', [OrderController::class, 'track'])->name('orders.track');
Route::get('/orders/track/{orderNumber}', [OrderController::class, 'trackOrder'])->name('orders.track.show');
Route::get('/account/orders', [OrderController::class, 'index'])->name('account.orders.index');
Route::get('/account/orders/{id}', [OrderController::class, 'show'])->name('account.orders.show');
Route::get('/account/orders/{id}/cancel', [OrderController::class, 'cancel'])->name('account.orders.cancel');
Route::post('/account/orders/{id}/cancel', [OrderController::class, 'submitCancellation'])->name('account.orders.cancel.submit');
Route::get('/account/orders/{id}/return', [OrderController::class, 'returnRequest'])->name('account.orders.return');
Route::post('/account/orders/{id}/return', [OrderController::class, 'submitReturnRequest'])->name('account.orders.return.submit');
Route::get('/account/returns', [OrderController::class, 'returns'])->name('account.returns.index');
Route::get('/account/orders/{id}/invoice', [OrderController::class, 'invoice'])->name('account.orders.invoice');
