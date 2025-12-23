<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next, $role)
    {
        if (!Auth::check()) {
            return redirect()->route('login.form');
        }

        if (Auth::user()->role !== $role) {
            abort(403, 'ANDA TIDAK MEMILIKI AKSES');
        }

        return $next($request);
    }
}
