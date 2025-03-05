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
            'password' => ['required', 'confirmed', Password::min('8')],
            'country_id' => ['required', Rule::exists('countries', 'id')],
            'mobile_no' => ['required', 'string', 'regex:/^\+?[0-9]{10,15}$/'],
            'address' => ['required'],
            'dob' => ['required', 'date', 'before_or_equal:today'],
            'gender' => ['required', Rule::in(GenderEnum::values())],
            'image' => ['required', 'image', 'mimes:jpg,jpeg,png', 'max:2048']
        ];
    }
}
