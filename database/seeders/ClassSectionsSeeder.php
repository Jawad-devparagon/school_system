<?php

namespace Database\Seeders;

use App\Models\SchoolClass;
use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
class ClassSectionsSeeder extends Seeder
{
    public function run(): void
    {
         $classes = SchoolClass::all();
         $sections = Section::all();

         foreach ($classes as $class)
         {
             $class->sections()->attach($sections->random(rand(1,2))->pluck('id')->toArray());
         }
    }
}
