<?php

namespace Database\Seeders;

use App\Models\Degree;
use App\Models\Teacher;
use App\Models\TeacherApplication;
use App\Models\User;
use Illuminate\Database\Seeder;

class TeachersSeeder extends Seeder
{
    public function run(): void
    {
        $teachers = User::factory()
            ->count(5)
            ->create()
            ->each(function ($user) {

                $user->assignRole('teacher');

                $teacherApplication = TeacherApplication::factory()->create([
                    'user_id' => $user->id,
                ]);

                $teacher = Teacher::factory()->create([
                    'user_id' => $user->id,
                    'years_of_experience' => $teacherApplication->years_of_experience,
                ]);

                $degrees = Degree::inRandomOrder()->limit(3)->pluck('id')->toArray();
                $teacher->degrees()->attach($degrees);
            });

    }
}
