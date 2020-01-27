<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Food\Ingredient;
use Faker\Generator as Faker;

$factory->define(Ingredient::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
    ];
});
