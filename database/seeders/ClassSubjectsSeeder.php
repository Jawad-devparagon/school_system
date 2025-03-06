<?php

namespace Database\Seeders;

use App\Models\SchoolClass;
use App\Models\Subject;
use Illuminate\Database\Seeder;

class ClassSubjectsSeeder extends Seeder
{
    public function run(): void
    {
        $classes = SchoolClass::query()->get();
        $subjects = Subject::query()->get();

        $classes->each(function ($class) use ($subjects) {
            $class->subjects()->attach($subjects->random(rand(3, 5))->pluck('id')->toArray());
        });
    }
}
