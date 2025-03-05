<?php

namespace App\Http\Controllers\Teacher\Auth;

use App\Actions\Teacher\Register;
use App\Data\Teacher\RegisteredData;
use App\Enums\GenderEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Teachers\Auth\RegisterRequest;
use App\Models\Country;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Concurrency;
use Inertia\Inertia;

class RegistrationController extends Controller
{
     public function create()
     {
         [$countries, $genders] = Concurrency::run([
             fn() => Country::getFormattedCountries(),
             fn() => GenderEnum::getFormattedValues()
         ]);
         return Inertia::render('Teacher/Auth/Register', [
              'countries' => $countries,
              'genders' => $genders
         ]);
     }

     public function store(RegisterRequest $request)
     {
         $data = $request->validated();
         $file = $request->file('image');
         $fileName = time() . '_' . $file->getClientOriginalName();
         $file->storeAs('uploads', $fileName);
         $data['image'] = $fileName;

         $teacher = Register::handle(RegisteredData::from($data));

         $teacher->assignRole('teacher');

         event(new Registered($teacher));

         Auth::login($teacher);

         return redirect(route('dashboard', absolute: false));
     }
}
