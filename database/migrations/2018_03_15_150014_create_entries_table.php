<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->integer('illness_id');
            $table->date('timespan_date')->nullable();
            $table->time('timespan_time')->nullable();
            $table->string('location')->nullable();
            $table->integer('intensity')->nullable();
            $table->time('complaint_time')->nullable();
            $table->time('recoverytime_time')->nullable();
            $table->string('weather')->nullable();
            $table->string('witness_report')->nullable();
            $table->string('comments')->nullable();
            $table->timestamps();

            //links diary entry to the user
            // $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entries');
    }
}
