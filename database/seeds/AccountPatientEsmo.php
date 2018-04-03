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
            'id' => '3',
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
            'created_at' => '2018-03-31 20:57:55',
            'updated_at' => '2018-03-31 20:57:55',
    	]);

        DB::table('role_user')->insert([
            'user_id' => '3',
            'role_id' => '1',
        ]);

    }
}
