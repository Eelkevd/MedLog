<?php

use Illuminate\Database\Seeder;

class PatientHelma_with_entries_and_medicine extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      DB::table('users')->insert([
          'id' => '30',
          'username' => 'helma',
          'firstname' => encrypt('Helma'),
          'middlename' => encrypt('de'),
          'lastname' => encrypt('Groot'),
          'email' => 'helma@mail.com',
          'password' => Hash::make('@Insert12'),
          'created_at' => '2018-03-31 20:57:55',
          'updated_at' => '2018-03-31 20:57:55',
    ]);

      DB::table('role_user')->insert([
          'user_id' => '30',
          'role_id' => '2',
      ]);

      DB::table('diaries')->insert([
          'id' => '30',
          'user_id' => '30',
      ]);

      DB::table('diary_illness')->insert([
          'diary_id' => '30',
          'illness_id' => '30',
      ]);

      DB::table('illnesses')->insert([
          'id' => '30',
          'illness' => 'Epilepsie',
      ]);

      DB::table('diary_symptom')->insert([
          'diary_id' => '30',
          'symptom_id' => '12',
      ]);

      DB::table('diary_symptom')->insert([
          'diary_id' => '30',
          'symptom_id' => '13',
      ]);

      DB::table('diary_symptom')->insert([
          'diary_id' => '30',
          'symptom_id' => '1',
      ]);

      DB::table('diary_symptom')->insert([
          'diary_id' => '30',
          'symptom_id' => '2',
      ]);

      $data = [
        ['id' => '100', 'diary_id' => '30', 'illness'=>'Epilepsie', 'timespan_date' => '2018-04-06', 'timespan_time' => '17:00:00', 'location' => 'thuis', 'intensity' => '7', 'complaint_time' => '2:00', 'recoverytime_time' => '23:00', 'complaint_startdate' => '2018-04-06', 'complaint_enddate' => '2018-04-07', 'weather' => 'regen', 'witness_report' => '', 'comments' => '', 'created_at' => '2018-03-31 20:57:55', 'updated_at' => '2018-03-31 20:57:55' ],
        ['id' => '100', 'diary_id' => '30', 'illness'=>'Epilepsie', 'timespan_date' => '2018-04-01', 'timespan_time' => '12:00:00', 'location' => 'kantoor', 'intensity' => '3', 'complaint_time' => '3:00', 'recoverytime_time' => '23:00', 'complaint_startdate' => '2018-04-01', 'complaint_enddate' => '2018-04-02', 'weather' => 'kou', 'witness_report' => '', 'comments' => 'door een ruzie met partner', 'created_at' => '2018-03-31 20:57:55', 'updated_at' => '2018-03-31 20:57:55' ],
        ['id' => '100', 'diary_id' => '30', 'illness'=>'Epilepsie', 'timespan_date' => '2018-03-12', 'timespan_time' => '14:00:00', 'location' => 'kantoor', 'intensity' => '2', 'complaint_time' => '2:00', 'recoverytime_time' => '23:00', 'complaint_startdate' => '2018-03-12', 'complaint_enddate' => '2018-03-13', 'weather' => 'matig', 'witness_report' => 'Partner gebeld.', 'comments' => 'Wisselende symptomen', 'created_at' => '2018-03-31 20:57:55', 'updated_at' => '2018-03-31 20:57:55' ],
        ['id' => '100', 'diary_id' => '30', 'illness'=>'Epilepsie', 'timespan_date' => '2018-03-02', 'timespan_time' => '20:00:00', 'location' => 'thuis', 'intensity' => '6', 'complaint_time' => '4:00', 'recoverytime_time' => '23:00', 'complaint_startdate' => '2018-03-02', 'complaint_enddate' => '2018-03-02', 'weather' => 'regen', 'witness_report' => 'Dokter gebeld', 'comments' => '', 'created_at' => '2018-03-31 20:57:55', 'updated_at' => '2018-03-31 20:57:55' ],
        ['id' => '100', 'diary_id' => '30', 'illness'=>'Epilepsie', 'timespan_date' => '2018-02-24', 'timespan_time' => '23:00:00', 'location' => 'thuis', 'intensity' => '7', 'complaint_time' => '2:00', 'recoverytime_time' => '23:00', 'complaint_startdate' => '2018-02-24', 'complaint_enddate' => '2018-02-26', 'weather' => 'regen', 'witness_report' => 'Eva was erbij', 'comments' => 'naar huis gegaan', 'created_at' => '2018-03-31 20:57:55', 'updated_at' => '2018-03-31 20:57:55' ],
        ['id' => '100', 'diary_id' => '30', 'illness'=>'Epilepsie', 'timespan_date' => '2018-02-10', 'timespan_time' => '16:30:00', 'location' => 'kantoor', 'intensity' => '8', 'complaint_time' => '6:00', 'recoverytime_time' => '23:00', 'complaint_startdate' => '2018-02-10', 'complaint_enddate' => '2018-02-11', 'weather' => 'kou', 'witness_report' => 'Brigitte was erbij', 'comments' => 'naar huis gegaan', 'created_at' => '2018-03-31 20:57:55', 'updated_at' => '2018-03-31 20:57:55' ],
        ['id' => '100', 'diary_id' => '30', 'illness'=>'Epilepsie', 'timespan_date' => '2018-02-02', 'timespan_time' => '19:15:00', 'location' => 'thuis', 'intensity' => '9', 'complaint_time' => '2:00', 'recoverytime_time' => '23:00', 'complaint_startdate' => '2018-02-01', 'complaint_enddate' => '2018-02-03', 'weather' => 'kou', 'witness_report' => '', 'comments' => 'Wisselende symptomen', 'created_at' => '2018-03-31 20:57:55', 'updated_at' => '2018-03-31 20:57:55' ],
        ['id' => '100', 'diary_id' => '30', 'illness'=>'Epilepsie', 'timespan_date' => '2018-01-28', 'timespan_time' => '20:00:00', 'location' => 'thuis', 'intensity' => '7', 'complaint_time' => '2:00', 'recoverytime_time' => '23:00', 'complaint_startdate' => '2018-01-28', 'complaint_enddate' => '2018-01-29', 'weather' => 'kou', 'witness_report' => '', 'comments' => 'thuis gebleven', 'created_at' => '2018-03-31 20:57:55', 'updated_at' => '2018-03-31 20:57:55' ],
        ['id' => '100', 'diary_id' => '30', 'illness'=>'Epilepsie', 'timespan_date' => '2018-01-20', 'timespan_time' => '12:00:00', 'location' => 'kantoor', 'intensity' => '4', 'complaint_time' => '4:00', 'recoverytime_time' => '23:00', 'complaint_startdate' => '2018-01-20', 'complaint_enddate' => '2018-01-21', 'weather' => 'sneeuw', 'witness_report' => '', 'comments' => 'naar huis gegaan', 'created_at' => '2018-03-31 20:57:55', 'updated_at' => '2018-03-31 20:57:55' ],
        ['id' => '100', 'diary_id' => '30', 'illness'=>'Epilepsie', 'timespan_date' => '2018-01-13', 'timespan_time' => '11:00:00', 'location' => 'kantoor', 'intensity' => '2', 'complaint_time' => '3:00', 'recoverytime_time' => '23:00', 'complaint_startdate' => '2018-01-13', 'complaint_enddate' => '2018-01-14', 'weather' => 'guur', 'witness_report' => 'Partner hielp me', 'comments' => 'Wisselende symptomen', 'created_at' => '2018-03-31 20:57:55', 'updated_at' => '2018-03-31 20:57:55' ],
        ['id' => '100', 'diary_id' => '30', 'illness'=>'Epilepsie', 'timespan_date' => '2018-01-03', 'timespan_time' => '15:00:00', 'location' => 'kantoor', 'intensity' => '7', 'complaint_time' => '2:00', 'recoverytime_time' => '23:00', 'complaint_startdate' => '2018-01-03', 'complaint_enddate' => '2018-01-04', 'weather' => 'vrieskou', 'witness_report' => '', 'comments' => 'medicijnen halen', 'created_at' => '2018-03-31 20:57:55', 'updated_at' => '2018-03-31 20:57:55' ],
        ['id' => '100', 'diary_id' => '30', 'illness'=>'Epilepsie', 'timespan_date' => '2017-12-26', 'timespan_time' => '11:00:00', 'location' => 'kantoor', 'intensity' => '7', 'complaint_time' => '1:00', 'recoverytime_time' => '23:00', 'weather' => 'lente', 'witness_report' => 'Huisgenoot gealarmeerd', 'comments' => 'naar huis gegaan', 'created_at' => '2018-03-31 20:57:55', 'updated_at' => '2018-03-31 20:57:55' ],
        ['id' => '100', 'diary_id' => '30', 'illness'=>'Epilepsie', 'timespan_date' => '2017-12-25', 'timespan_time' => '20:00:00', 'location' => 'thuis', 'intensity' => '2', 'complaint_time' => '2:00', 'recoverytime_time' => '23:00', 'weather' => 'lente', 'witness_report' => 'Partner hielp me', 'comments' => '', 'created_at' => '2018-03-31 20:57:55', 'updated_at' => '2018-03-31 20:57:55' ],
        ['id' => '100', 'diary_id' => '30', 'illness'=>'Epilepsie', 'timespan_date' => '2017-12-12', 'timespan_time' => '18:00:00', 'location' => 'thuis', 'intensity' => '6', 'complaint_time' => '2:00', 'recoverytime_time' => '23:00', 'weather' => 'lente', 'witness_report' => 'Partner hielp me verder', 'comments' => '', 'created_at' => '2018-03-31 20:57:55', 'updated_at' => '2018-03-31 20:57:55' ],
        ['id' => '100', 'diary_id' => '30', 'illness'=>'Epilepsie', 'timespan_date' => '2017-11-29', 'timespan_time' => '19:00:00', 'location' => 'thuis', 'intensity' => '6', 'complaint_time' => '3:00', 'recoverytime_time' => '23:00', 'weather' => 'lente', 'witness_report' => 'Eva gebeld', 'comments' => 'Aanleiding was een ruzie', 'created_at' => '2018-03-31 20:57:55', 'updated_at' => '2018-03-31 20:57:55' ],
        ['id' => '100', 'diary_id' => '30', 'illness'=>'Epilepsie', 'timespan_date' => '2017-11-21', 'timespan_time' => '20:00:00', 'location' => 'thuis', 'intensity' => '8', 'complaint_time' => '4:00', 'recoverytime_time' => '23:00', 'weather' => 'lente', 'witness_report' => 'Esther bracht me thuis', 'comments' => 'Wisselende symptomen', 'created_at' => '2018-03-31 20:57:55', 'updated_at' => '2018-03-31 20:57:55' ],
        ['id' => '100', 'diary_id' => '30', 'illness'=>'Epilepsie', 'timespan_date' => '2017-11-12', 'timespan_time' => '23:00:00', 'location' => 'thuis', 'intensity' => '7', 'complaint_time' => '2:00', 'recoverytime_time' => '23:00', 'weather' => 'lente', 'witness_report' => '', 'comments' => 'naar huis gegaan', 'created_at' => '2018-03-31 20:57:55', 'updated_at' => '2018-03-31 20:57:55' ],
        ['id' => '100', 'diary_id' => '30', 'illness'=>'Epilepsie', 'timespan_date' => '2017-10-18', 'timespan_time' => '22:00:00', 'location' => 'thuis', 'intensity' => '9', 'complaint_time' => '6:00', 'recoverytime_time' => '23:00', 'weather' => 'lente', 'witness_report' => '', 'comments' => 'naar huis gegaan', 'created_at' => '2018-03-31 20:57:55', 'updated_at' => '2018-03-31 20:57:55' ],
        ['id' => '100', 'diary_id' => '30', 'illness'=>'Epilepsie', 'timespan_date' => '2017-10-12', 'timespan_time' => '12:00:00', 'location' => 'kantoor', 'intensity' => '7', 'complaint_time' => '2:00', 'recoverytime_time' => '23:00', 'weather' => 'lente', 'witness_report' => '', 'comments' => 'naar huis gegaan', 'created_at' => '2018-03-31 20:57:55', 'updated_at' => '2018-03-31 20:57:55' ],
        ['id' => '100', 'diary_id' => '30', 'illness'=>'Epilepsie', 'timespan_date' => '2017-10-11', 'timespan_time' => '09:00:00', 'location' => 'kantoor', 'intensity' => '7', 'complaint_time' => '2:00', 'recoverytime_time' => '23:00', 'weather' => 'lente', 'witness_report' => '', 'comments' => 'naar huis gegaan', 'created_at' => '2018-03-31 20:57:55', 'updated_at' => '2018-03-31 20:57:55' ],
        ['id' => '100', 'diary_id' => '30', 'illness'=>'Epilepsie', 'timespan_date' => '2017-10-01', 'timespan_time' => '13:00:00', 'location' => 'kantoor', 'intensity' => '7', 'complaint_time' => '2:00', 'recoverytime_time' => '23:00', 'weather' => 'lente', 'witness_report' => 'Esther bracht me terug', 'comments' => 'naar huis gegaan', 'created_at' => '2018-03-31 20:57:55', 'updated_at' => '2018-03-31 20:57:55' ], 

      ];
      foreach ($data as $key => $value) {
        Entry::create($value);
      }

      DB::table('entry_symptom')->insert([
          'entry_id' => '1',
          'symptom_id' => '1',
      ]);

      DB::table('entry_symptom')->insert([
          'entry_id' => '1',
          'symptom_id' => '6',
      ]);


    }
}
