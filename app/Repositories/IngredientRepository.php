<?php

namespace App\Repositories;

use App\User;
use App\Food\Ingredient;
use App\Food\IngredientUser;

class IngredientRepository
{
    public function attachOrIncrement(User $user, Ingredient $ingredient, int $quantity): bool
    {
        $ingredientUser = IngredientUser::firstOrNew([
            'user_id'       => $user->id,
            'ingredient_id' => $ingredient->id,
        ]);

        $ingredientUser->incrementQuantity($quantity);

        return $ingredientUser->save();
    }
}
