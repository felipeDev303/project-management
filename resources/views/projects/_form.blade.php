<div class="row">
    <div class="col-md-6 mb-3">
        <label for="name" class="form-label text-custom-dark">
            <i class="fas fa-tag"></i> Nombre del Proyecto <span class="text-danger">*</span>
        </label>
        <input type="text" 
               class="form-control @error('name') is-invalid @enderror" 
               id="name" 
               name="name" 
               value="{{ old('name', $project->name ?? '') }}" 
               required>
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label for="responsible" class="form-label text-custom-dark">
            <i class="fas fa-user"></i> Responsable <span class="text-danger">*</span>
        </label>
        <input type="text" 
               class="form-control @error('responsible') is-invalid @enderror" 
               id="responsible" 
               name="responsible" 
               value="{{ old('responsible', $project->responsible ?? '') }}" 
               required>
        @error('responsible')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label for="start_date" class="form-label text-custom-dark">
            <i class="fas fa-calendar"></i> Fecha de Inicio <span class="text-danger">*</span>
        </label>
        <input type="date" 
               class="form-control @error('start_date') is-invalid @enderror" 
               id="start_date" 
               name="start_date" 
               value="{{ old('start_date', $project->start_date ?? '') }}" 
               required>
        @error('start_date')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label for="status" class="form-label text-custom-dark">
            <i class="fas fa-flag"></i> Estado <span class="text-danger">*</span>
        </label>
        <select class="form-select @error('status') is-invalid @enderror" 
                id="status" 
                name="status" 
                required>
            <option value="">Seleccionar estado...</option>
            <option value="pendiente" {{ old('status', $project->status ?? '') == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
            <option value="en_progreso" {{ old('status', $project->status ?? '') == 'en_progreso' ? 'selected' : '' }}>En Progreso</option>
            <option value="completado" {{ old('status', $project->status ?? '') == 'completado' ? 'selected' : '' }}>Completado</option>
        </select>
        @error('status')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label for="monto" class="form-label text-custom-dark">
            <i class="fas fa-dollar-sign"></i> Monto <span class="text-danger">*</span>
        </label>
        <div class="input-group">
            <span class="input-group-text">$</span>
            <input type="number" 
                   class="form-control project-amount @error('monto') is-invalid @enderror" 
                   id="monto" 
                   name="monto" 
                   step="0.01" 
                   min="0"
                   value="{{ old('monto', $project->monto ?? '') }}" 
                   required>
        </div>
        @error('monto')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label for="priority" class="form-label text-custom-dark">
            <i class="fas fa-exclamation-triangle"></i> Prioridad
        </label>
        <select class="form-select @error('priority') is-invalid @enderror" 
                id="priority" 
                name="priority">
            <option value="">Seleccionar prioridad...</option>
            <option value="baja" {{ old('priority', $project->priority ?? '') == 'baja' ? 'selected' : '' }}>Baja</option>
            <option value="media" {{ old('priority', $project->priority ?? '') == 'media' ? 'selected' : '' }}>Media</option>
            <option value="alta" {{ old('priority', $project->priority ?? '') == 'alta' ? 'selected' : '' }}>Alta</option>
        </select>
        @error('priority')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="mb-3">
    <label for="description" class="form-label text-custom-dark">
        <i class="fas fa-align-left"></i> Descripción
    </label>
    <textarea class="form-control @error('description') is-invalid @enderror" 
              id="description" 
              name="description" 
              rows="4" 
              placeholder="Descripción detallada del proyecto...">{{ old('description', $project->description ?? '') }}</textarea>
    @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
