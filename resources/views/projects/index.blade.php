<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Proyectos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0 text-custom-dark">
                <i class="fas fa-list"></i> Gestión de Proyectos
            </h1>
            <div>
                <a href="{{ route('projects.create') }}" class="btn btn-custom-accent">
                    <i class="fas fa-plus"></i> Nuevo Proyecto
                </a>
                <a href="{{ route('dashboard') }}" class="btn btn-outline-custom-primary">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
            </div>
        </div>

        @if($projects->count() > 0)
            <div class="card-custom">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-custom">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Fecha Inicio</th>
                                    <th>Estado</th>
                                    <th>Responsable</th>
                                    <th>Monto</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($projects as $project)
                                <tr>
                                    <td><strong class="text-custom-primary">#{{ $project->id }}</strong></td>
                                    <td>
                                        <a href="{{ route('projects.show', $project->id) }}" class="text-decoration-none fw-bold text-custom-dark">
                                            {{ $project->name }}
                                        </a>
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($project->start_date)->format('d/m/Y') }}</td>
                                    <td>
                                        <span class="badge bg-{{ $project->status == 'completado' ? 'success' : ($project->status == 'en_progreso' ? 'info' : 'warning') }}">
                                            {{ ucfirst(str_replace('_', ' ', $project->status)) }}
                                        </span>
                                    </td>
                                    <td>{{ $project->responsible }}</td>
                                    <td class="project-amount">${{ number_format($project->monto, 2) }}</td>
                                    <td class="text-center">
                                        <div class="btn-group action-buttons" role="group">
                                            <a href="{{ route('projects.show', $project->id) }}" class="btn btn-sm btn-outline-custom-primary" title="Ver">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-sm btn-outline-warning" title="Editar">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form style="display: inline;" method="POST" action="{{ route('projects.destroy', $project->id) }}" onsubmit="return confirm('¿Estás seguro de eliminar este proyecto?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Eliminar">
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
            <div class="card-custom empty-state">
                <div class="card-body text-center py-5">
                    <i class="fas fa-inbox fa-4x mb-3"></i>
                    <h4 class="text-custom-light">No hay proyectos registrados</h4>
                    <p class="text-custom-light">Comienza creando tu primer proyecto</p>
                    <a href="{{ route('projects.create') }}" class="btn btn-custom-accent btn-lg">
                        <i class="fas fa-plus-circle"></i> Crear Primer Proyecto
                    </a>
                </div>
            </div>
        @endif
    </div>
</body>
</html>