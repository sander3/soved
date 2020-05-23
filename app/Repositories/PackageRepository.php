<?php

namespace App\Repositories;

use App\Package;
use App\Support\Eloquent\Collection;
use App\Repositories\Contracts\PackageRepository as PackageRepositoryContract;

class PackageRepository implements PackageRepositoryContract
{
    public function getLatestInRandomOrder(int $limit): Collection
    {
        return Package::inRandomOrder()->take($limit)->get()->latest();
    }
}
