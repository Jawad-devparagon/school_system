<?php

namespace App\Actions\Teacher\Auth;

use App\Actions\User\Register as UserRegister;
use App\Data\Teacher\Auth\RegistrationData;
use App\Data\User\RegisterData;
use App\Models\User;

class Register
{
    public static function handle(RegistrationData $data): User
    {
        $user = UserRegister::handle(RegisterData::from($data));
        return $user->assignRole('teacher');
    }
}
