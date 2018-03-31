<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesSeeder::class);
        $this->call(AccountPatientEelke::class);
        $this->call(AccountPatientJorik::class);
        $this->call(AccountPatientEsmo::class);
        $this->call(RoleEsmo::class);
    }
}
