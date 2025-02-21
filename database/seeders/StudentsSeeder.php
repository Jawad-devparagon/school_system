<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class StudentsSeeder extends Seeder
{
    public function run(): void
    {
         $studentUser = User::create([
             'name' => 'test student',
             'email' => 'test@student.com',
             'password' => Hash::make('12345678'),
             'mobile_no' => '123456789',
             'address' => 'Multan',
             'gender' => 'male',
             'dob' => Carbon::now(),
             'image' => 'noimg.png',
         ]);

        $studentUser->assignRole('student');

        $studentUser->student()->create([
            'guardian_name' => 'Test Guardian',
            'guardian_mobile' => '123456789',
            'status' => 'approved'
        ]);

    }
}
