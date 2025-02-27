<?php

namespace Database\Factories;

use App\Enums\StudentStatusEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'guardian_name' => $this->faker->name,
            'guardian_mobile' => $this->faker->unique()->PhoneNumber(),
            'status' => $this->faker->randomElement(StudentStatusEnum::values()),
        ];
    }
}
