<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        switch ($guard)
        {
            case 'admin':
            if (Auth::guard($guard)->check())
            {
                return redirect()->route('admin.dashboard');
            }
            break;
            case 'tenant':
            if (Auth::guard($guard)->check())
            {
                return redirect()->route('tenant.dashboard');
            }
            break;
            case 'owner':
            if (Auth::guard($guard)->check())
            {
                return redirect()->route('owner.dashboard');
            }
            break;
            default:
            if (Auth::guard($guard)->check())
            {
                return redirect('/home');
            }
            break;
        }

        return $next($request);
    }
}
