<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsActive
{
    /**
     * Guard placeholder for future account-status enforcement. No active flag
     * exists on the users table yet, so any authenticated user is allowed
     * through; once a status column is introduced this is where it should be
     * checked.
     */
    public function handle(Request $request, Closure $next): Response
    {
        return $next($request);
    }
}
