<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            DegreesSeeder::class,
            RolesAndPermissionsSeeder::class,
            SectionsSeeder::class,
            SchoolClassSeeder::class,
            ClassSectionsSeeder::class,
            SubjectsSeeder::class,
            ClassSubjectsSeeder::class,
            UserSeeder::class,
            ClassTeacherSubjectsSeeder::class,
        ]);
    }
}
