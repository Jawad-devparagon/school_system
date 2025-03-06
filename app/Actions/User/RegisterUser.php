<?php

namespace App\Actions\User;

use App\Data\User\RegisterData;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

class RegisterUser
{
    public static function handle(RegisterData $data): User
    {
        $user = User::create($data->toArray());
        $user->assignRole('teacher');

        event(new Registered($user));

        Auth::login($user);

        return $user;
    }
}
