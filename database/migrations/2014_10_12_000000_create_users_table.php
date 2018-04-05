<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id')->unsigned();
            $table->string('username')->unique();
            $table->text('firstname')->nullable();
            $table->text('middlename')->nullable();
            $table->text('lastname')->nullable();
            $table->text ('street')->nullable();
            $table->text('housenumber')->nullable();
            $table->text('housenumbersuffix')->nullable();
            $table->text('town')->nullable();
            $table->text('postalcode')->nullable();
            $table->string('email')->unique();
            $table->text('password');
            $table->string('verifyToken')->nullable();
            $table->string('theme')->nullable();
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
