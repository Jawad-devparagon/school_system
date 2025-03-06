<?php

use App\Http\Controllers\Teacher\Auth\RegistrationController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function (){
    Route::get('register', [RegistrationController::class, 'create'])->name('register');;
    Route::post('register', [RegistrationController::class, 'store']);
});

