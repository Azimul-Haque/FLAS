<?php

use Illuminate\Database\Seeder;

class ApplicationStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('application_statuses')->insert([
            'name' => 'Pending',
            'display_name' => 'Pending',
            'description' => 'Status Pending for Inspection'
        ]);

        DB::table('application_statuses')->insert([
            'name' => 'Inspected',
            'display_name' => 'Inspected',
            'description' => 'Status Inspected for Approval'
        ]);

        DB::table('application_statuses')->insert([
            'name' => 'Approved',
            'display_name' => 'Approved',
            'description' => 'Status Approved for License'
        ]);

        DB::table('application_statuses')->insert([
            'name' => 'Rejected',
            'display_name' => 'Rejected',
            'description' => 'Status Rejected for License'
        ]);


        DB::table('application_statuses')->insert([
            'name' => 'Expired',
            'display_name' => 'Expired',
            'description' => 'Status Expired for License'
        ]);

        DB::table('application_statuses')->insert([
            'name' => 'Withdrawn',
            'display_name' => 'Withdrawn',
            'description' => 'Status Withdrawn for License'
        ]);
    }
}
