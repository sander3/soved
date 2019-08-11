<?php

use App\Jobs\FetchGithubPackages;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('github_id');
            $table->text('name');
            $table->json('topics');
            $table->text('description');
            $table->text('html_url');
            $table->timestamps();
        });

        FetchGithubPackages::dispatch();
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('packages');
    }
}
