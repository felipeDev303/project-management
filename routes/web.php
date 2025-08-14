<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;

// Ruta de bienvenida redirige al dashboard
Route::get('/', function () {
    return redirect()->route('dashboard');
});

// Ruta del Dashboard principal
Route::get('/dashboard', function () {
    // Obtener estadísticas básicas para el dashboard
    $stats = [
        'total' => \App\Models\Project::count(),
        'pendiente' => \App\Models\Project::where('status', 'pendiente')->count(),
        'en_progreso' => \App\Models\Project::where('status', 'en_progreso')->count(),
        'completado' => \App\Models\Project::where('status', 'completado')->count(),
    ];
    
    return view('dashboard', compact('stats'));
})->name('dashboard');

// Ruta de prueba para el componente UF
Route::get('/test-uf', function () {
    return view('test-uf');
});

// Rutas web (devuelven vistas)
Route::resource('projects', ProjectController::class);

// Rutas API (devuelven JSON)
Route::prefix('api')->group(function () {
    Route::get('/projects', [ProjectController::class, 'api_index']); // 1. Listar todos los proyectos
    Route::post('/projects', [ProjectController::class, 'api_store']); // 2. Agregar proyecto
    Route::get('/projects/{id}', [ProjectController::class, 'api_show']); // 5. Obtener proyecto por ID
    Route::put('/projects/{id}', [ProjectController::class, 'api_update']); // 4. Actualizar proyecto por ID
    Route::delete('/projects/{id}', [ProjectController::class, 'api_destroy']); // 3. Eliminar proyecto por ID
});
