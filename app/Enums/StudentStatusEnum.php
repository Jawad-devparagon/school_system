<?php

namespace App\Enums;

use App\Traits\EnumToArray;

enum StudentStatusEnum: string
{
    use EnumToArray;
    case PENDING = 'pending';
    case APPROVED = 'approved';
    case REJECTED = 'rejected';
}
