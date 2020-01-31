<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Define the routes for the application.
     */
    public function map()
    {
        // Subdomain routes
        $this->mapFoodRoutes();

        // Root domain routes
        $this->mapApiRoutes();

        $this->mapWebRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }

    /**
     * Define the "food" routes for the application.
     */
    protected function mapFoodRoutes()
    {
        $host = $this->generateSubdomainHost('food');

        Route::name('food.')
             ->domain($host)
             ->middleware('food.web')
             ->namespace($this->namespace)
             ->group(base_path('routes/food.php'));
    }

    private function generateSubdomainHost(string $subdomain): string
    {
        $url = $this->app->config['app']['url'];

        $host = parse_url($url)['host'];

        return "$subdomain.$host";
    }
}
