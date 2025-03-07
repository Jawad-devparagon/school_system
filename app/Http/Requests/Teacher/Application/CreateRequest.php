<?php

namespace App\Http\Requests\Teacher\Application;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'years_of_experience' => ['required', 'integer', 'min:1'],
            'degrees' => ['required', 'array', Rule::exists('degrees', 'id')],
        ];
    }
}
