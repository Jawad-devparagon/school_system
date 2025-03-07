<?php

namespace App\Http\Controllers\Teacher;

use App\Actions\Teacher\Application\ApplicationCreate;
use App\Data\Teacher\Application\ApplicationData;
use App\Enums\TeacherApplicationStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Teacher\Application\CreateRequest;
use App\Models\Degree;
use Illuminate\Http\RedirectResponse;
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

    public function store(CreateRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['user_id'] = Auth::id();
        $data['status'] = TeacherApplicationStatusEnum::PENDING;
        ApplicationCreate::handle(ApplicationData::from($data));

        return redirect('dashboard');
    }
}
