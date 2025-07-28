<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Proyectos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .container { max-width: 1200px; margin: 0 auto; }
        .btn { padding: 8px 16px; text-decoration: none; border-radius: 4px; display: inline-block; margin: 2px; }
        .btn-primary { background: #007bff; color: white; }
        .btn-success { background: #28a745; color: white; }
        .btn-warning { background: #ffc107; color: black; }
        .btn-danger { background: #dc3545; color: white; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background-color: #f8f9fa; }
        .status { padding: 4px 8px; border-radius: 4px; font-size: 12px; }
        .status-pendiente { background: #ffeeba; color: #856404; }
        .status-en_progreso { background: #d1ecf1; color: #0c5460; }
        .status-completado { background: #d4edda; color: #155724; }
        .table-hover tbody tr:hover { background-color: #f1f1f1; }
        .badge { padding: 0.5em 1em; border-radius: 1em; font-size: 0.875em; }
        .btn-group { display: flex; justify-content: center; }
        .btn-group .btn { margin: 0 2px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0">
                <i class="fas fa-list"></i> Gestión de Proyectos
            </h1>
            <div>
                <a href="{{ route('projects.create') }}" class="btn btn-success">
                    <i class="fas fa-plus"></i> Crear Nuevo Proyecto
                </a>
                <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
            </div>
        </div>

        @if($projects->count() > 0)
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-dark">
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
                                    <td><strong>#{{ $project->id }}</strong></td>
                                    <td>
                                        <a href="{{ route('projects.show', $project->id) }}" class="text-decoration-none fw-bold">
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
                                    <td class="fw-bold text-success">${{ number_format($project->monto, 2) }}</td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('projects.show', $project->id) }}" class="btn btn-sm btn-outline-primary" title="Ver">
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
            <div class="card">
                <div class="card-body text-center py-5">
                    <i class="fas fa-inbox fa-4x text-muted mb-3"></i>
                    <h4 class="text-muted">No hay proyectos registrados</h4>
                    <p class="text-muted">Comienza creando tu primer proyecto</p>
                    <a href="{{ route('projects.create') }}" class="btn btn-success btn-lg">
                        <i class="fas fa-plus-circle"></i> Crear Primer Proyecto
                    </a>
                </div>
            </div>
        @endif
    </div>
</body>
</html>