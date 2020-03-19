<?php

namespace App\Providers;

use App\Snapshot;
use App\Observers\MediaObserver;
use App\Observers\SnapshotObserver;
use Illuminate\Support\ServiceProvider;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        Snapshot::observe(SnapshotObserver::class);

        Media::observe(MediaObserver::class);
    }

    /**
     * Register any application services.
     */
    public function register()
    {
    }
}
