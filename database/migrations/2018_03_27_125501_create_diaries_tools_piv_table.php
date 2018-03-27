<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiariesToolsPivTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diaries_tools_piv', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('tool_id')->unsigned();
          $table->integer('diary_id')->unsigned();

          $table->foreign('tool_id')->references('id')->on('tools');
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
        Schema::dropIfExists('diaries_tools_piv');
    }
}
