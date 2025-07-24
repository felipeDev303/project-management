<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;

// Ruta de bienvenida
Route::get('/', function () {
    return view('welcome');
});

// Rutas de recursos para el controlador de proyectos
Route::resource('projects', ProjectController::class);
