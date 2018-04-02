<?php

use Illuminate\Database\Seeder;

class EntriesEelke extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('entries')->insert([
          'id' => '1',
          'diary_id' => '1',
          'illness' => 'Migraine',
          'timespan_date' => '2018-03-12',
          'timespan_time' => '23:00:00',
          'location' => 'thuis',
          'intensity' => '7',
          'complaint_time' => '2:00',
          'recoverytime_time' => '23:00',
          'weather' => 'lente',
          'witness_report' => 'Huisgenoot gealarmeerd',
          'comments' => 'Wisselende symptomen',
          'created_at' => '2018-03-31 20:57:55',
          'updated_at' => '2018-03-31 20:57:55',
        ]);

        DB::table('diary_illness')->insert([
            'diary_id' => '1',
            'illness_id' => '1',
        ]);

        DB::table('diary_illness')->insert([
            'diary_id' => '1',
            'illness_id' => '2',
        ]);

        DB::table('diary_illness')->insert([
            'diary_id' => '1',
            'illness_id' => '3',
        ]);

        DB::table('diary_illness')->insert([
            'diary_id' => '1',
            'illness_id' => '4',
        ]);

        DB::table('diary_illness')->insert([
            'diary_id' => '1',
            'illness_id' => '5',
        ]);


        DB::table('diary_symptom')->insert([
            'diary_id' => '1',
            'symptom_id' => '1',
        ]);

        DB::table('diary_symptom')->insert([
            'diary_id' => '1',
            'symptom_id' => '2',
        ]);

        DB::table('diary_symptom')->insert([
            'diary_id' => '1',
            'symptom_id' => '3',
        ]);

        DB::table('diary_symptom')->insert([
            'diary_id' => '1',
            'symptom_id' => '4',
        ]);

        DB::table('diary_symptom')->insert([
            'diary_id' => '1',
            'symptom_id' => '5',
        ]);

        DB::table('diary_symptom')->insert([
            'diary_id' => '1',
            'symptom_id' => '6',
        ]);

        DB::table('diary_symptom')->insert([
            'diary_id' => '1',
            'symptom_id' => '7',
        ]);

        DB::table('diary_symptom')->insert([
            'diary_id' => '1',
            'symptom_id' => '8',
        ]);


        DB::table('entry_symptom')->insert([
            'entry_id' => '1',
            'symptom_id' => '1',
        ]);

        DB::table('entry_symptom')->insert([
            'entry_id' => '1',
            'symptom_id' => '6',
        ]);

        // Tweede entry_id
        DB::table('entries')->insert([
          'id' => '2',
          'diary_id' => '1',
          'illness' => 'Migraine',
          'timespan_date' => '2018-03-16',
          'timespan_time' => '23:50:00',
          'location' => 'kantoor',
          'intensity' => '9',
          'complaint_time' => '23:00',
          'recoverytime_time' => '23:00',
          'weather' => 'lente',
          'witness_report' => 'Collega gealarmeerd',
          'comments' => 'Naar huis gegaan',
          'created_at' => '2018-03-16 20:57:55',
          'updated_at' => '2018-03-16 20:57:55',
        ]);

        DB::table('entry_symptom')->insert([
            'entry_id' => '2',
            'symptom_id' => '1',
        ]);

        DB::table('entry_symptom')->insert([
            'entry_id' => '2',
            'symptom_id' => '6',
        ]);

        DB::table('entry_symptom')->insert([
            'entry_id' => '2',
            'symptom_id' => '3',
        ]);

        // Derde entry
        // Tweede entry_id
        DB::table('entries')->insert([
          'id' => '3',
          'diary_id' => '1',
          'illness' => 'Migraine',
          'timespan_date' => '2018-03-20',
          'timespan_time' => '23:50:00',
          'location' => 'thuis',
          'intensity' => '3',
          'complaint_time' => '23:00',
          'recoverytime_time' => '23:00',
          'weather' => 'lente',
          'witness_report' => 'Dokter gebeld',
          'comments' => 'Naar huis gegaan',
          'created_at' => '2018-03-20 20:57:55',
          'updated_at' => '2018-03-20 20:57:55',
        ]);

        DB::table('entry_symptom')->insert([
            'entry_id' => '3',
            'symptom_id' => '1',
        ]);

        DB::table('entry_symptom')->insert([
            'entry_id' => '3',
            'symptom_id' => '4',
        ]);

        DB::table('entry_symptom')->insert([
            'entry_id' => '3',
            'symptom_id' => '2',
        ]);

    }
}
