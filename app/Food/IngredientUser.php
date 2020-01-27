<?php

namespace App\Food;

class IngredientUser extends Pivot
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'quantity',
        'unit',
    ];
}
