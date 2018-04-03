<?php

use Illuminate\Database\Seeder;

class Illnesses extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('illnesses')->insert([
          'illness' => 'Migraine',
      ]);
      DB::table('illnesses')->insert([
          'illness' => 'Griep',
      ]);
      DB::table('illnesses')->insert([
          'illness' => 'Keelontsteking',
      ]);
      DB::table('illnesses')->insert([
          'illness' => 'CP',
      ]);
      DB::table('illnesses')->insert([
          'illness' => 'Verkoudheid',
      ]);
      DB::table('illnesses')->insert([
          'illness' => 'Leukemie',
      ]);
      DB::table('illnesses')->insert([
          'illness' => 'Downsyndrom',
      ]);
      DB::table('illnesses')->insert([
          'illness' => 'Onbekend',
      ]);

    }
}
