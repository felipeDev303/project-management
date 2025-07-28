<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Proyectos</title>
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
    </style>
</head>
<body>
    <div class="container">
        <h1>Gestión de Proyectos</h1>
        
        <a href="{{ route('projects.create') }}" class="btn btn-success">Crear Nuevo Proyecto</a>
        
        @if(session('success'))
            <div style="background: #d4edda; color: #155724; padding: 10px; margin: 10px 0; border-radius: 4px;">
                {{ session('success') }}
            </div>
        @endif

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Fecha Inicio</th>
                    <th>Estado</th>
                    <th>Responsable</th>
                    <th>Monto</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($projects as $project)
                <tr>
                    <td>{{ $project->id }}</td>
                    <td>{{ $project->name }}</td>
                    <td>{{ $project->start_date }}</td>
                    <td><span class="status status-{{ $project->status }}">{{ ucfirst(str_replace('_', ' ', $project->status)) }}</span></td>
                    <td>{{ $project->responsible }}</td>
                    <td>${{ number_format($project->monto, 2) }}</td>
                    <td>
                        <a href="{{ route('projects.show', $project->id) }}" class="btn btn-primary">Ver</a>
                        <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning">Editar</a>
                        <form style="display: inline;" method="POST" action="{{ route('projects.destroy', $project->id) }}" onsubmit="return confirm('¿Eliminar este proyecto?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>