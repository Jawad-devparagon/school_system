<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountriesSeeder extends Seeder
{
    public function run(): void
    {
        $countries = json_decode(file_get_contents(storage_path('app/json/countries.json')), true);

            Country::insert($countries);
    }
}
