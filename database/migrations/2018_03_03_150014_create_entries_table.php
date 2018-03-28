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
            $table->increments('id')->unsigned();
            $table->integer('diary_id')->unsigned();
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

            //links entries to the diary
            $table->foreign('diary_id')->references('id')->on('diaries');
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
