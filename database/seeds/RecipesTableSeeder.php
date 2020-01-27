<?php

use App\Food\Recipe;
use App\Food\Ingredient;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class RecipesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $recipes = factory(Recipe::class, 5)->create();
        $ingredients = factory(Ingredient::class, 20)->create();

        $recipes->each(function (Recipe $recipe) use ($ingredients, $faker) {
            $ingredients->random(rand(3, 5))->each(function (Ingredient $ingredient) use ($recipe, $faker) {
                $recipe->ingredients()->attach($ingredient, [
                    'quantity' => $faker->randomFloat(2, 15, 1000),
                    'unit'     => 1,
                ]);
            });
        });
    }
}
