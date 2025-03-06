<?php

namespace App\Http\Controllers\Auth;

use App\Enums\GenderEnum;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Inertia\Response;

class RegisteredUserController extends Controller
{
    public function create(): Response
    {
        return Inertia::render('Auth/Register', [
            'countries' => Country::getFormattedCountries(),
            'genders' => GenderEnum::getFormattedValues(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:'.User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'country_id' => ['required', Rule::exists('countries', 'id')],
            'mobile_no' => ['required', 'string', 'regex:/^\+?[0-9]{10,15}$/'],
            'address' => ['required'],
            'dob' => ['required', 'date', 'before_or_equal:today'],
            'gender' => ['required', Rule::in(GenderEnum::values())],
            'image' => ['required', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ]);

        $file = $request->file('image');
        $fileName = time().'_'.$file->getClientOriginalName();
        $file->storeAs('uploads', $fileName);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'country_id' => $request->country_id,
            'mobile_no' => $request->mobile_no,
            'address' => $request->address,
            'dob' => $request->dob,
            'gender' => $request->gender,
            'image' => $fileName,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
