<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class RedirectIfOwner
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param string $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'owner')
    {
        if (Auth::guard($guard)->check())
        {
            return redirect()->route('owner.dashboard');
        }
        return $next($request);
    }
}
