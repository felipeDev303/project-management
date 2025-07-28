@extends('layouts.app')

@section('title', 'Dashboard - Gestión de Proyectos')

@section('content')
<div class="row">
    <!-- Header del Dashboard -->
    <div class="col-12 mb-4">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1 class="h3 mb-1 text-custom-dark">Dashboard</h1>
                <p class="text-muted">Bienvenido al sistema de gestión de proyectos</p>
            </div>
        </div>
    </div>

    <!-- Tarjetas de Resumen -->
    <div class="col-md-3 mb-4">
        <div class="card bg-custom-primary text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4 class="card-title">{{ $stats['total'] ?? 0 }}</h4>
                        <p class="card-text">Total Proyectos</p>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-project-diagram fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-4">
        <div class="card bg-custom-dark text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4 class="card-title">{{ $stats['pendiente'] ?? 0 }}</h4>
                        <p class="card-text">Pendientes</p>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-clock fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-4">
        <div class="card bg-custom-light text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4 class="card-title">{{ $stats['en_progreso'] ?? 0 }}</h4>
                        <p class="card-text">En Progreso</p>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-spinner fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-4">
        <div class="card bg-custom-dark text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4 class="card-title">{{ $stats['completado'] ?? 0 }}</h4>
                        <p class="card-text">Completados</p>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-check-circle fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Acciones Rápidas -->
    <div class="col-md-6 mb-4">
        <div class="card border-custom-light">
            <div class="card-header bg-custom-light text-white">
                <h5 class="card-title mb-0"><i class="fas fa-rocket"></i> Acciones Rápidas</h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('projects.create') }}" class="btn btn-custom-primary btn-lg">
                        <i class="fas fa-plus-circle"></i> Crear Nuevo Proyecto
                    </a>
                    <a href="{{ route('projects.index') }}" class="btn btn-custom-accent btn-lg">
                        <i class="fas fa-list"></i> Ver Todos los Proyectos
                    </a>
                    <a href="/test-uf" class="btn btn-outline-secondary btn-lg">
                        <i class="fas fa-vial"></i> Probar Componente UF
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Proyectos Recientes -->
    <div class="col-md-6 mb-4">
        <div class="card border-custom-primary">
            <div class="card-header bg-custom-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0"><i class="fas fa-history"></i> Proyectos Recientes</h5>
                <a href="{{ route('projects.index') }}" class="btn btn-sm btn-outline-light">Ver todos</a>
            </div>
            <div class="card-body p-0">
                @php
                    $recentProjects = \App\Models\Project::latest()->take(5)->get();
                @endphp
                
                @if($recentProjects->count() > 0)
                    <div class="list-group list-group-flush">
                        @foreach($recentProjects as $project)
                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="mb-1">
                                        <a href="{{ route('projects.show', $project->id) }}" class="text-decoration-none text-custom-primary">
                                            {{ $project->name }}
                                        </a>
                                    </h6>
                                    <small class="text-muted">{{ $project->responsible }}</small>
                                </div>
                                <span class="badge bg-{{ $project->status == 'completado' ? 'custom-dark' : ($project->status == 'en_progreso' ? 'custom-light' : 'custom-accent') }}">
                                    {{ ucfirst(str_replace('_', ' ', $project->status)) }}
                                </span>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-4">
                        <i class="fas fa-inbox fa-3x text-custom-light mb-3"></i>
                        <p class="text-muted">No hay proyectos aún</p>
                        <a href="{{ route('projects.create') }}" class="btn btn-custom-primary">Crear el primero</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
