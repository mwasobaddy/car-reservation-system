<?php

namespace Database\Factories;

use App\Models\Location;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class LocationFactory extends Factory
{
    protected $model = Location::class;

    public function definition()
    {
        // Ensure there is at least one user to reference
        $user = User::inRandomOrder()->first();
        if (!$user) {
            $user = User::factory()->create();
        }

        return [
            'name'       => $this->faker->city(),
            'created_by' => null,
            'updated_by' => null,
        ];
    }
}