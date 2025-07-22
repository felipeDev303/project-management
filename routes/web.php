<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RouteController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/get', [RouteController::class, 'get']);

// post
// put
// delete