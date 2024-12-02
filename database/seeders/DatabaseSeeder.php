<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    
    public function run(): void
    {
        // Create related data for foreign keys
        // Ensure that departments, directorates, branches, roles exist
        // You might need to create seeders for these as well

        

        // Then seed other tables in proper order
        $this->call([
            LocationSeeder::class,              // Then locations
            BranchSeeder::class,                // Then branches which depend on locations
            DirectorateSeeder::class,           // Then directorates which depend on branches
            DepartmentSeeder::class,            // Then departments which depend on directorates
            RoleSeeder::class,                  // The roles which work with permissions to get the role_has_permissions
            PermissionsSeeder::class,           // Then permissions which work with roles to get the role_has_permissions
            UsersSeeder::class,                 // Then users
            RoleHasPermissionSeeder::class,     // Then role_has_permissions
        ]);  
    }
    
}
