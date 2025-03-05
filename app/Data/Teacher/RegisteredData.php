<?php
namespace App\Data\Teacher;

use App\Enums\GenderEnum;
use Carbon\Carbon;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;

class RegisteredData extends Data
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
        public string $mobile_no,
        public string $address,
        public int $country_id,
        #[WithCast(DateTimeInterfaceCast::class, format: 'Y-m-d')]
        public Carbon $dob,
        public GenderEnum $gender,
        public string $image,
    ) {}
}

