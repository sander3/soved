<?php

namespace App\Providers;

use App\Snapshot;
use App\Observers\MediaObserver;
use App\Observers\SnapshotObserver;
use App\Repositories\PackageRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\CachedPackageRepository;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use App\Repositories\Contracts\PackageRepository as PackageRepositoryContract;

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
        $this->app->singleton(PackageRepositoryContract::class, fn () => new CachedPackageRepository(new PackageRepository()));

        $pushoverConfig = array_values($this->app->config['services']['pushover']);
        $this->app->singleton(PushoverRepositoryContract::class, fn () => new PushoverRepository(...$pushoverConfig));
    }
}
