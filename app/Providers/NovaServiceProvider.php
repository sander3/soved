<?php

namespace App\Providers;

use Laravel\Nova\Nova;
use Illuminate\Support\Facades\Gate;
use Spatie\NovaTranslatable\Translatable;
use Laravel\Nova\NovaApplicationServiceProvider;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        parent::boot();

        $availableLocales = [
            config('app.locale'),
            config('app.fallback_locale'),
        ];

        Translatable::defaultLocales($availableLocales);
    }

    /**
     * Register the Nova routes.
     */
    protected function routes()
    {
        Nova::routes()
            ->withAuthenticationRoutes('nova.web')
        // ->withPasswordResetRoutes()
            ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     */
    protected function gate()
    {
        Gate::define('viewNova', function ($user) {
            return in_array($user->email, [
                'sander@tutanota.de',
            ]);
        });
    }

    /**
     * Get the cards that should be displayed on the Nova dashboard.
     *
     * @return array
     */
    protected function cards()
    {
        return [];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [];
    }

    /**
     * Register the application's Nova resources.
     */
    protected function resources()
    {
        parent::resources();

        Nova::resourcesIn(app_path('JobHunt/Nova'));
    }

    /**
     * Register any application services.
     */
    public function register()
    {
    }
}
