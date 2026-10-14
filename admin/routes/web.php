<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/', '/dashboard');

// The admin dashboard stays behind the authentication flow that will be added later.
Route::middleware('auth')->group(function (): void {
    Route::view('/dashboard', 'dashboard.index')->name('dashboard');
    Route::view('/products', 'products.index')->name('products.index');
    Route::view('/inventory', 'inventory.index')->name('inventory.index');
    Route::view('/orders', 'orders.index')->name('orders.index');
});


