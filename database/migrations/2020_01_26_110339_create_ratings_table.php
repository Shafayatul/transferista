<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('rating_from')->nullable();
            $table->unsignedBigInteger('rating_to')->nullable();
            $table->unsignedBigInteger('project_id')->nullable();
            $table->string('rating')->nullable();
            $table->string('rating_text')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('company_or_customer_id')->references('id')->on('users');
            $table->foreign('transferista_id')->references('id')->on('users');
            $table->foreign('project_id')->references('id')->on('projects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ratings');
    }
}
