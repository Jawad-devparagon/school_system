<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Country extends Model
{
    protected $fillable = ['country_code', 'name', 'dial_code', 'currency_code', 'currency_symbol'];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public static function getFormattedCountries(): Collection
    {
        return Country::all()->map(function ($country) {
            return [
                'value' => $country->id,
                'label' => $country->name,
            ];
        });
    }
}
