<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Agent;
use App\Models\Branch;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Agent>
 */
class AgentFactory extends Factory
{
    protected $model = Agent::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'photo' => $this->faker->imageUrl(),
            'title' => $this->faker->title,
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'gender' => $this->faker->randomElement(['Male', 'Female']),
            'date_of_birth' => $this->faker->date,
            'primary_mobile' => $this->faker->phoneNumber,
            'secondary_mobile' => $this->faker->phoneNumber,
            'email' => fake()->unique()->safeEmail(),
            'aadhaar_number' => $this->faker->numerify('############'),
            'pan_number' => $this->faker->bothify('??####??####??'),
            'family_card' => $this->faker->imageUrl(),
            'spouse' => $this->faker->name('male') ?: $this->faker->name('female'),
            'father' => $this->faker->name('male'),
            'mother' => $this->faker->name('female'),
            'nominee_name' => $this->faker->name,
            'relation_with_nominee' => $this->faker->randomElement(['Spouse', 'Parent', 'Child', 'Sibling']),
            'status' => $this->faker->randomElement(['Active', 'Inactive']),
            'employment_type' => $this->faker->randomElement(['Full-time', 'Part-time', 'Contract', 'Freelance']),
            'organization' => $this->faker->company,
            'designation' => $this->faker->jobTitle,
            'monthly_income' => $this->faker->randomFloat(2, 1000, 10000),
            'application_form' => $this->faker->imageUrl(),
            'branch_id' => Branch::inRandomOrder()->first()->id,
            'created_by' => User::inRandomOrder()->first()->id,
            'updated_by' => User::inRandomOrder()->first()->id,
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
