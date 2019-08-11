<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     */
    public function boot()
    {
        View::composer(
            'components.packages',
            'App\Http\ViewComposers\PackageComposer'
        );

        View::composer(
            'components.experience',
            'App\Http\ViewComposers\ExperienceComposer'
        );
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
    }
}
