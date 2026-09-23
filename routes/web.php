<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiTestController;

Route::get('/', function () {
    return view('welcome');
});

Route::get(
    '/api-test',
    [ApiTestController::class, 'test']
);
