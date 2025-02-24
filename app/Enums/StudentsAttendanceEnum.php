<?php

namespace App\Enums;

enum StudentsAttendanceEnum: string
{
    case PRESENT = 'present';
    case ABSENT = 'absent';
    case LEAVE = 'leave';
}
