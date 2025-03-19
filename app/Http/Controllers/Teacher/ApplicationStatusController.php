<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class ApplicationStatusController extends Controller
{
    public function index(): Response
    {
        $user = Auth::user();

        return Inertia::render('Teacher/Application/ApplicationStatus', [
            'status' => $user->latestTeacherApplication()->status,
        ]);
    }
}
