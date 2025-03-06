<?php

namespace Database\Seeders;

use App\Models\SchoolClass;
use App\Models\Section;
use Illuminate\Database\Seeder;

class ClassSectionsSeeder extends Seeder
{
    public function run(): void
    {
        $classes = SchoolClass::query()->get();
        $sections = Section::query()->get();

        $classes->each(function ($class) use ($sections) {
            $class->sections()->attach($sections->random(rand(1, 2))->pluck('id')->toArray());
        });
    }
}
