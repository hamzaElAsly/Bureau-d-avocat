<?php

namespace App\Support;

class AuthRedirect
{
    /**
     * Resolve where an already-authenticated user should be sent when they
     * hit a "guest-only" page (login / register). With no role system wired
     * in yet, every authenticated user lands on the dashboard ("/").
     */
    public static function path($user = null): string
    {
        return '/';
    }
}
