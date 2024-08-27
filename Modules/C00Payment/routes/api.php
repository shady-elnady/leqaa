<?php

use Illuminate\Support\Facades\Route;
use Modules\C00Payment\Http\Controllers\C00PaymentController;
use Modules\C00Payment\Http\Controllers\PaymentMethodController;
use Modules\C00Payment\Http\Controllers\PaymentStatusController;
use Modules\C00Payment\Http\Controllers\TransactionController;

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
//     Route::apiResource('c00payment', C00PaymentController::class)->names('c00payment');
// });
Route::middleware(['auth:sanctum'])->group(function () {
    Route::middleware('isActive')->group(function () {
        Route::apiResource('/payments-methods', PaymentMethodController::class);
        Route::apiResource('/payments-statusess', PaymentStatusController::class);
        Route::apiResource('/transactions', TransactionController::class);
    });
});
