<?php

namespace Database\Factories;

use App\Models\SchoolClass;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClassTeacherSubjectFactory extends Factory
{
    public function definition(): array
    {
        $class = SchoolClass::query()->inRandomOrder()->limit(1)->value('id');
        $teacher = Teacher::query()->inRandomOrder()->limit(1)->value('id');
        $subject = Subject::query()->inRandomOrder()->limit(1)->value('id');

        return [
            'school_class_id' => $class,
            'teacher_id' => $teacher,
            'subject_id' => $subject,
        ];
    }
}
