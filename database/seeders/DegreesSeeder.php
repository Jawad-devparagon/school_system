<?php

namespace Database\Seeders;

use App\Models\Degree;
use Illuminate\Database\Seeder;

class DegreesSeeder extends Seeder
{
    public function run(): void
    {
        $degrees = [
            ['name' => 'Matric'],
            ['name' => 'Inter'],
            ['name' => 'FA'],
            ['name' => 'FSc'],
            ['name' => 'ICS'],
            ['name' => 'ICom'],
            ['name' => 'BA'],
            ['name' => 'BSc'],
            ['name' => 'BS-IT'],
            ['name' => 'BS-CS'],
            ['name' => 'BS-Math'],
            ['name' => 'BBA'],
            ['name' => 'MBA'],
            ['name' => 'MA'],
            ['name' => 'MS-Economics'],
            ['name' => 'MPhil'],
            ['name' => 'PhD']
        ];

        Degree::insert($degrees);
    }
}
