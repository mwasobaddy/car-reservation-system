<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Directorate;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        // Sample departments data
        $departments = [
            'Finance Department' => 'Finance Directorate',
            'HR Department' => 'HR Directorate',
            'IT Department' => 'IT Directorate',
            'Operations Department' => 'Operations Directorate',
            'Marketing Department' => 'Marketing Directorate',
        ];

        foreach ($departments as $departmentName => $directorateName) {
            $directorate = Directorate::firstWhere('name', $directorateName);
            
            if ($directorate) {
                Department::create([
                    'name' => $departmentName,
                    'directorate_id' => $directorate->id,
                    'created_by' => null,
                    'updated_by' => null,
                ]);
            }
        }

        // Optional: Create additional random departments
        Department::factory()->count(5)->create();
    }
}