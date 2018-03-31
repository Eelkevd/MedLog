<?php

use Illuminate\Database\Seeder;

class RoleEsmo extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('readers')->insert([
            'user_id' => '3',
            'diary_id' => '1',
            'timeframe' => '24',
            'password' => 'test',
            'token' => '123',
        ]);

        DB::table('readers')->insert([
            'user_id' => '3',
            'diary_id' => '2',
            'timeframe' => '24',
            'password' => 'test',
            'token' => '123',
        ]);
    }

}
