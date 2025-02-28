<?php

namespace Database\Seeders;

use App\Models\ClassTeacherSubject;
use Illuminate\Database\Seeder;

class ClassTeacherSubjectsSeeder extends Seeder
{
    public function run(): void
    {
        ClassTeacherSubject::factory()->count(5)->create();
    }
}
