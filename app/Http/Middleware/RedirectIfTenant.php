<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfTenant
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param string $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'tenant')
    {
        if (Auth::guard($guard)->check())
        {
            return redirect()->route('tenant.dashboard');
        }

        return $next($request);
    }
}
