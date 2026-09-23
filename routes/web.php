<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiTestController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get(
    '/api-test',
    [ApiTestController::class, 'test']
);

Route::get(
    '/login',
    [AuthController::class, 'showLogin']
);

Route::post(
    '/login',
    [AuthController::class, 'login']
)->name('login');

Route::post(
    '/logout',
    [AuthController::class, 'logout']
);

Route::get('/dashboard', function () {

    if (!session('access_token')) {
        return redirect()->route('login');
    }

    return view('dashboard');

});

Route::get(
    '/shop',
    [ProductController::class, 'index']
);

Route::get(
    '/products/{id}',
    [ProductController::class, 'show']
);
