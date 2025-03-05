<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use JsonMachine\Items;

class CountriesSeeder extends Seeder
{
    public function run(): void
    {
        $file_path = storage_path('app/json/countries.json');
        $countries = Items::fromFile($file_path);

     foreach ($countries as $country)
     {
            Country::create([
                 'name' => $country->name,
                 'country_code' => $country->country_code,
                 'dial_code' => $country->dial_code,
                 'currency_code' => $country->currency_code,
                 'currency_symbol' => $country->currency_symbol
            ]);
     }

    }
}
