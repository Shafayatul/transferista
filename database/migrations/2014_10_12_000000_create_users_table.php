<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('name');
    			$table->string('first_name')->nullable();
    			$table->string('last_name')->nullable();
          $table->string('email')->unique();
          $table->string('password');
          $table->boolean('status')->default(1);
          $table->boolean('first')->default(0);
          $table->timestamp('email_verified_at')->nullable();
          $table->softDeletes();
          $table->rememberToken();
          $table->timestamps();
        });

        Schema::create('user_informations', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->unsignedBigInteger('user_id');
    			$table->string('address')->nullable();
    			$table->string('zip')->nullable();
    			$table->string('town')->nullable();
    			$table->string('country')->nullable();
    			$table->string('company')->nullable();
    			$table->string('phone')->nullable();
    			$table->string('email_company')->nullable();
    			$table->string('vat')->nullable();
    			$table->string('iban')->nullable();
    			$table->string('bic')->nullable();
          $table->string('url')->nullable();
          $table->string('paypal')->nullable();
          $table->softDeletes();
          $table->rememberToken();
          $table->timestamps();

          $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('user_informations');
    }
}
