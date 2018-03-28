<?php

use Illuminate\Database\Seeder;

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
          'permissions' => [
            'read_diary' => true,
          ],
        ]);

        $patient=Role::create([
          'name' => 'Patient',
          'slug' => 'patient',
          'permissions' => [
            'update-entry' => true,
            'save-entry' => true,
          ],
        ]);

    }
}
