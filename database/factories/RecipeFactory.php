<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Food\Recipe;
use Faker\Generator as Faker;

$factory->define(Recipe::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
    ];
});
