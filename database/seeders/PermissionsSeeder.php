<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            // Super Admins Category
            ['name' => 'view_super_admins', 'description' => 'View other Super Admins'],
            ['name' => 'edit_super_admins', 'description' => 'Edit other Super Admins'],
            ['name' => 'delete_super_admins', 'description' => 'Delete other Super Admins'],
            ['name' => 'create_super_admins', 'description' => 'Create other Super Admins'],
            
            // Admins Category
            ['name' => 'view_admins', 'description' => 'View other Admins'],
            ['name' => 'edit_admins', 'description' => 'Edit other Admins'],
            ['name' => 'delete_admins', 'description' => 'Delete other Admins'],
            ['name' => 'create_admins', 'description' => 'Create other Admins'],

            // Drivers Category
            ['name' => 'view_drivers', 'description' => 'View Drivers'],
            ['name' => 'edit_drivers', 'description' => 'Edit Drivers'],
            ['name' => 'delete_drivers', 'description' => 'Delete Drivers'],
            ['name' => 'create_drivers', 'description' => 'Create Drivers'],

            // Users Category
            ['name' => 'view_users', 'description' => 'View Users'],
            ['name' => 'edit_users', 'description' => 'Edit Users'],
            ['name' => 'delete_users', 'description' => 'Delete Users'],
            ['name' => 'create_users', 'description' => 'Create Users'],

            // Account Category
            ['name' => 'ban_accounts', 'description' => 'Ban any accounts'],
            ['name' => 'disable_accounts', 'description' => 'Disable any accounts'],
            ['name' => 'activate_accounts', 'description' => 'Activate any accounts'],

            // Location Category
            ['name' => 'view_locations', 'description' => 'View existing Locations'],
            ['name' => 'edit_locations', 'description' => 'Edit existing Locations'],
            ['name' => 'delete_locations', 'description' => 'Delete existing Locations'],
            ['name' => 'create_locations', 'description' => 'Create new Locations'],

            // Branch Category
            ['name' => 'view_branches', 'description' => 'View existing Branches'],
            ['name' => 'edit_branches', 'description' => 'Edit existing Branches'],
            ['name' => 'delete_branches', 'description' => 'Delete existing Branches'],
            ['name' => 'create_branches', 'description' => 'Create new Branches'],

            // Directorate Category
            ['name' => 'view_directorates', 'description' => 'View existing Directorates'],
            ['name' => 'edit_directorates', 'description' => 'Edit existing Directorates'],
            ['name' => 'delete_directorates', 'description' => 'Delete existing Directorates'],
            ['name' => 'create_directorates', 'description' => 'Create new Directorates'],

            // Department Category
            ['name' => 'view_departments', 'description' => 'View existing Departments'],
            ['name' => 'edit_departments', 'description' => 'Edit existing Departments'],
            ['name' => 'delete_departments', 'description' => 'Delete existing Departments'],
            ['name' => 'create_departments', 'description' => 'Create new Departments'],

            // Memo Category
            ['name' => 'view_memos', 'description' => 'View memos submitted by Admins and Users'],
            ['name' => 'edit_own_memos', 'description' => 'Edit memos submitted by themselves'],
            ['name' => 'delete_own_memos', 'description' => 'Delete memos submitted by themselves'],
            ['name' => 'create_memos', 'description' => 'Create new Memo'],
            ['name' => 'approve_memos', 'description' => 'Approve memos'],
            ['name' => 'reject_memos', 'description' => 'Reject memos'],

            // Vehicle Category
            ['name' => 'view_vehicles', 'description' => 'View Vehicles'],
            ['name' => 'edit_vehicles', 'description' => 'Edit Vehicles'],
            ['name' => 'delete_vehicles', 'description' => 'Delete Vehicles'],
            ['name' => 'create_vehicles', 'description' => 'Create Vehicles'],
            ['name' => 'view_assigned_vehicles', 'description' => 'View Vehicles assigned to them'],
            ['name' => 'view_assigned_memos', 'description' => 'View memos assigned to them'],

            // Profile Category
            ['name' => 'edit_profile', 'description' => 'Edit their profile details'],
            ['name' => 'view_profile', 'description' => 'View their profile details'],
        ];

        DB::table('permissions')->insert($permissions);
    }
}
