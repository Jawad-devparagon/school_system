<?php

namespace Database\Seeders;

use App\Models\SchoolClass;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassTeacherSubjectsSeeder extends Seeder
{
    public function run(): void
    {
         $classes = SchoolClass::all();
         $teachers = Teacher::all()->pluck('id')->toArray();
         $subjects = Subject::query();

      foreach ($classes as $class)
      {
          $class->teachers()->attach($teachers, ['subject_id' => $subjects->inRandomOrder()->limit(1)->value('id')]);
      }

    }
}
