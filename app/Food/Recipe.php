<?php

namespace App\Food;

class Recipe extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
    ];

    /**
     * The ingredients that belong to the recipe.
     */
    public function ingredients()
    {
        return $this->belongsToMany('App\Food\Ingredient')
            ->using(IngredientRecipe::class)
            ->withPivot([
                'quantity', 'unit',
            ])
            ->withTimestamps();
    }
}
