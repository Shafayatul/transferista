<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('project_owner_id');
            $table->unsignedBigInteger('transferista_id')->nullable();
            $table->string('origin_address')->nullable();
            $table->string('origin_zip')->nullable();
            $table->string('origin_town')->nullable();
            $table->string('origin_country')->nullable();
            $table->string('origin_lng')->nullable();
            $table->string('origin_lat')->nullable();
            $table->string('destination_address')->nullable();
            $table->string('destination_zip')->nullable();
            $table->string('destination_town')->nullable();
            $table->string('destination_country')->nullable();
            $table->string('destination_lng')->nullable();
            $table->string('destination_lat')->nullable();
            $table->string('project_title')->nullable();
            $table->longText('project_description')->nullable();
            $table->string('project_size')->nullable();
            $table->string('project_amount')->nullable();
            $table->tinyInteger('project_status')->default(0);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('project_owner_id')->references('id')->on('users');
            $table->foreign('transferista_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
