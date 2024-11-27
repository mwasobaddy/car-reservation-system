<?php
namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    protected $model = Contact::class;

    public function definition()
    {
        return [
            'issue_type' => $this->faker->randomElement(['Technical Issue', 'Feature Request', 'Bug Report']),
            'description' => $this->faker->paragraph,
            'attachments' => null,
            'subject' => $this->faker->sentence,
            'message' => $this->faker->paragraph,
            'priority' => $this->faker->randomElement(['Low', 'Medium', 'High', 'Urgent']),
        ];
    }
}