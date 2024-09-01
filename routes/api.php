<?php

use App\Http\Controllers\Api\ForgetPasswordController;
use App\Http\Controllers\Api\LogInApiController;
use App\Http\Controllers\Api\LogOutApiController;
use App\Http\Controllers\Api\PasswordApiController;
use App\Http\Controllers\Api\RegisterApiController;
use App\Http\Controllers\Api\ResetPasswordController;
use App\Http\Controllers\Api\VerifyPasswordController;
use App\Http\Controllers\Common\VerificationController;
use App\Http\Middleware\IsActive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('register', RegisterApiController::class);

Route::post('login', LogInApiController::class);

Route::prefix('password')->group(function () {
    Route::post('forget', ForgetPasswordController::class);
    Route::post('verify', VerifyPasswordController::class);
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::middleware([IsActive::class])->group(function () {
        Route::post('logout', LogOutApiController::class);

        // Route::post('upload', [MediaController::class, 'upload']);

        // Route::post('my-phone/get-otp', [ProfileController::class, 'getOtp']);
        // Route::post('my-phone/update', [ProfileController::class, 'updatePhone']);

        Route::post('resend-otp', VerificationController::class);

        Route::prefix('password')->group(function () {
            Route::post('change', [PasswordApiController::class, 'change']);
            Route::post('reset', ResetPasswordController::class);
        });
    });
});
