<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DiaryTool extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diary_tool', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('tool_id')->unsigned();
          $table->integer('diary_id')->unsigned();

          $table->foreign('tool_id')->references('id')->on('tools');
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
        Schema::dropIfExists('diary_tool');
    }
}
