<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSoftdeletesToVacanciesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('job_hunt_vacancies', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('job_hunt_vacancies', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
