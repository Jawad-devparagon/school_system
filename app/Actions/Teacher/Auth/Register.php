<?php

namespace App\Actions\Teacher\Auth;

use App\Data\Teacher\Auth\RegistrationData;
use App\Models\User;

class Register
{
    public static function handle(RegistrationData $data): User
    {
        return User::create($data->toArray());
    }
}
