<?php

namespace Database\Factories;

use App\Models\Group;
use App\Models\Policy;
use App\Models\Scheme;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Group>
 */
class GroupFactory extends Factory
{
    protected $model = Group::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            
            'name' => $this->faker->unique()->word,
            'auction_date' => $this->faker->date(),
            'auction_time' => $this->faker->time(),
            'commencement' => $this->faker->date(),
            'termination' => $this->faker->date(),
            'scheme_id' => function () {
                return \App\Models\Scheme::factory()->create()->id;
            },
            'policy_id' => function () {
                return \App\Models\Policy::factory()->create()->id;
            },
            'created_by' => null,
            'updated_by' => null,
            'deleted_by' => null,
        ];
    }
}
