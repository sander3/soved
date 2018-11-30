<?php

namespace App;

use Carbon\Carbon;
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

    /**
     * Set the package's created at timestamp.
     *
     * @param  string  $value
     * @return void
     */
    public function setCreatedAtAttribute($value)
    {
        $this->attributes['created_at'] = Carbon::parse($value);
    }

    /**
     * Set the package's updated at timestamp.
     *
     * @param  string  $value
     * @return void
     */
    public function setUpdatedAtAttribute($value)
    {
        $this->attributes['updated_at'] = Carbon::parse($value);
    }

    /**
     * Determine whether the package is new.
     *
     * @return bool
     */
    public function isNew()
    {
        return $this->created_at->diffInMonths() < 3;
    }
}