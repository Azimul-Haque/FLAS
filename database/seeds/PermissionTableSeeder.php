<?php

use Illuminate\Database\Seeder;
use App\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = [
        	[
        		'name' => 'role-list',
        		'display_name' => 'Display Role Listing',
        		'description' => 'See only Listing Of Role'
        	],
        	[
        		'name' => 'role-create',
        		'display_name' => 'Create Role',
        		'description' => 'Create New Role'
        	],
        	[
        		'name' => 'role-edit',
        		'display_name' => 'Edit Role',
        		'description' => 'Edit Role'
        	],
        	[
        		'name' => 'role-delete',
        		'display_name' => 'Delete Role',
        		'description' => 'Delete Role'
        	],
        	[
        		'name' => 'application-list',
        		'display_name' => 'Display Application Listing',
        		'description' => 'See only Listing Of Application' 
        	],
        	[
        		'name' => 'application-create',
        		'display_name' => 'Create Application',
        		'description' => 'Create New Application'
        	],
        	[
        		'name' => 'application-edit',
        		'display_name' => 'Edit Application',
        		'description' => 'Edit Application'
        	],
            [
                'name' => 'application-delete',
                'display_name' => 'Delete Application',
                'description' => 'Delete Application'
            ],
            [
                'name' => 'application-inspection',
                'display_name' => 'Inspection Application',
                'description' => 'Inspection Application'
            ],
        	[
        		'name' => 'report-genetation',
        		'display_name' => 'Generate Report',
        		'description' => 'Generate Report'
        	]
        ];

        foreach ($permission as $key => $value) {
        	Permission::create($value);
        }
    }
}
