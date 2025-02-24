<?php

namespace App\Enums;

use App\Traits\EnumToArray;

enum GenderEnum: string
{
    use EnumToArray;
    case MALE = 'male';

    case FEMALE = 'female';

    case OTHER = 'other';

}
