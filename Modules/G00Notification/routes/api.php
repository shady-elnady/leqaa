<?php

use Illuminate\Support\Facades\Route;
use Modules\G00Notification\Http\Controllers\G00NotificationController;
use Modules\G00Notification\Http\Controllers\NotificationController;

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
//     Route::apiResource('g00notification', G00NotificationController::class)->names('g00notification');
// });

Route::middleware(['auth:sanctum'])->group(function () {
    Route::middleware('isActive')->group(function () {
        Route::apiResource('/notifications', NotificationController::class);
    });
});
