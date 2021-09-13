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
        Auth::shouldUse('super-user');
        if (!\auth()->guard('super-user')->check()) {
            return redirect('user/login')->withErrors('You are not authorized to login.');
        }
        return $next($request);

    }
}
