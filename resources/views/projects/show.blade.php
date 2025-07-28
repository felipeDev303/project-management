<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $project->name }}</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .container { max-width: 600px; margin: 0 auto; }
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
    </style>
</head>
<body>
    <div class="container">
        <h1>Detalles del Proyecto</h1>
        
        @if(session('success'))
            <div style="background: #d4edda; color: #155724; padding: 10px; margin: 10px 0; border-radius: 4px;">
                {{ session('success') }}
            </div>
        @endif
        
        <div class="card">
            <div class="field">
                <div class="label">ID:</div>
                <div class="value">{{ $project->id }}</div>
            </div>
            
            <div class="field">
                <div class="label">Nombre:</div>
                <div class="value">{{ $project->name }}</div>
            </div>
            
            <div class="field">
                <div class="label">Fecha de Inicio:</div>
                <div class="value">{{ $project->start_date }}</div>
            </div>
            
            <div class="field">
                <div class="label">Estado:</div>
                <div class="value">
                    <span class="status status-{{ $project->status }}">
                        {{ ucfirst(str_replace('_', ' ', $project->status)) }}
                    </span>
                </div>
            </div>
            
            <div class="field">
                <div class="label">Responsable:</div>
                <div class="value">{{ $project->responsible }}</div>
            </div>
            
            <div class="field">
                <div class="label">Monto:</div>
                <div class="value">${{ number_format($project->monto, 2) }}</div>
            </div>
        </div>
        
        <div style="margin-top: 20px;">
            <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning">Editar</a>
            <a href="{{ route('projects.index') }}" class="btn btn-secondary">Volver a la Lista</a>
        </div>
    </div>
</body>
</html>