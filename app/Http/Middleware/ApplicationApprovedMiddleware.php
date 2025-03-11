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
        if (Auth::check() && Auth::user()->application->status === TeacherApplicationStatusEnum::APPROVED) {
            return $next($request);
        }

        return redirect()->back();
    }
}
