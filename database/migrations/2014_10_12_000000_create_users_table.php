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
            $table->increments('id');
            $table->string('username')->unique();
            $table->text('firstname');
            $table->text('middlename')->nullable();
            $table->text('lastname');
            $table->string('bsn')->unique();
            $table->text ('street');
            $table->text('housenumber');
            $table->text('housenumbersuffix')->nullable();
            $table->text('town');
            $table->text('postalcode');
            $table->string('email')->unique();
            $table->text('password');
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
