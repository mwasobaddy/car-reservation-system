<?php

namespace Database\Seeders;

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
            LocationSeeder::class,    // Then locations
            BranchSeeder::class,      // Then branches which depend on locations
            DirectorateSeeder::class, // Then directorates which depend on branches
            DepartmentSeeder::class,  // Then departments which depend on directorates
            RoleSeeder::class,        // Finally roles
        ]); 
    
        User::factory()->create([
            'user_id' => 'user_002',
            'first_name' => 'Test',
            'other_names' => 'User',
            'designation' => 'Developer',
            'gender' => 'male',
    
            // Hashed and encrypted email (adjust based on your encryption methods)
            'work_email_hashed' => hash('sha256', 'test@example.com'),
            'work_email_encrypted' => encrypt('test@example.com'),
    
            // Hashed and encrypted mobile number
            'mobile_number_hashed' => hash('sha256', '0712345678'),
            'mobile_number_encrypted' => encrypt('0712345678'),
    
            // Foreign keys (ensure these IDs exist)
            'department_id' => 1,
            'directorate_id' => 1,
            'branch_id' => 1,
            'role_id' => 1,
    
            // Account status and password
            'account_status' => true,
            'password_hashed' => Hash::make('password'),
    
            // Timestamps and tokens
            'email_verified_at' => now(),
            'mobile_verified_at' => now(),
            'remember_token' => Str::random(10),
    
            // Additional fields if necessary
            'created_by' => null,
            'updated_by' => null,
        ]);       
    }
    
}
