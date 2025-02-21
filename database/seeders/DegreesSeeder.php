<?php

namespace Database\Seeders;

use App\Models\Degree;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DegreesSeeder extends Seeder
{
    public function run(): void
    {
        $degrees = ['MA', 'BS-IT', 'BS-Math', 'MS-Economics'];

      foreach ($degrees as $degree) {
          Degree::updateOrCreate([
              'name' => $degree
          ]);
      }

    }
}
