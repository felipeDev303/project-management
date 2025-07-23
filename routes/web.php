<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RouteController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('projects', ProjectController::class);
Route::get('/projects/get', [RouteController::class, 'get']);
Route::get('/projects/create', [RouteController::class, 'create']) ->name('projects.create');
Route::post('/projects/store', [RouteController::class, 'store']) ->name('projects.store');
Route::get('/projects/{id}/edit', [RouteController::class, 'edit']) ->name('projects.edit');
Route::put('/projects/{id}', [RouteController::class, 'update']) ->name('projects.update');
Route::delete('/projects/{id}', [RouteController::class, 'destroy']) ->name('projects.destroy');
Route::get('/projects/{id}', [RouteController::class, 'show']) ->name('projects.show');