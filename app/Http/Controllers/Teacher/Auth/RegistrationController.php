<?php

namespace App\Http\Controllers\Teacher\Auth;

use App\Actions\Teacher\Auth\Register;
use App\Data\Teacher\Auth\RegistrationData;
use App\Enums\GenderEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Teacher\Auth\RegisterRequest;
use App\Models\Country;
use Carbon\Carbon;
use Illuminate\Support\Facades\Concurrency;
use Inertia\Inertia;

class RegistrationController extends Controller
{
    public function create()
    {
        [$countries, $genders] = Concurrency::run([
            fn () => Country::getFormattedCountries(),
            fn () => GenderEnum::getFormattedValues(),
        ]);

        return Inertia::render('Teacher/Auth/Register', [
            'countries' => $countries,
            'genders' => $genders,
        ]);
    }

    public function store(RegisterRequest $request)
    {
        $data = $request->validated();
        $data['dob'] = Carbon::parse($data['dob']);

        Register::handle(RegistrationData::from($data));

        return redirect(route('teacher.application.create'));
    }
}
