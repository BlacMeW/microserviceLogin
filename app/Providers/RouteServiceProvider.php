<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\VerifyCsrfToken;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Define your route model bindings, pattern filters, etc.
     */
    public function boot()
    {
        $this->routes(function () {
            // Web Routes
            Route::middleware(['web', VerifyCsrfToken::class]) // Add CSRF middleware here
                ->group(base_path('routes/web.php'));

            // API Routes
            Route::middleware(['api' , VerifyCsrfToken::class])
                ->prefix('api')
                ->group(base_path('routes/api.php'));
        });
    }
}
