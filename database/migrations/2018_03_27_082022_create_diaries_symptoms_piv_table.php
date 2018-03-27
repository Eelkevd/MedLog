<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiariesSymptomsPivTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diaries_symptoms_piv', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('diary_id')->unsigned();
          $table->integer('symptom_id')->unsigned();

          $table->foreign('diary_id')->references('id')->on('diaries');
          $table->foreign('symptom_id')->references('id')->on('symptoms');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diaries_symptoms_piv');
    }
}
