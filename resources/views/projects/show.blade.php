
@extends('layouts.app')

@section('title', 'Ver Proyecto: ' . $project->name)

@section('content')
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1><i class="fas fa-eye"></i> Ver Proyecto</h1>
            <div>
                <a href="{{ route('projects.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Volver
                </a>
                <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning">
                    <i class="fas fa-edit"></i> Editar
                </a>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">{{ $project->name }}</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-borderless">
                            <tr>
                                <th width="40%"><i class="fas fa-hashtag text-muted"></i> ID:</th>
                                <td>{{ $project->id }}</td>
                            </tr>
                            <tr>
                                <th><i class="fas fa-calendar text-muted"></i> Fecha de Inicio:</th>
                                <td>{{ \Carbon\Carbon::parse($project->start_date)->format('d/m/Y') }}</td>
                            </tr>
                            <tr>
                                <th><i class="fas fa-user text-muted"></i> Responsable:</th>
                                <td>{{ $project->responsible }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-borderless">
                            <tr>
                                <th width="40%"><i class="fas fa-info-circle text-muted"></i> Estado:</th>
                                <td>
                                    @php
                                        $badgeClass = match($project->status) {
                                            'completado' => 'success',
                                            'en_progreso' => 'warning',
                                            'pendiente' => 'secondary',
                                            default => 'secondary'
                                        };
                                        $icon = match($project->status) {
                                            'completado' => 'check-circle',
                                            'en_progreso' => 'clock',
                                            'pendiente' => 'pause-circle',
                                            default => 'question-circle'
                                        };
                                    @endphp
                                    <span class="badge bg-{{ $badgeClass }} fs-6">
                                        <i class="fas fa-{{ $icon }}"></i> {{ ucfirst(str_replace('_', ' ', $project->status)) }}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th><i class="fas fa-dollar-sign text-muted"></i> Monto:</th>
                                <td><strong class="text-success">${{ number_format($project->monto, 2) }}</strong></td>
                            </tr>
                            <tr>
                                <th><i class="fas fa-clock text-muted"></i> Creado:</th>
                                <td>{{ $project->created_at->format('d/m/Y H:i') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-md-6">
                        <small class="text-muted">
                            <i class="fas fa-plus-circle"></i> Creado: {{ $project->created_at->diffForHumans() }}
                        </small>
                    </div>
                    <div class="col-md-6 text-end">
                        <small class="text-muted">
                            <i class="fas fa-edit"></i> Actualizado: {{ $project->updated_at->diffForHumans() }}
                        </small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Acciones -->
        <div class="mt-3">
            <div class="btn-group" role="group">
                <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning">
                    <i class="fas fa-edit"></i> Editar Proyecto
                </a>
                <form action="{{ route('projects.destroy', $project->id) }}" method="POST" class="d-inline"
                      onsubmit="return confirm('¿Estás seguro de eliminar este proyecto?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash"></i> Eliminar Proyecto
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection