<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class AddExpirationHour
{
    public function handle($request, Closure $next)
    {
        // Check if the user is authenticated
        if (auth()->check()) {
            // Set expiration time for the session (1 hour)
            $expirationTime = now()->addHour();
            Session::put('expiration_time', $expirationTime);
        }

        return $next($request);
    }
}
