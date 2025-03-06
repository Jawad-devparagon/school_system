<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Concurrency;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Concurrency::run([
            fn() => Artisan::call('db:seed', ['--class' => DegreesSeeder::class]),
            fn() => Artisan::call('db:seed', ['--class' => RolesAndPermissionsSeeder::class]),
            fn() => Artisan::call('db:seed', ['--class' => SectionsSeeder::class]),
            fn() => Artisan::call('db:seed', ['--class' => CountriesSeeder::class]),
            fn() => Artisan::call('db:seed', ['--class' => SubjectsSeeder::class]),
            fn() => Artisan::call('db:seed', ['--class' => SchoolClassSeeder::class]),
        ]);

        $this->call([
            ClassSectionsSeeder::class,
            ClassSubjectsSeeder::class,
            UserSeeder::class,
            ClassTeacherSubjectsSeeder::class,
        ]);

    }
}
