<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntriesMedicinesPivTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entries_medicines', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('entry_id')->unsigned();
          $table->integer('medicine_id')->unsigned();

          $table->foreign('entry_id')->references('id')->on('entries');
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
        Schema::dropIfExists('entries_medicines_piv');
    }
}
