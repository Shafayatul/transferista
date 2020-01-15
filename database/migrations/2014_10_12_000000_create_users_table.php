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
          $table->string('email')->unique();
          $table->string('password');
    			$table->string('address')->nullable();
    			$table->string('zip')->nullable();
    			$table->string('town')->nullable();
    			$table->string('country')->nullable();
    			$table->integer('role')->nullable();
    			$table->string('company')->nullable();
    			$table->string('phone')->nullable();
    			$table->string('email_company')->nullable();
    			$table->string('vat')->nullable();
    			$table->string('iban')->nullable();
    			$table->string('bic')->nullable();
    			$table->string('status')->nullable();
    			$table->integer('first')->nullable();
          $table->string('url')->nullable();
          $table->string('paypal')->nullable();
    			$table->timestamp('email_verified_at')->nullable();
          $table->rememberToken();
          $table->timestamps();
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
    }
}
