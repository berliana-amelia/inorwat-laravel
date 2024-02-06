<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class CheckAuth
{
    public function handle($request, Closure $next)
    {
        // Check if user session data exists
        if (Session::has('user')) {
            // User is considered authenticated based on session data
            return $next($request);
        }

        // User is not authenticated, redirect or perform any action as needed
        return redirect('/login')->with('error', 'Unauthorized access. Please log in.');
    }
}
