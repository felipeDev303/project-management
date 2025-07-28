<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $project->name }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .container { max-width: 1200px; margin: 0 auto; }
        .card { border: 1px solid #ddd; border-radius: 8px; padding: 20px; background: #f8f9fa; }
        .field { margin-bottom: 15px; }
        .label { font-weight: bold; color: #333; }
        .value { margin-top: 5px; }
        .btn { padding: 10px 20px; text-decoration: none; border-radius: 4px; display: inline-block; margin: 5px; }
        .btn-primary { background: #007bff; color: white; }
        .btn-warning { background: #ffc107; color: black; }
        .btn-secondary { background: #6c757d; color: white; }
        .status { padding: 6px 12px; border-radius: 4px; font-weight: bold; }
        .status-pendiente { background: #ffeeba; color: #856404; }
        .status-en_progreso { background: #d1ecf1; color: #0c5460; }
        .status-completado { background: #d4edda; color: #155724; }
        .badge { padding: 0.5em 0.75em; border-radius: 0.5rem; font-weight: 500; }
        .bg-success { background-color: #28a745 !important; }
        .bg-info { background-color: #17a2b8 !important; }
        .text-success { color: #28a745 !important; }
        .fs-4 { font-size: 1.5rem !important; }
        .fw-bold { font-weight: 700 !important; }
        .text-muted { color: #6c757d !important; }
        .form-label { margin-bottom: 0.5rem; }
        .d-grid { display: grid !important; }
        .gap-2 > * { margin: 0.5rem 0; }
        hr { border: 0; height: 1px; background: #ddd; margin: 1.5rem 0; }
    </style>
</head>
<body>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0">
                <i class="fas fa-project-diagram"></i> {{ $project->name }}
            </h1>
            <div class="btn-group">
                <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning">
                    <i class="fas fa-edit"></i> Editar
                </a>
                <a href="{{ route('projects.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Volver
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0"><i class="fas fa-info-circle"></i> Información del Proyecto</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label text-muted">ID del Proyecto</label>
                                    <div class="fw-bold">#{{ $project->id }}</div>
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label text-muted">Nombre</label>
                                    <div class="fw-bold">{{ $project->name }}</div>
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label text-muted">Responsable</label>
                                    <div class="fw-bold">{{ $project->responsible }}</div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label text-muted">Fecha de Inicio</label>
                                    <div class="fw-bold">{{ \Carbon\Carbon::parse($project->start_date)->format('d/m/Y') }}</div>
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
                                    <div class="fw-bold text-success fs-4">${{ number_format($project->monto, 2) }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h6 class="mb-0"><i class="fas fa-cogs"></i> Acciones</h6>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning">
                                <i class="fas fa-edit"></i> Editar Proyecto
                            </a>
                            
                            <form method="POST" action="{{ route('projects.destroy', $project->id) }}" onsubmit="return confirm('¿Estás seguro de eliminar este proyecto? Esta acción no se puede deshacer.')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger w-100">
                                    <i class="fas fa-trash"></i> Eliminar Proyecto
                                </button>
                            </form>
                            
                            <hr>
                            
                            <a href="{{ route('projects.index') }}" class="btn btn-secondary">
                                <i class="fas fa-list"></i> Ver Todos los Proyectos
                            </a>
                            
                            <a href="{{ route('projects.create') }}" class="btn btn-success">
                                <i class="fas fa-plus"></i> Crear Nuevo Proyecto
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="card mt-3">
                    <div class="card-header">
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
    </div>
</body>
</html>