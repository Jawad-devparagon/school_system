<?php

namespace Database\Factories;

use App\Enums\StudentStatusEnum;
use Illuminate\Database\Eloquent\Factories\Factory;
class StudentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'guardian_name' => fake()->name,
            'guardian_mobile' => fake()->unique()->PhoneNumber(),
            'status' => fake()->randomElement(StudentStatusEnum::cases())
        ];
    }
}
