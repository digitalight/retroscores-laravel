<?php

namespace App\Http\Middleware;

use Closure;

class IsAdmin
{
    public function handle($request, Closure $next)
    {
        if (!auth()->check() || auth()->user()->email != env('ADMIN_EMAIL', 'admin@admin.com')) {
            return redirect('/');
        }

        return $next($request);
    }
}
