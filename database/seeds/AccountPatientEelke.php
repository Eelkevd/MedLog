<?php

use Illuminate\Database\Seeder;

class AccountPatientEelke extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => '1',
            'username' => 'eelke',
            'firstname' => encrypt('Eelke'),
            'middlename' => encrypt('van'),
            'lastname' => encrypt('Dijk'),
            'bsn' => '12345678',
            'street' => encrypt('Bedumerweg'),
            'housenumber' => encrypt('11'),
            'housenumbersuffix' => encrypt('a'),
            'town' => encrypt('Groningen'),
            'postalcode' => encrypt('9788 BB'),
            'email' => 'evandijk89@gmail.com',
            'password' => Hash::make('@Insert12'),
    	]);
        DB::table('diaries')->insert([
            'user_id' => '1',
        ]);
        // DB::table('readers')->insert([
        //     'user_id' => '1',
        //     'diary_id' => '1',
        //     'timeframe' => '24',
        //     'password' => 'test',
        //     'token' => '123',
        // ]);
    }
}
