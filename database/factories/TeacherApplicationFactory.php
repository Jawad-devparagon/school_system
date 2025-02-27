<?php

namespace Database\Factories;

use App\Enums\TeacherApplicationStatusEnum;
use App\Models\Degree;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeacherApplicationFactory extends Factory
{
    public function definition(): array
    {
        $degrees = Degree::query()->inRandomOrder()->limit(2)->pluck('id')->toArray();

        return [
            'years_of_experience' => $this->faker->numberBetween(1, 10),
            'degrees' => ['ids' => $degrees],
            'status' => $this->faker->randomElement(TeacherApplicationStatusEnum::values()),
        ];
    }
}
