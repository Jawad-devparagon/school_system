<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Seeder;

class StudentsSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->count(5)->create()
            ->each(function ($user) {
                $user->assignRole('student');
                Student::factory()->create([
                    'user_id' => $user->id,
                ]);
            });
    }
}
