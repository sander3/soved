<?php

namespace App\Traits;

use Illuminate\Support\Facades\Cache;

trait CachedRouteModelBinding
{
    public function getCacheKey($key): string
    {
        return md5(vsprintf('%s.%s.%s', [
            mb_strtolower($key),
            $this->getTable(),
            $this->getConnectionName(),
        ]));
    }

    /**
     * Retrieve the model for a bound value.
     *
     * @param mixed       $value
     * @param string|null $field
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function resolveRouteBinding($value, $field = null)
    {
        return Cache::rememberForever($this->getCacheKey($value), function () use ($value, $field) {
            return parent::resolveRouteBinding($value, $field);
        });
    }
}
