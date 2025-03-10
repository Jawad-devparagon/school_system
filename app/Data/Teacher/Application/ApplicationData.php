<?php

namespace App\Data\Teacher\Application;

use Spatie\LaravelData\Data;

class ApplicationData extends Data
{
    public function __construct(
        public int $years_of_experience,
        public array $degrees
    ) {}
}
