<?php

namespace App\Actions\Teacher\Application;

use App\Data\Teacher\Application\ApplicationData;
use App\Models\TeacherApplication;

class CreateApplication
{
    public static function handle(ApplicationData $data, $user): TeacherApplication
    {
        $data = $data->toArray();
        $data['user_id'] = $user->id;
        $data['degrees'] = ['ids' => $data['degrees']];

        return TeacherApplication::create($data);
    }
}
