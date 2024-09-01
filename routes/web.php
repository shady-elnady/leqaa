<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return to_route('moonshine.index');
});

// Route::get('/', function () {
//     return ['Laravel' => app()->version()];
// });

// require __DIR__.'/auth.php';
