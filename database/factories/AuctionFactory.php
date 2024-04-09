<?php

namespace Database\Factories;

use App\Models\Group;
use App\Models\Enrollment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Auction>
 */
class AuctionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            
            'group_id' => Group::inRandomOrder()->first()->id,
            'enrollment_id' => Enrollment::inRandomOrder()->first()->id,
            'date' => $this->faker->date(),
            'time' => $this->faker->time(),
            'bid_amount' => $this->faker->randomFloat(2, 0, 1000),
            'created_by' => null,
            'updated_by' => null,
            'deleted_by' => null,
        ];
    }
}
