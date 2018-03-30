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
            'username' => 'esmo',
            'firstname' => encrypt('Esmeralda'),
            'middlename' => encrypt(''),
            'lastname' => encrypt('Tijhof'),
            'bsn' => '12345671',
            'street' => encrypt('Bedumerweg'),
            'housenumber' => encrypt('11'),
            'housenumbersuffix' => encrypt('a'),
            'town' => encrypt('Groningen'),
            'postalcode' => encrypt('9718 BB'),
            'email' => 'esmo@testmail.com',
            'password' => Hash::make('@Insert12'),
    	]);
        DB::table('diaries')->insert([
            'user_id' => '3',
        ]);
    }
}
