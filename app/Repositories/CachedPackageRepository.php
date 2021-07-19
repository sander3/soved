<?php

namespace App\Repositories;

use App\Support\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;
use App\Repositories\Contracts\PackageRepository as PackageRepositoryContract;

class CachedPackageRepository implements PackageRepositoryContract
{
    protected $next;

    public function __construct(PackageRepositoryContract $next)
    {
        $this->next = $next;
    }

    public function getLatestInRandomOrder(int $limit): Collection
    {
        $cacheKey = 'packages:latest-random';

        $packages = Cache::get($cacheKey);

        if (! is_null($packages)) {
            return $packages;
        }

        $packages = $this->next->getLatestInRandomOrder($limit);

        if ($packages->isNotEmpty()) {
            Cache::put($cacheKey, $packages, now()->addDay());
        }

        return $packages;
    }
}
