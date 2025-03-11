<?php

namespace App\Console\Commands;

use App\Enums\TeacherApplicationStatusEnum;
use App\Models\TeacherApplication;
use Illuminate\Console\Command;

class ApproveTeacherApplicationCommand extends Command
{
    protected $signature = 'approve:teacher-application {application_id}';

    protected $description = 'Approving Teacher Applications';

    public function handle()
    {
        $application = TeacherApplication::find($this->argument('application_id'));

        $application->update([
            'status' => TeacherApplicationStatusEnum::APPROVED,
        ]);

        $teacher = $application->user->teacher()->create([
            'years_of_experience' => $application->years_of_experience,
        ]);

        $teacher->degrees()->attach($application->settings()->get('ids'));

        $this->info('Operation has been done successfully');
    }
}
