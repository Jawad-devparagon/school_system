<?php

namespace Database\Seeders;

use App\Models\SchoolClass;
use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassSubjectsSeeder extends Seeder
{
    public function run(): void
    {
         $classes = SchoolClass::all();
         $subjects = Subject::all();

        foreach ($classes as $class) {
                $class->subjects()->attach($subjects->random(rand(3,5))->pluck('id')->toArray());
         }
    }
}
