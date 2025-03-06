<?php

namespace App\Data\User;

use App\Enums\GenderEnum;
use Carbon\Carbon;
use Spatie\LaravelData\Data;

class RegisterData extends Data
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
        public string $mobile_no,
        public string $address,
        public int $country_id,
        public Carbon $dob,
        public GenderEnum $gender,
    )
    {

    }
}