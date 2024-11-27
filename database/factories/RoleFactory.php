<?php

namespace Database\Factories;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoleFactory extends Factory
{
    protected $model = Role::class;

    public function definition(): array
    {
        $user = User::first() ?? User::factory()->create(['user_id' => 'user_001']);

        return [
            'name' => $this->faker->unique()->jobTitle(),
            'created_by' => null,
            'updated_by' => null,
        ];
    }
}