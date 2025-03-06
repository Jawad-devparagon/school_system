<?php

namespace App\Http\Requests\Teacher\Auth;

use App\Enums\GenderEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', Password::defaults()],
            'country_id' => ['required', Rule::exists('countries', 'id')],
            'mobile_no' => ['required', 'regex:/^\+?[0-9]{10,15}$/'],
            'address' => ['required'],
            'dob' => ['required', 'date', 'before_or_equal:today'],
            'gender' => ['required', Rule::in(GenderEnum::values())],
        ];
    }
}
