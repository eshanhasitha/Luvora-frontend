<?php

namespace App\Http\Controllers;

class SystemPageController extends Controller
{
    public function unauthorized()
    {
        return response()->view('errors.403', [], 403);
    }

    public function notFound()
    {
        return response()->view('errors.404', [], 404);
    }

    public function serviceUnavailable()
    {
        return response()->view('errors.503', [], 503);
    }

    public function rateLimited()
    {
        return response()->view('errors.429', [], 429);
    }

    public function serverError()
    {
        return response()->view('errors.500', [], 500);
    }

    public function offline()
    {
        return response()->view('errors.offline', [], 503);
    }

    public function sessionExpired()
    {
        return response()->view('errors.401', [], 401);
    }
}
