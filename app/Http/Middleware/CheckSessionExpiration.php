<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class CheckSessionExpiration
{
    public function handle($request, Closure $next)
    {
        // Check if user is authenticated and session has expiration time
        if (auth()->check() && Session::has('expiration_time')) {
            $expirationTime = Session::get('expiration_time');

            // Check if the session has expired
            if (now()->gt($expirationTime)) {
                // Log the user out
                auth()->logout();
                Session::flush();

                // Redirect to login page or respond with a custom message
                return redirect('/login')->with('error', 'Session expired. Please log in again.');
            }

            // Update the expiration time on each request
            Session::put('expiration_time', now()->addHour());
        }

        return $next($request);
    }
}
