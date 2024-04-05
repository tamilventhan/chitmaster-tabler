<?php

namespace Database\Factories;

use App\Models\Policy;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Policy>
 */
class PolicyFactory extends Factory
{
    protected $model = Policy::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->word,
            'bonus' => $this->faker->randomFloat(2, 0, 1000),
            'penalty_ps' => $this->faker->randomFloat(2, 0, 1000),
            'penalty_nps' => $this->faker->randomFloat(2, 0, 1000),
            'penalty_days_limit' => $this->faker->randomNumber(),
            'bonus_days_limit' => $this->faker->randomNumber(),
            'company_commission' => $this->faker->randomFloat(2, 0, 100),
            'agent_commission' => $this->faker->randomFloat(2, 0, 100),
            'subscriber_commission' => $this->faker->randomFloat(2, 0, 100),
            'employee_commission' => $this->faker->randomFloat(2, 0, 100),
            'enrollment_fees' => $this->faker->randomFloat(2, 0, 1000),
            'document_charges' => $this->faker->randomFloat(2, 0, 1000),
            'no_of_full_due_month' => $this->faker->randomNumber(),
            'tds_with_pan' => $this->faker->randomFloat(2, 0, 100),
            'tds_without_pan' => $this->faker->randomFloat(2, 0, 100),
            'gst' => $this->faker->randomFloat(2, 0, 100),
            'created_by' => null,
            'updated_by' => null,
            'deleted_by' => null,
        ];
    }
}
