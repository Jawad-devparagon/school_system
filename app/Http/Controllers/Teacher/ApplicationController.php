<?php

namespace App\Http\Controllers\Teacher;

use App\Actions\Teacher\Application\CreateApplication;
use App\Data\Teacher\Application\ApplicationData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Teacher\Application\ApplicationRequest;
use App\Models\Degree;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class ApplicationController extends Controller
{
    public function create(): Response
    {
        return Inertia::render('Teacher/Application/Create', [
            'degrees' => Degree::getFormattedDegrees(),
        ]);
    }

    public function store(ApplicationRequest $request): \Symfony\Component\HttpFoundation\Response
    {
        $data = $request->validated();
        $application = CreateApplication::handle(ApplicationData::from($data), Auth::user());

        return redirect()->route('teacher.application.index', $application->id);
    }
}
