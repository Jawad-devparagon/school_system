<?php

namespace App\Http\Middleware;

use App\Enums\TeacherApplicationStatusEnum;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ApplicationApprovedMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        $latestApplication = $user->latestTeacherApplication();
        if ($latestApplication->status !== TeacherApplicationStatusEnum::APPROVED) {
            return redirect()->route('teacher.applicationStatus.index');
        }

        return $next($request);
    }
}
