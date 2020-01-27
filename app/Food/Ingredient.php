<?php

namespace App\Food;

class Ingredient extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * The recipes that belong to the ingredient.
     */
    public function recipes()
    {
        return $this->belongsToMany('App\Food\Recipe');
    }

    /**
     * The users that belong to the ingredient.
     */
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
