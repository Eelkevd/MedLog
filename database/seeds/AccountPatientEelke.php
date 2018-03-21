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
    }
}
