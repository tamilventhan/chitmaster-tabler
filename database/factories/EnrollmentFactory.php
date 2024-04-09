<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Agent;
use App\Models\Group;
use App\Models\Employee;
use App\Models\Enrollment;
use App\Models\Subscriber;
use App\Models\Relationship;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Enrollment>
 */
class EnrollmentFactory extends Factory
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
            'ticket' => $faker->randomNumber(),
            'subscriber_id' => Subscriber::inRandomOrder()->first()->id,
            'agent_id' => Agent::inRandomOrder()->first()->id,
            'employee_id' => Employee::inRandomOrder()->first()->id,
            'nominee' => $faker->name,
            'relationship_id' => Relationship::inRandomOrder()->first()->id,
            'created_by' => User::inRandomOrder()->first()->id,
            'updated_by' => User::inRandomOrder()->first()->id,
            'deleted_by' => User::inRandomOrder()->first()->id,
        ];
    }
}