<?php

namespace App\Repositories;

use App\Food\IngredientUser;

class IngredientRepository
{
    public function attachOrIncrement(int $userId, int $ingredientId, int $amount): bool
    {
        $pivot = IngredientUser::firstOrNew([
            'user_id'       => $userId,
            'ingredient_id' => $ingredientId,
        ]);

        $pivot->quantity += $amount;

        return $pivot->save();
    }
}
