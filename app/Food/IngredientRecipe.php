<?php

namespace App\Food;

class IngredientRecipe extends Pivot
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
