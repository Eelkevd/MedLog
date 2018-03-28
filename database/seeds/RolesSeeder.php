<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reader=Role::create([
          'name' => 'Reader',
          'slug' => 'reader',
          'permissions' => json_encode([
            'read_diary' => true,
          ]),
        ]);

        $patient=Role::create([
          'name' => 'Patient',
          'slug' => 'patient',
          'permissions' => json_encode([
            'update-entry' => true,
            'save-entry' => true,
          ]),
        ]);

    }
}
