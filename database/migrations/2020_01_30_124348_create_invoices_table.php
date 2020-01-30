<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('company_or_customer_id')->nullable();
            $table->unsignedBigInteger('transferista_id')->nullable();
            $table->unsignedBigInteger('project_id')->nullable();
            $table->string('amount')->nullable();
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
        Schema::dropIfExists('invoices');
    }
}
