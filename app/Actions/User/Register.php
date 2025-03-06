<?php

namespace App\Actions\User;

use App\Data\User\RegisterData;
use App\Models\User;

class Register
{
    public static function handle(RegisterData $data): User
    {
        return User::create($data->toArray());
    }
}