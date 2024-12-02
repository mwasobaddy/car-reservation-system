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
            'Central Region' => 'Nyeri County',
            'Coast Region' => 'Mombasa County',
            'Corridor A' => 'Machakos County',
            'Corridor B' => 'Nakuru County',
            'Corridor C' => 'Kiambu County',
            'Corridor D' => 'Nairobi County',
            'Lower Eastern Region' => 'Machakos County',
            'Nairobi Region (Head Office)' => 'Nairobi County',
            'North Eastern Region' => 'Garissa County',
            'North Rift Region' => 'Uasin Gishu County',
            'Nyanza Region' => 'Kisumu County',
            'South Rift Region' => 'Nakuru County',
            'Upper Eastern Region' => 'Isiolo County',
            'Western Region' => 'Kakamega County',
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
    }
}