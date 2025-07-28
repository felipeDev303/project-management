<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Proyecto</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .container { max-width: 600px; margin: 0 auto; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input, select, textarea { width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; }
        .btn { padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; text-decoration: none; display: inline-block; }
        .btn-primary { background: #007bff; color: white; }
        .btn-secondary { background: #6c757d; color: white; }
        .error { color: #dc3545; font-size: 14px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Editar Proyecto</h1>
        
        <form method="POST" action="{{ route('projects.update', $project->id) }}">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="name">Nombre del Proyecto:</label>
                <input type="text" id="name" name="name" value="{{ old('name', $project->name) }}" required>
                @error('name')<span class="error">{{ $message }}</span>@enderror
            </div>
            
            <div class="form-group">
                <label for="start_date">Fecha de Inicio:</label>
                <input type="date" id="start_date" name="start_date" value="{{ old('start_date', $project->start_date) }}" required>
                @error('start_date')<span class="error">{{ $message }}</span>@enderror
            </div>
            
            <div class="form-group">
                <label for="status">Estado:</label>
                <select id="status" name="status" required>
                    <option value="pendiente" {{ old('status', $project->status) == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                    <option value="en_progreso" {{ old('status', $project->status) == 'en_progreso' ? 'selected' : '' }}>En Progreso</option>
                    <option value="completado" {{ old('status', $project->status) == 'completado' ? 'selected' : '' }}>Completado</option>
                </select>
                @error('status')<span class="error">{{ $message }}</span>@enderror
            </div>
            
            <div class="form-group">
                <label for="responsible">Responsable:</label>
                <input type="text" id="responsible" name="responsible" value="{{ old('responsible', $project->responsible) }}" required>
                @error('responsible')<span class="error">{{ $message }}</span>@enderror
            </div>
            
            <div class="form-group">
                <label for="monto">Monto:</label>
                <input type="number" id="monto" name="monto" step="0.01" min="0" value="{{ old('monto', $project->monto) }}" required>
                @error('monto')<span class="error">{{ $message }}</span>@enderror
            </div>
            
            <button type="submit" class="btn btn-primary">Actualizar Proyecto</button>
            <a href="{{ route('projects.show', $project->id) }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>