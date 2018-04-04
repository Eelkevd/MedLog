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
            'street' => encrypt('Bedumerweg'),
            'housenumber' => encrypt('11'),
            'housenumbersuffix' => encrypt('a'),
            'town' => encrypt('Groningen'),
            'postalcode' => encrypt('9788 BB'),
            'email' => 'evandijk89@gmail.com',
            'password' => Hash::make('@Insert12'),
            'created_at' => '2018-03-31 20:57:55',
            'updated_at' => '2018-03-31 20:57:55',
    	]);
        DB::table('diaries')->insert([
            'user_id' => '1',
        ]);

        DB::table('role_user')->insert([
            'user_id' => '1',
            'role_id' => '2',
        ]);

    }
}
