<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngredientRecipeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_ingredient_recipe', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('recipe_id');
            $table->unsignedBigInteger('ingredient_id');
            $table->decimal('quantity', 6, 2);
            $table->unsignedTinyInteger('unit')->nullable();
            $table->timestamps();

            $table->foreign('recipe_id')
                ->references('id')->on('food_recipes')
                ->onDelete('cascade');

            $table->foreign('ingredient_id')
                ->references('id')->on('food_ingredients')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('food_ingredient_recipe');
    }
}
