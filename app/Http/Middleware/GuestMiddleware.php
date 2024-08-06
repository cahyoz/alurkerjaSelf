<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class GuestMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $userRole = Auth::user()->role;

            if ($userRole === 'admin') {
                return redirect('/admin/dashboard')->with('error', 'You are already logged in.');
            }

            if ($userRole === 'client') {
                return redirect('/dashboard')->with('error', 'You are already logged in.');
            }
        }

        return $next($request);
    }
}