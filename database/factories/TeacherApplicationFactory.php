<?php

namespace Database\Factories;

use App\Enums\TeacherApplicationStatusEnum;
use App\Models\TeacherApplication;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeacherApplicationFactory extends Factory
{
    protected $model = TeacherApplication::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'years_of_experience' => $this->faker->numberBetween(1, 10),
            'status' => TeacherApplicationStatusEnum::APPROVED,
        ];
    }
}
