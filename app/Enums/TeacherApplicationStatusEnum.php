<?php

namespace App\Enums;

use App\Traits\EnumToArray;

enum TeacherApplicationStatusEnum: string
{
    use EnumToArray;
    case PENDING = 'pending';
    case REJECTED = 'rejected';
    case APPROVED = 'approved';
}
