<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RequireAdminApiSession
{
    public function handle(Request $request, Closure $next): Response
    {
        if (! is_string(session('admin_access_token')) || session('admin_access_token') === '') {
            return redirect()->guest(route('login'));
        }

        return $next($request);
    }
}
