<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminOrUserAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // check if the user is authenticated via web guard
        if(Auth::guard('web')->check()) {
            return $next($request);
        }

        // check if the user is authenticated via admin guard
        if(Auth::guard('admin')->check()) {
            return $next($request);
        }

        return redirect()->route('login')->with('message', 'Please login to proceed');

    }
}
