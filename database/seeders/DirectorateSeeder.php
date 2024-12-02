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
            'Audit Services' => 'Nairobi Region (Head Office)',
            'Corporate Services' => 'Nairobi Region (Head Office)',
            'Corporation Secretary & Legal Services' => 'Nairobi Region (Head Office)',
            'Development' => 'Nairobi Region (Head Office)',
            'Highway, Design & Safety (HDS)' => 'Nairobi Region (Head Office)',
            'Maintenance' => 'Nairobi Region (Head Office)',
            'No Directorate' => 'Nairobi Region (Head Office)',
            'Planning, Research & Complianace (PRC)' => 'Nairobi Region (Head Office)',
            'Public Private Partnerships (PPP)' => 'Nairobi Region (Head Office)',
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
    }
}