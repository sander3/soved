<?php

namespace App\JobHunt;

class Company extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'address',
        'website',
    ];

    /**
     * Get the vacancies for the company.
     */
    public function vacancies()
    {
        return $this->hasMany('App\JobHunt\Vacancy');
    }
}
