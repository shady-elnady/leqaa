<?php

use Illuminate\Support\Facades\Route;
use Modules\A00Contact\Http\Controllers\A00ContactController;
use Modules\A00Contact\Http\Controllers\AddressController;
use Modules\A00Contact\Http\Controllers\CitiyController;
use Modules\A00Contact\Http\Controllers\CountryController;
use Modules\A00Contact\Http\Controllers\GovernorateController;
use Modules\A00Contact\Http\Controllers\LocalityController;
use Modules\A00Contact\Http\Controllers\StateController;
use Modules\A00Contact\Http\Controllers\StreetController;

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
//     Route::apiResource('a00contact', A00ContactController::class)->names('a00contact');
// });
Route::middleware(['auth:sanctum'])->group(function () {
    Route::middleware('isActive')->group(function () {
        Route::apiResource('/addresses', AddressController::class);
        Route::apiResource('/countries', CountryController::class);
        Route::apiResource('/governorates', GovernorateController::class);
        Route::apiResource('/cities', CitiyController::class);
        Route::apiResource('/streets', StreetController::class);
        Route::apiResource('/states', StateController::class);
        Route::apiResource('/localities', LocalityController::class);
    });
});
