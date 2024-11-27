<?php

namespace Database\Factories;

use App\Models\Department;
use App\Models\Directorate;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class DepartmentFactory extends Factory
{
    protected $model = Department::class;

    public function definition(): array
    {
        // Ensure we have a user and directorate to reference
        $directorate = Directorate::first() ?? Directorate::factory()->create();

        return [
            'name' => $this->faker->unique()->company(),
            'directorate_id' => $directorate->id,
            'created_by' => null,
            'updated_by' => null,
        ];
    }
}