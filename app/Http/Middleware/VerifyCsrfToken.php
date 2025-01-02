<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * URIs to exclude from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        '/api/*', // Disable CSRF for all API routes
        '/protected-route', // Specific route
    ];
}
