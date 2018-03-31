<?php

use Illuminate\Database\Seeder;

class Symptoms extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('symptoms')->insert([
          'symptom' => 'hoofdpijn',
      ]);
      DB::table('symptoms')->insert([
          'symptom' => 'koorts',
      ]);
      DB::table('symptoms')->insert([
          'symptom' => 'loopneus',
      ]);
      DB::table('symptoms')->insert([
          'symptom' => 'oorpijn',
      ]);
      DB::table('symptoms')->insert([
          'symptom' => 'buikpijn',
      ]);
      DB::table('symptoms')->insert([
          'symptom' => 'duizelig',
      ]);
      DB::table('symptoms')->insert([
          'symptom' => 'hartkloppingen',
      ]);
      DB::table('symptoms')->insert([
          'symptom' => 'bewusteloosheid',
      ]);
      DB::table('symptoms')->insert([
          'symptom' => 'jeuk',
      ]);
      DB::table('symptoms')->insert([
          'symptom' => 'haaruitval',
      ]);
      DB::table('symptoms')->insert([
          'symptom' => 'lichtgevoeligheid',
      ]);
      DB::table('symptoms')->insert([
          'symptom' => 'geluidsgevoelig',
      ]);
      DB::table('symptoms')->insert([
          'symptom' => 'bulten',
      ]);
    }
}
