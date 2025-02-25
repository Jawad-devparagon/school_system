<?php

namespace Database\Seeders;

use App\Models\SchoolClass;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SchoolClassSeeder extends Seeder
{
    public function run(): void
    {
         $classesData = [
             ['name' => 'one', 'fee' => 500],
             ['name' => 'two', 'fee' => 700],
             ['name' => 'three', 'fee' => 800],
             ['name' => 'four', 'fee' => 1000],
             ['name' => 'five', 'fee' => 1500],
         ];

         SchoolClass::insert($classesData);
    }
}
