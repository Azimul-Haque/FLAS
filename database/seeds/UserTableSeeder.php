<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('secret'),
        ]);         

        DB::table('users')->insert([
            'name' => 'Inspector',
            'email' => 'inspector@gmail.com',
            'password' => bcrypt('secret'),
        ]);        

        DB::table('users')->insert([
            'name' => 'Rapporteur',
            'email' => 'rapporteur@gmail.com',
            'password' => bcrypt('secret'),
        ]);        

        DB::table('users')->insert([
            'name' => 'Applicant',
            'email' => 'applicant@gmail.com',
            'password' => bcrypt('secret'),
        ]); 
    }
}
