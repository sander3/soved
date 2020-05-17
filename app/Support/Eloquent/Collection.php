<?php

namespace App\Support\Eloquent;

use Illuminate\Support\Collection as BaseCollection;

class Collection extends BaseCollection
{
    public function latest()
    {
        return $this->sortByDesc('created_at');
    }
}
