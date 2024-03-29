<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class RedirectIfNotAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param string $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'admin')
    {
        if (!Auth::guard($guard)->check())
        {
            return redirect()->route('admin.login');
        }

        return $next($request);
    }
}
