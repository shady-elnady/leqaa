<?php

use Illuminate\Support\Facades\Route;
use Modules\F00Reservation\Http\Controllers\F00ReservationController;
use Modules\F00Reservation\Http\Controllers\ReservationController;

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
//     Route::apiResource('f00reservation', F00ReservationController::class)->names('f00reservation');
// });

Route::middleware(['auth:sanctum'])->group(function () {
    Route::middleware('isActive')->group(function () {
        Route::apiResource('/reservations', ReservationController::class);
    });
});
