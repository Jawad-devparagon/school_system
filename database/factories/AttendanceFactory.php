<?php

namespace Database\Factories;

use App\Enums\AtendanceStatusEnum;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

class AttendanceFactory extends Factory
{
    public function definition(): array
    {
        return [
            'subject_id' => Subject::query()->inRandomOrder()->value('id'),
            'date' => fake()->date(),
            'status' => fake()->randomElement(AtendanceStatusEnum::cases()),
        ];
    }
}
