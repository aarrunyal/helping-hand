<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class SystemUser
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        Auth::shouldUse('super-admin');
        if (!\auth()->guard('super-admin')->check()) {
            return redirect('admin/login')->withErrors('You are not authorized to login.');
        }
        return $next($request);

    }
}
