<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Experience extends Model
{
    use HasTranslations;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'organization',
        'role',
        'start_year',
        'end_year',
        'logo',
    ];

    /**
     * The attributes that are translatable.
     *
     * @var array
     */
    public $translatable = [
        'role',
    ];

    /**
     * Get the experience's end year.
     *
     * @param  string  $value
     * @return string
     */
    public function getEndYearAttribute($value)
    {
        return $value ?? __('experience.now');
    }
}
