<?php

use Illuminate\Support\Facades\Route;
use Modules\E00Event\Http\Controllers\E00EventController;
use Modules\E00Event\Http\Controllers\EventController;
use Modules\E00Event\Http\Controllers\EventPhotoController;
use Modules\E00Event\Http\Controllers\EventTypeController;

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
//     Route::apiResource('e00event', E00EventController::class)->names('e00event');
// });

Route::middleware(['auth:sanctum'])->group(function () {
    Route::middleware('isActive')->group(function () {
        Route::apiResource('/events', EventController::class);
        Route::apiResource('/events-types', EventTypeController::class);
        Route::apiResource('/events-photos', EventPhotoController::class);
    });
});
