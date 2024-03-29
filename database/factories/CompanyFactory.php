<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Company;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Company::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->company, // Generate a unique company name
            'active' => $this->faker->boolean(), // Randomly set 'active' to true or false
            'created_by' => User::factory()->create()->id, // Create a user and use its id as created_by
            'updated_by' => User::factory()->create()->id, // Create a user and use its id as updated_by
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'), // Random creation date within the last year
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'), // Random update date within the last year
            'deleted_at' => null, // Initially, no deletion
        ];
    }
}
