@extends('layouts.app')

@section('title', 'Lista de Proyectos')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1><i class="fas fa-list"></i> Lista de Proyectos</h1>
            <a href="{{ route('projects.create') }}" class="btn btn-success">
                <i class="fas fa-plus"></i> Nuevo Proyecto
            </a>
        </div>

        @if(count($projects) > 0)
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-primary">
                                <tr>
                                    <th width="5%">ID</th>
                                    <th width="25%">Nombre</th>
                                    <th width="12%">Fecha Inicio</th>
                                    <th width="12%">Estado</th>
                                    <th width="20%">Responsable</th>
                                    <th width="12%">Monto</th>
                                    <th width="14%">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($projects as $project)
                                <tr>
                                    <td>{{ $project->id }}</td>
                                    <td>
                                        <strong>{{ $project->name }}</strong>
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($project->start_date)->format('d/m/Y') }}</td>
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
                                        <span class="badge bg-{{ $badgeClass }}">
                                            <i class="fas fa-{{ $icon }}"></i> {{ ucfirst(str_replace('_', ' ', $project->status)) }}
                                        </span>
                                    </td>
                                    <td>{{ $project->responsible }}</td>
                                    <td>${{ number_format($project->monto, 2) }}</td>
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group">
                                            <a href="{{ route('projects.show', $project->id) }}" 
                                               class="btn btn-outline-info" title="Ver">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('projects.edit', $project->id) }}" 
                                               class="btn btn-outline-warning" title="Editar">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('projects.destroy', $project->id) }}" 
                                                  method="POST" class="d-inline"
                                                  onsubmit="return confirm('¿Estás seguro de eliminar este proyecto?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger" title="Eliminar">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @else
            <div class="card">
                <div class="card-body text-center">
                    <div class="py-4">
                        <i class="fas fa-folder-open fa-4x text-muted mb-3"></i>
                        <h4 class="text-muted">No hay proyectos</h4>
                        <p class="text-muted">No se encontraron proyectos en la base de datos.</p>
                        <a href="{{ route('projects.create') }}" class="btn btn-primary btn-lg">
                            <i class="fas fa-plus"></i> Crear Primer Proyecto
                        </a>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection