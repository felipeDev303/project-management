@extends('layouts.app')

@section('title', 'Crear Nuevo Proyecto')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-custom-dark">
            <i class="fas fa-plus"></i> Crear Nuevo Proyecto
        </h1>
        <div>
            <a href="{{ route('projects.index') }}" class="btn btn-outline-custom-primary">
                <i class="fas fa-arrow-left"></i> Volver a Lista
            </a>
            <a href="{{ route('dashboard') }}" class="btn btn-outline-custom-primary">
                <i class="fas fa-tachometer-alt"></i> Dashboard
            </a>
        </div>
    </div>

    <div class="card-custom">
        <div class="card-header-custom">
            <h5 class="mb-0">
                <i class="fas fa-info-circle"></i> Información del Proyecto
            </h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('projects.store') }}">
                @csrf

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name" class="form-label text-custom-dark">
                            <i class="fas fa-tag"></i> Nombre del Proyecto
                        </label>
                        <input type="text" 
                               class="form-control @error('name') is-invalid @enderror" 
                               id="name" 
                               name="name" 
                               value="{{ old('name') }}" 
                               required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="responsible" class="form-label text-custom-dark">
                            <i class="fas fa-user"></i> Responsable
                        </label>
                        <input type="text" 
                               class="form-control @error('responsible') is-invalid @enderror" 
                               id="responsible" 
                               name="responsible" 
                               value="{{ old('responsible') }}" 
                               required>
                        @error('responsible')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="start_date" class="form-label text-custom-dark">
                            <i class="fas fa-calendar"></i> Fecha de Inicio
                        </label>
                        <input type="date" 
                               class="form-control @error('start_date') is-invalid @enderror" 
                               id="start_date" 
                               name="start_date" 
                               value="{{ old('start_date') }}" 
                               required>
                        @error('start_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="status" class="form-label text-custom-dark">
                            <i class="fas fa-flag"></i> Estado
                        </label>
                        <select class="form-select @error('status') is-invalid @enderror" 
                                id="status" 
                                name="status" 
                                required>
                            <option value="">Seleccionar estado...</option>
                            <option value="pendiente" {{ old('status') == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                            <option value="en_progreso" {{ old('status') == 'en_progreso' ? 'selected' : '' }}>En Progreso</option>
                            <option value="completado" {{ old('status') == 'completado' ? 'selected' : '' }}>Completado</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="monto" class="form-label text-custom-dark">
                            <i class="fas fa-dollar-sign"></i> Monto
                        </label>
                        <input type="number" 
                               class="form-control project-amount @error('monto') is-invalid @enderror" 
                               id="monto" 
                               name="monto" 
                               step="0.01" 
                               value="{{ old('monto') }}" 
                               required>
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
                            <option value="baja" {{ old('priority') == 'baja' ? 'selected' : '' }}>Baja</option>
                            <option value="media" {{ old('priority') == 'media' ? 'selected' : '' }}>Media</option>
                            <option value="alta" {{ old('priority') == 'alta' ? 'selected' : '' }}>Alta</option>
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
                              placeholder="Descripción detallada del proyecto...">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('projects.index') }}" class="btn btn-outline-custom-primary">
                        <i class="fas fa-times"></i> Cancelar
                    </a>
                    <button type="submit" class="btn btn-custom-accent">
                        <i class="fas fa-save"></i> Crear Proyecto
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection