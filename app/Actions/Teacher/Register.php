<?php

namespace App\Actions\Teacher;

use App\Data\Teacher\RegisteredData;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Register
{
    public static function handle(RegisteredData $data): User
    {
        return User::create([
            'name' => $data->name,
            'email' => $data->email,
            'password' => Hash::make($data->password),
            'country_id' => $data->country_id,
            'mobile_no' => $data->mobile_no,
            'address' => $data->address,
            'dob' => $data->dob,
            'gender' => $data->gender,
            'image' => $data->image
        ]);
    }
}
