<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {

        $roles = [
            'Super Admin',
            'Admin',
            'Driver',
            'User',
            'Tester',
        ];

        foreach ($roles as $roleName) {
            Role::firstOrCreate([
                'name' => $roleName,
            ], [
                'created_by' => null,
                'updated_by' => null,
            ]);
        }

        // Optional: Create additional random roles
        Role::factory()->count(5)->create([
            'created_by' => null,
            'updated_by' => null,
        ]);
    }
}