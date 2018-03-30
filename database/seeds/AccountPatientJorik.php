<?php

use Illuminate\Database\Seeder;

class AccountPatientJorik extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'jorik',
            'firstname' => encrypt('Jorik'),
            'middlename' => encrypt('de'),
            'lastname' => encrypt('Boer'),
            'bsn' => '12345679',
            'street' => encrypt('Kerkstraat'),
            'housenumber' => encrypt('11'),
            'housenumbersuffix' => encrypt('a'),
            'town' => encrypt('Groningen'),
            'postalcode' => encrypt('9788 GA'),
            'email' => 'jorik@testmail.com',
            'password' => Hash::make('@Insert12'),
    	]);
        DB::table('diaries')->insert([
            'user_id' => '2',
        ]);
        
    }
}
