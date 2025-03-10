<?php

namespace App\Actions\Teacher\Application;

use App\Data\Teacher\Application\ApplicationData;
use App\Models\TeacherApplication;
use App\Models\User;

class CreateApplication
{
    public static function handle(ApplicationData $data, User $user): TeacherApplication
    {
        $degrees = [];
        if (property_exists($data, 'degrees')) {
            $degrees = $data->degrees;
            unset($data->degrees);
        }

        $teacherApplication = TeacherApplication::create(array_merge(['user_id' => $user->id], $data->toArray()));
        $teacherApplication->settings()->set('ids', $degrees);

        return $teacherApplication;
    }
}
