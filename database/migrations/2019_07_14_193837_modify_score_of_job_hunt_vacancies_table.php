<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyScoreOfJobHuntVacanciesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->dropColumn();

        Schema::table('job_hunt_vacancies', function (Blueprint $table) {
            $table
                ->decimal('score', 2, 1)
                ->storedAs('(age_score + culture_score + requirements_score + stack_score + IF(remote, 5, 1)) / 5')
                ->after('stack_score');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->dropColumn();

        Schema::table('job_hunt_vacancies', function (Blueprint $table) {
            $table
                ->tinyInteger('score')
                ->storedAs('(age_score + culture_score + requirements_score + stack_score + IF(remote, 5, 1)) / 5')
                ->after('stack_score');
        });
    }

    public function dropColumn()
    {
        Schema::table('job_hunt_vacancies', function (Blueprint $table) {
            $table->dropColumn('score');
        });
    }
}
