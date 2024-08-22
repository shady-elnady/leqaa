<?php

use Illuminate\Support\Facades\Route;
use Modules\F00Reservation\Http\Controllers\F00ReservationController;

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

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('f00reservation', F00ReservationController::class)->names('f00reservation');
});
