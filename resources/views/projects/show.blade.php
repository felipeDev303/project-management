@extends('layouts.app')

@section('title', $project->name)

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-custom-dark">
            <i class="fas fa-project-diagram"></i> {{ $project->name }}
        </h1>
        <div class="btn-group">
            <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-outline-warning">
                <i class="fas fa-edit"></i> Editar
            </a>
            <a href="{{ route('projects.index') }}" class="btn btn-outline-custom-primary">
                <i class="fas fa-arrow-left"></i> Volver
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card-custom">
                <div class="card-header-custom">
                    <h5 class="mb-0"><i class="fas fa-info-circle"></i> Información del Proyecto</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label text-muted">ID del Proyecto</label>
                                <div class="fw-bold text-custom-dark">#{{ $project->id }}</div>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label text-muted">Nombre</label>
                                <div class="fw-bold text-custom-dark">{{ $project->name }}</div>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label text-muted">Responsable</label>
                                <div class="fw-bold text-custom-dark">{{ $project->responsible }}</div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label text-muted">Fecha de Inicio</label>
                                <div class="fw-bold text-custom-dark">{{ \Carbon\Carbon::parse($project->start_date)->format('d/m/Y') }}</div>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label text-muted">Estado</label>
                                <div>
                                    <span class="badge bg-{{ $project->status == 'completado' ? 'success' : ($project->status == 'en_progreso' ? 'info' : 'warning') }} fs-6">
                                        {{ ucfirst(str_replace('_', ' ', $project->status)) }}
                                    </span>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label text-muted">Monto</label>
                                <div class="fw-bold project-amount fs-4">${{ number_format($project->monto, 2) }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card-custom">
                <div class="card-header-custom">
                    <h6 class="mb-0"><i class="fas fa-cogs"></i> Acciones</h6>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-outline-warning">
                            <i class="fas fa-edit"></i> Editar Proyecto
                        </a>
                        
                        <form method="POST" action="{{ route('projects.destroy', $project->id) }}" onsubmit="return confirm('¿Estás seguro de eliminar este proyecto? Esta acción no se puede deshacer.')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger w-100">
                                <i class="fas fa-trash"></i> Eliminar Proyecto
                            </button>
                        </form>
                        
                        <hr>
                        
                        <a href="{{ route('projects.index') }}" class="btn btn-outline-custom-primary">
                            <i class="fas fa-list"></i> Ver Todos los Proyectos
                        </a>
                        
                        <a href="{{ route('projects.create') }}" class="btn btn-custom-accent">
                            <i class="fas fa-plus"></i> Crear Nuevo Proyecto
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="card-custom mt-3">
                <div class="card-header-custom">
                    <h6 class="mb-0"><i class="fas fa-chart-bar"></i> Información Adicional</h6>
                </div>
                <div class="card-body">
                    <small class="text-muted">
                        <div class="mb-2">
                            <i class="fas fa-calendar-plus"></i> 
                            Creado: {{ $project->created_at->format('d/m/Y H:i') }}
                        </div>
                        <div>
                            <i class="fas fa-calendar-edit"></i> 
                            Actualizado: {{ $project->updated_at->format('d/m/Y H:i') }}
                        </div>
                    </small>
                </div>
            </div>
        </div>
    </div>
@endsection