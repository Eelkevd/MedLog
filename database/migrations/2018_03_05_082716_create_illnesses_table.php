<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIllnessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('illnesses', function (Blueprint $table) {
            $table->increments('id')->unsigned();
<<<<<<< HEAD:database/migrations/2018_03_05_082716_create_illnesses_table.php
            $table->integer('diary_id')->unsigned();
            $table->string('illness');
            $table->timestamps();

            $table->foreign('diary_id')->references('id')->on('diaries');
=======
            $table->integer('entry_id')->unsigned();
            $table->string('illness');
            $table->timestamps();

            $table->foreign('entry_id')->references('id')->on('entries');
>>>>>>> DB and models restructured:database/migrations/2018_03_14_082716_create_illnesses_table.php
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('illnesses');
    }
}
