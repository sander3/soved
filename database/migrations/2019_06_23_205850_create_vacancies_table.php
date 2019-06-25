<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVacanciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_hunt_vacancies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('company_id')->nullable();
            $table->string('title');
            $table->boolean('remote')->default(false);
            $table->string('main_language');
            $table->decimal('salary', 8, 2)->nullable();
            $table->string('url');
            $table->tinyInteger('age_score');
            $table->tinyInteger('culture_score');
            $table->tinyInteger('requirements_score');
            $table->tinyInteger('stack_score');
            $table->timestamps();

            $table->foreign('company_id')
                ->references('id')->on('job_hunt_companies')
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
        Schema::dropIfExists('job_hunt_vacancies');
    }
}
