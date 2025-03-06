<?php
namespace App\Data\Teacher\Auth;

use App\Enums\GenderEnum;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;

class RegistrationData extends Data
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
        public string $mobile_no,
        public string $address,
        public int $country_id,
        public $dob,
        public GenderEnum $gender,
    ) {}
}

