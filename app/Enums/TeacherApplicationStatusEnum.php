<?php

namespace App\Enums;

enum TeacherApplicationStatusEnum: string
{
     case PENDING = 'pending';
     case REJECTED = 'rejected';
     case APPROVED = 'approved';
}
