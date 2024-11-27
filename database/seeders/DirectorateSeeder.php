<?php

namespace Database\Seeders;

use App\Models\Directorate;
use App\Models\Branch;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DirectorateSeeder extends Seeder
{
    public function run(): void
    {

        // Sample directorates data
        $directorates = [
            'Finance Directorate' => 'Headquarters',
            'HR Directorate' => 'Western Branch',
            'IT Directorate' => 'Coast Branch',
            'Operations Directorate' => 'Rift Valley Branch',
            'Marketing Directorate' => 'Central Branch',
        ];

        foreach ($directorates as $directorateName => $branchName) {
            $branch = Branch::firstWhere('name', $branchName);
            
            if ($branch) {
                Directorate::create([
                    'name' => $directorateName,
                    'branch_id' => $branch->id,
                    'created_by' => null,
                    'updated_by' => null,
                ]);
            }
        }

        // Optional: Create additional random directorates
        Directorate::factory()->count(5)->create();
    }
}