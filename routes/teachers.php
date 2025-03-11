<?php

use App\Http\Controllers\Teacher\ApplicationController;
use App\Http\Controllers\Teacher\ApplicationStatusController;
use App\Http\Controllers\Teacher\Auth\RegistrationController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegistrationController::class, 'create'])->name('register.create');
    Route::post('register', [RegistrationController::class, 'store'])->name('register.store');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('application', [ApplicationController::class, 'create'])->name('application.create');
    Route::post('application', [ApplicationController::class, 'store'])->name('application.store');

    Route::get('application/{application}', [ApplicationStatusController::class, 'index'])->name('application.index');
});
