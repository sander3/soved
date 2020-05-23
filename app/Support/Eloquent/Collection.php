<?php

namespace App\Support\Eloquent;

use Illuminate\Database\Eloquent\Collection as BaseCollection;

class Collection extends BaseCollection
{
    public function latest(string $attribute = null): self
    {
        if (is_null($attribute)) {
            $attribute = $this->first()->getCreatedAtColumn() ?? 'created_at';
        }

        return $this->sortByDesc($attribute);
    }
}
