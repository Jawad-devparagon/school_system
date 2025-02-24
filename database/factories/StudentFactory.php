<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'guardian_name' => fake()->name(),
            'guardian_mobile' => fake()->e164PhoneNumber(),
            'status' => 'approved',
        ];
    }
}
