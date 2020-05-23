<?php

namespace App;

use Carbon\Carbon;
use App\Support\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'github_id',
        'name',
        'topics',
        'description',
        'html_url',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'topics' => 'array',
    ];

    public function newCollection(array $models = []): Collection
    {
        return new Collection($models);
    }

    /**
     * Set the package's created at timestamp.
     *
     * @param string $value
     */
    public function setCreatedAtAttribute($value)
    {
        $this->attributes['created_at'] = Carbon::parse($value);
    }

    /**
     * Set the package's updated at timestamp.
     *
     * @param string $value
     */
    public function setUpdatedAtAttribute($value)
    {
        $this->attributes['updated_at'] = Carbon::parse($value);
    }

    public function isNew(): bool
    {
        return $this->created_at->diffInMonths() < 6;
    }
}
