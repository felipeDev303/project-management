<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;

// Ruta de bienvenida
Route::get('/', function () {
    return view('welcome');
});

// Ruta de prueba para el componente UF
Route::get('/test-uf', function () {
    return view('test-uf');
});

// Rutas web (devuelven vistas)
Route::resource('projects', ProjectController::class);

// Rutas API (devuelven JSON)
Route::prefix('api')->group(function () {
    Route::get('/projects', [ProjectController::class, 'api_index']);
});
