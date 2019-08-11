<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVacancyLogsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('job_hunt_vacancy_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('vacancy_id');
            $table->tinyInteger('type');
            $table->text('message');
            $table->string('sender')->nullable();
            $table->string('recipient')->nullable();
            $table->string('subject')->nullable();
            $table->timestamps();

            $table->foreign('vacancy_id')
                ->references('id')->on('job_hunt_vacancies')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('job_hunt_vacancy_logs');
    }
}
