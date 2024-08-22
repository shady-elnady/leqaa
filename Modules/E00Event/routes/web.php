<?php

use Illuminate\Support\Facades\Route;
use Modules\E00Event\Http\Controllers\E00EventController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group([], function () {
    Route::resource('e00event', E00EventController::class)->names('e00event');
});
