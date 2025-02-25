<?php

namespace Database\Factories;

use App\Models\SchoolClass;
use App\Models\Section;
use Illuminate\Database\Eloquent\Factories\Factory;

class EnrollmentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'school_class_id' => SchoolClass::query()->inRandomOrder()->value('id'),
            'section_id' => Section::query()->inRandomOrder()->value('id'),
            'year' => fake()->date(),
        ];
    }
}
