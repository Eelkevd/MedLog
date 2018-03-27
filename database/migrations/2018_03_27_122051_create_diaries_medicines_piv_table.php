<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiariesMedicinesPivTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diaries_medicines_piv', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('diary_id')->unsigned();
            $table->integer('medicine_id')->unsigned();

            $table->foreign('diary_id')->references('id')->on('diaries');
            $table->foreign('medicine_id')->references('id')->on('medicines');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diaries_medicines_piv');
    }
}
