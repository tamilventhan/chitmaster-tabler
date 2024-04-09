<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Agent;
use App\Models\Group;
use App\Models\Branch;
use App\Models\Policy;
use App\Models\Scheme;
use App\Models\Company;
use App\Models\Subscriber;
use App\Models\Designation;
use App\Models\Relationship;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Company::factory(10)->create();
        Branch::factory(10)->create();
        User::factory(10)->create();
        Agent::factory(10)->create();
        Designation::factory(10)->create();
        Subscriber::factory(10)->create();
        Scheme::factory(10)->create();
        Policy::factory(10)->create();
        Group::factory(10)->create();
        Relationship::factory(10)->create();
        Enrollment::factory(10)->create();

        User::factory()
            ->count(1)
            ->create([
                'email' => 'admin@admin.com',
                'password' => \Hash::make('admin'),
            ]);
    }
}
