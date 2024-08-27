<?php

use Illuminate\Support\Facades\Route;
use Modules\D00Organization\Http\Controllers\CollegeController;
use Modules\D00Organization\Http\Controllers\D00OrganizationController;
use Modules\D00Organization\Http\Controllers\OrganizationController;
use Modules\D00Organization\Http\Controllers\OrganizationTypeController;
use Modules\D00Organization\Http\Controllers\UniversityController;

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
//     Route::apiResource('d00organization', D00OrganizationController::class)->names('d00organization');
// });

Route::middleware(['auth:sanctum'])->group(function () {
    Route::middleware('isActive')->group(function () {
        Route::apiResource('/organizations-types', OrganizationTypeController::class);
        Route::apiResource('/organizations', OrganizationController::class);
        Route::apiResource('/colleges', CollegeController::class);
        Route::apiResource('/universities', UniversityController::class);
    });
});
