<?php

use App\User;
use App\Food\Recipe;
use Illuminate\Database\Eloquent\Builder;

Route::get('/', function () {
    $user = User::first();

    $inventory = $user->ingredients;

    $recipes = Recipe::query()
        ->with('ingredients')
        ->whereDoesntHave('ingredients', function (Builder $query) use ($inventory) {
            $query
                ->whereNotIn('ingredients.id', $inventory->pluck('id'));
        })
        ->get();

    dd($recipes);
});
