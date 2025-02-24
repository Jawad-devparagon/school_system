<?php

namespace Database\Factories;

use App\Enums\TeacherApplicationStatusEnum;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeacherApplicationFactory extends Factory
{
    public function definition(): array
    {
        return [
            'years_of_experience' => $this->faker->numberBetween(1, 10),
            'status' => $this->faker->randomElement(TeacherApplicationStatusEnum::values()),
        ];
    }
}
