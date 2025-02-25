<?php

namespace App\Enums;

use App\Traits\EnumToArray;

enum AtendanceStatusEnum: string
{
    use EnumToArray;
     case PRESENT = 'present';

     case ABSENT = 'absent';

     case LEAVE = 'leave';
}
