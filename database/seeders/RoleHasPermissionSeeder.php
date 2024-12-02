<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Permission;

class RoleHasPermissionSeeder extends Seeder
{
    public function run()
    {
        // Get all permissions
        $permissions = Permission::all();

        // Assign all permissions to role_id 1
        foreach ($permissions as $permission) {
            DB::table('role_has_permission')->insert([
                'role_id' => 1,
                'permission_id' => $permission->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}