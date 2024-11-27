<?php

namespace Database\Factories;

use App\Models\Branch;
use App\Models\Location;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BranchFactory extends Factory
{
    protected $model = Branch::class;

    public function definition(): array
    {
        
        $location = Location::first() ?? Location::factory()->create();

        return [
            'name' => $this->faker->unique()->company(),
            'location_id' => $location->id,
            'created_by' => null,
            'updated_by' => null,
        ];
    }
}