<?php

namespace App\Repositories\Contracts;

use App\Support\Eloquent\Collection;

interface PackageRepository
{
    public function getLatestInRandomOrder(int $limit): Collection;
}
