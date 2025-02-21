<?php

namespace Database\Seeders;

use App\Enums\TeacherApplicationStatusEnum;
use App\Models\Degree;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TeachersSeeder extends Seeder
{
    public function run(): void
    {
         $teacherUser = User::create([
             'name' => 'test teacher',
             'email' => 'test@teacher.com',
             'password' => Hash::make('12345678'),
             'mobile_no' => '123456789',
             'address' => 'Multan',
             'gender' => 'male',
             'dob' => Carbon::now(),
             'image' => 'noimg.png',
         ]);

         $degrees = Degree::inRandomOrder()->limit(3)->pluck('id')->toArray();

        $teacherApplication = $teacherUser->application()->create([
            'years_of_experience' => 2,
            'degrees' => $degrees,
            'status' => TeacherApplicationStatusEnum::APPROVED,
        ]);

         $teacherUser->assignRole('teacher');

        $teacher = $teacherUser->teacher()->create([
            'years_of_experience' => $teacherApplication->years_of_experience
        ]);

        $teacher->degrees()->attach($teacherApplication->degrees);
    }
}
