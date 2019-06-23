<?php

namespace App\JobHunt;

class Vacancy extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'remote',
        'main_language',
        'salary',
        'url',
        'age_score',
        'culture_score',
        'requirements_score',
        'stack_score',
    ];

    /**
     * Get the company that owns the vacancy.
     */
    public function company()
    {
        return $this->belongsTo('App\JobHunt\Company');
    }
}
