<?php

namespace App\Data\Teacher\Application;

use App\Enums\TeacherApplicationStatusEnum;
use Spatie\LaravelData\Data;

class ApplicationData extends Data
{
    public function __construct(
        public int $years_of_experience,
        public int $user_id,
        public TeacherApplicationStatusEnum $status,
        public array $degrees
    ) {}
}
