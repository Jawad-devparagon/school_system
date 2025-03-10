<?php

namespace App\Console\Commands;

use App\Enums\TeacherApplicationStatusEnum;
use App\Models\Teacher;
use App\Models\TeacherApplication;
use Illuminate\Console\Command;

class ApproveTeacherApplicationCommand extends Command
{
    protected $signature = 'approve:teacher-application';

    protected $description = 'Approving Teacher Applications';

    public function handle()
    {
        $application = TeacherApplication::find(12);
        $application->status = TeacherApplicationStatusEnum::APPROVED;
        $application->save();

        $teacher = Teacher::create([
            'user_id' => $application->user_id,
            'years_of_experience' => $application->years_of_experience,
        ]);

        $teacher->degrees()->attach($application->settings()->get('ids'));

        $this->info('Operation has been done successfully');
    }
}
