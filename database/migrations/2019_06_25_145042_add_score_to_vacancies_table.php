<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddScoreToVacanciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('job_hunt_vacancies', function (Blueprint $table) {
            $table
                ->tinyInteger('score')
                ->storedAs('(age_score + culture_score + requirements_score + stack_score + IF(remote, 5, 1)) / 5')
                ->after('stack_score');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('job_hunt_vacancies', function (Blueprint $table) {
            $table->dropColumn('score');
        });
    }
}
