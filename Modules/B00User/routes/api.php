<?php

use Illuminate\Support\Facades\Route;
use Modules\B00User\Http\Controllers\AdminController;
use Modules\B00User\Http\Controllers\B00UserController;
use Modules\B00User\Http\Controllers\InterestController;
use Modules\B00User\Http\Controllers\LecturerController;
use Modules\B00User\Http\Controllers\StudentController;

/*
 *--------------------------------------------------------------------------
 * API Routes
 *--------------------------------------------------------------------------
 *
 * Here is where you can register API routes for your application. These
 * routes are loaded by the RouteServiceProvider within a group which
 * is assigned the "api" middleware group. Enjoy building your API!
 *
*/

// Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
//     Route::apiResource('b00user', B00UserController::class)->names('b00user');
// });

Route::middleware(['auth:sanctum'])->group(function () {
    Route::middleware('isActive')->group(function () {
        Route::apiResource('/admins', AdminController::class);
        Route::apiResource('/lecturers', LecturerController::class);
        Route::apiResource('/lecturers', StudentController::class);
        Route::apiResource('/lecturers', InterestController::class);
    });
});
