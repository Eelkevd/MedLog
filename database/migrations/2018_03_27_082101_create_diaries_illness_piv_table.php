<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiariesIllnessPivTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diaries_illness', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('diary_id')->unsigned();
          $table->integer('illness_id')->unsigned();

          $table->foreign('diary_id')->references('id')->on('diaries');
          $table->foreign('illness_id')->references('id')->on('illnesses');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diaries_illness_piv');
    }
}
