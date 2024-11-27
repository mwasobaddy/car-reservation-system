<?php

namespace Database\Factories;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $email = $this->faker->unique()->safeEmail();
        $mobileNumber = '07' . $this->faker->numberBetween(10000000, 99999999);

        return [
            'user_id' => 'user_' . $this->faker->unique()->numberBetween(1, 1000),
            'first_name' => $this->faker->firstName(),
            'other_names' => $this->faker->lastName(),
            'work_email_hashed' => hash('sha256', $email),
            'work_email_encrypted' => encrypt($email),
            'mobile_number_hashed' => hash('sha256', $mobileNumber),
            'mobile_number_encrypted' => encrypt($mobileNumber),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'designation' => $this->faker->jobTitle(),
            'department_id' => 1, // Adjust as necessary
            'directorate_id' => 1, // Adjust as necessary
            'branch_id' => 1, // Adjust as necessary
            'role_id' => 1, // Adjust as necessary
            'account_status' => true,
            'password_hashed' => Hash::make('password'),
            'email_verified_at' => now(),
            'mobile_verified_at' => now(),
            'remember_token' => Str::random(10),
            'created_by' => null,
            'updated_by' => null,
            'current_team_id' => null,
            'profile_photo_path' => null,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    /**
     * Indicate that the user should have a personal team.
     */
    public function withPersonalTeam(?callable $callback = null): static
    {
        if (! Features::hasTeamFeatures()) {
            return $this->state([]);
        }

        return $this->has(
            Team::factory()
                ->state(fn (array $attributes, User $user) => [
                    'name' => $user->first_name . ' ' . $user->other_names . '\'s Team',
                    'user_id' => $user->id,
                    'personal_team' => true,
                ])
                ->when(is_callable($callback), $callback),
            'ownedTeams'
        );
    }
}