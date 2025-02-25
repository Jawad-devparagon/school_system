<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectsSeeder extends Seeder
{
    public function run(): void
    {
         $subjectsData = [
             ['name' => 'Islamiyat'],
             ['name' => 'Urdu'],
             ['name' => 'English'],
             ['name' => 'Math'],
             ['name' => 'Pak Study'],
             ['name' => 'Science'],
         ];

            Subject::insert($subjectsData);
    }
}
