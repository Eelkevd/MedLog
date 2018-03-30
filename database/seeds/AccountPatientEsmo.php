<?php

use Illuminate\Database\Seeder;

class AccountPatientEsmo extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
          'username' => 'esmoves2',
          'firstname' => encrypt('Esmeralda'),
          'middlename' => encrypt(''),
          'lastname' => encrypt('Tijhoff'),
          'bsn' => '12545689',
          'street' => encrypt('Achterweg'),
          'housenumber' => encrypt('11'),
          'housenumbersuffix' => encrypt('a'),
          'town' => encrypt('Groningen'),
          'postalcode' => encrypt('9788 BB'),
          'email' => 'esmoves2@mail.com',
          'password' => Hash::make('@Insert12'),
    ]);
      DB::table('diaries')->insert([
          'user_id' => '11',
      ]);

      DB::table('readers')->insert([
          'user_id' => '11',
          'diary_id' => '11',
          'timeframe' => '12',
          'password' => '12',
          'token' => '12',
      ]);
    }
}
