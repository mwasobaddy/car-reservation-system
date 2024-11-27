<?php

namespace Database\Factories;

use App\Models\Directorate;
use App\Models\Branch;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class DirectorateFactory extends Factory
{
    protected $model = Directorate::class;

    public function definition(): array
    {
        // Ensure we have a user and branch to reference
        $branch = Branch::first() ?? Branch::factory()->create();

        return [
            'name' => $this->faker->unique()->company(),
            'branch_id' => $branch->id,
            'created_by' => null,
            'updated_by' => null,
        ];
    }
}