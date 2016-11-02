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
            'name' => 'Applicant',
            'description' => 'This is an Applicant',
        ]);

        DB::table('roles')->insert([
            'name' => 'Admin',
            'description' => 'This is an Admin',
        ]);

        DB::table('roles')->insert([
            'name' => 'Inspector',
            'description' => 'This is an Inspector',
        ]);

        DB::table('roles')->insert([
            'name' => 'Rapporteur',
            'description' => 'This is an Rapporteur',
        ]);

    }
}
