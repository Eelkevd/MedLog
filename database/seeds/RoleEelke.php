<?php

use Illuminate\Database\Seeder;

class RoleEelke extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('readers')->insert([
            'user_id' => '2',
            'diary_id' => '1',
            'timeframe' => '24',
            'password' => 'test',
            'token' => '123',
        ]);
    }
    
}
