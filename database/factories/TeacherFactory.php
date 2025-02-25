<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TeacherFactory extends Factory
{
    public function definition(): array
    {
        return [
            'years_of_experience' => $this->faker->numberBetween(1, 10),
        ];
    }
}
