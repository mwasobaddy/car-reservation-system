<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Branch;
use App\Models\Location;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class BranchSeeder extends Seeder
{
    public function run(): void
    {
        $branches = [
            'Headquarters' => 'Nairobi',
            'Western Branch' => 'Kisumu',
            'Coast Branch' => 'Mombasa',
            'Rift Valley Branch' => 'Nakuru',
            'Central Branch' => 'Nyeri',
        ];

        foreach ($branches as $branchName => $locationName) {
            $location = Location::firstWhere('name', $locationName);
            
            if ($location) {
                Branch::create([
                    'name' => $branchName,
                    'location_id' => $location->id,
                    'created_by' => null,
                    'updated_by' => null,
                ]);
            }
        }

        // Optional: Create additional random branches
        Branch::factory()->count(5)->create();
    }
}