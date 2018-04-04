<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EntrySymptom extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entry_symptom', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('entry_id')->unsigned();
          $table->integer('symptom_id')->unsigned();

          $table->foreign('entry_id')->references('id')->on('entries');
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
        Schema::dropIfExists('entry_symptom');
    }
}