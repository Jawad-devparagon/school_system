<?php

namespace App\Actions\Teacher\Application;

use App\Data\Teacher\Application\ApplicationData;
use App\Models\TeacherApplication;
use App\Models\User;

class CreateApplication
{
    public static function handle(ApplicationData $data, User $user): TeacherApplication
    {

        $teacherApplication = TeacherApplication::create(array_merge($data->toArray(), ['user_id' => $user->id, 'degrees' => null]));
        $teacherApplication->settings()->set('ids', $data->degrees);

        return $teacherApplication;
    }
}
