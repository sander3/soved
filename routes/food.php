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

Route::middleware('auth')->group(function () {
    Route::resource('inventory', 'InventoryController');
});

// Auth
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');
