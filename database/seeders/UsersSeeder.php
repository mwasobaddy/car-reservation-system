<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'user_id' => 'user_001',
                'first_name' => 'Kelvin',
                'other_names' => 'Mwangi Wanjohi',
                'designation' => 'System Administrator',
                'gender' => 'male',
                'work_email' => 'kelvinramsiel@gmail.com',
                'mobile_number' => '0740252837',
                'department_id' => 1,
                'directorate_id' => 1,
                'branch_id' => 1,
                'role_id' => Role::where('name', 'Super Admin')->first()->id,
                'password' => 'Mwas@2024',
            ],
        ];

        foreach ($users as $userData) {
            User::create([
                'user_id' => $userData['user_id'],
                'first_name' => $userData['first_name'],
                'other_names' => $userData['other_names'],
                'designation' => $userData['designation'],
                'gender' => $userData['gender'],
                'work_email_hashed' => hash('sha256', $userData['work_email']),
                'work_email_encrypted' => encrypt($userData['work_email']),
                'mobile_number_hashed' => hash('sha256', $userData['mobile_number']),
                'mobile_number_encrypted' => encrypt($userData['mobile_number']),
                'department_id' => $userData['department_id'],
                'directorate_id' => $userData['directorate_id'],
                'branch_id' => $userData['branch_id'],
                'role_id' => $userData['role_id'],
                'account_status' => true,
                'password_hashed' => hash('sha256', $userData['password']),
                'email_verified_at' => now(),
                'mobile_verified_at' => now(),
                'remember_token' => Str::random(10),
                'created_by' => null,
                'updated_by' => null,
            ]);
        }
    }
}