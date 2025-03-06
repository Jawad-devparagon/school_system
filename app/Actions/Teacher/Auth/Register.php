<?php

namespace App\Actions\Teacher\Auth;

use App\Actions\User\RegisterUser;
use App\Data\Teacher\Auth\RegistrationData;
use App\Data\User\RegisterData;
use App\Models\User;

class Register
{
    public static function handle(RegistrationData $data): User
    {
        return RegisterUser::handle(RegisterData::from($data));
    }
}
