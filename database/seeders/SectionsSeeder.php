<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Seeder;

class SectionsSeeder extends Seeder
{
    public function run(): void
    {
        $sectionsData = [
            ['name' => 'A'],
            ['name' => 'B'],
        ];

        Section::insert($sectionsData);
    }
}
