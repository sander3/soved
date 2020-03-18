<?php

namespace App\Providers;

use App\Snapshot;
use App\Observers\SnapshotObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        Snapshot::observe(SnapshotObserver::class);
    }

    /**
     * Register any application services.
     */
    public function register()
    {
    }
}
