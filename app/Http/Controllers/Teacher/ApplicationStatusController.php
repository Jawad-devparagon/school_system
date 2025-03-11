<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\TeacherApplication;
use Inertia\Inertia;
use Inertia\Response;

class ApplicationStatusController extends Controller
{
    public function index(TeacherApplication $application): Response
    {
        return Inertia::render('Teacher/Application/ApplicationStatus', [
            'status' => $application->status,
        ]);
    }
}
