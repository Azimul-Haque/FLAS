<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
        DB::table('roles')->insert([
            'name' => 'Admin',
            'display_name' => 'Admin',
            'description' => 'This is an Admin',
        ]);

        DB::table('roles')->insert([
            'name' => 'Inspector',
            'display_name' => 'Inspector',
            'description' => 'This is an Inspector',
        ]);

        DB::table('roles')->insert([
            'name' => 'Rapporteur',
            'display_name' => 'Rapporteur',
            'description' => 'This is a Rapporteur',
        ]);

        DB::table('roles')->insert([
            'name' => 'Applicant',
            'display_name' => 'Applicant',
            'description' => 'This is an Applicant',
        ]);

    }
}
