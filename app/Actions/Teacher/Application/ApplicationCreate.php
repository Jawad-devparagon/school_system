<?php

namespace App\Actions\Teacher\Application;

use App\Data\Teacher\Application\ApplicationData;
use App\Models\TeacherApplication;

class ApplicationCreate
{
    public static function handle(ApplicationData $data): TeacherApplication
    {
        return TeacherApplication::create($data->toArray());
    }
}
