<?php

namespace Database\Factories;

use App\Models\Scheme;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Scheme>
 */
class SchemeFactory extends Factory
{
    protected $model = Scheme::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->word,
            'chit_value' => $this->faker->randomFloat(2, 0, 1000000),
            'chit_month' => $this->faker->randomNumber(),
            'created_by' => null,
            'updated_by' => null,
        ];
    }
}
