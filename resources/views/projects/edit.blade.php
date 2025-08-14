@extends('layouts.app')

@section('title', 'Editar Proyecto: ' . $project->name)

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-custom-dark">
            <i class="fas fa-edit"></i> Editar Proyecto: {{ $project->name }}
        </h1>
        <div class="btn-group">
            <a href="{{ route('projects.show', $project->id) }}" class="btn btn-outline-custom-primary">
                <i class="fas fa-eye"></i> Ver Proyecto
            </a>
            <a href="{{ route('projects.index') }}" class="btn btn-outline-custom-primary">
                <i class="fas fa-list"></i> Lista
            </a>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-custom">
                <div class="card-header-custom">
                    <h5 class="mb-0"><i class="fas fa-form"></i> Actualizar Información</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('projects.update', $project->id) }}">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="name" class="form-label text-custom-dark">
                                    Nombre del Proyecto <span class="text-danger">*</span>
                                </label>
                                <input type="text" 
                                       class="form-control @error('name') is-invalid @enderror" 
                                       id="name" 
                                       name="name" 
                                       value="{{ old('name', $project->name) }}" 
                                       required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="start_date" class="form-label text-custom-dark">
                                    Fecha de Inicio <span class="text-danger">*</span>
                                </label>
                                <input type="date" 
                                       class="form-control @error('start_date') is-invalid @enderror" 
                                       id="start_date" 
                                       name="start_date" 
                                       value="{{ old('start_date', $project->start_date) }}" 
                                       required>
                                @error('start_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="status" class="form-label text-custom-dark">
                                    Estado <span class="text-danger">*</span>
                                </label>
                                <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                                    <option value="pendiente" {{ old('status', $project->status) == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                                    <option value="en_progreso" {{ old('status', $project->status) == 'en_progreso' ? 'selected' : '' }}>En Progreso</option>
                                    <option value="completado" {{ old('status', $project->status) == 'completado' ? 'selected' : '' }}>Completado</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="responsible" class="form-label text-custom-dark">
                                    Responsable <span class="text-danger">*</span>
                                </label>
                                <input type="text" 
                                       class="form-control @error('responsible') is-invalid @enderror" 
                                       id="responsible" 
                                       name="responsible" 
                                       value="{{ old('responsible', $project->responsible) }}" 
                                       required>
                                @error('responsible')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="monto" class="form-label text-custom-dark">
                                    Monto <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" 
                                           class="form-control project-amount @error('monto') is-invalid @enderror" 
                                           id="monto" 
                                           name="monto" 
                                           step="0.01" 
                                           min="0" 
                                           value="{{ old('monto', $project->monto) }}" 
                                           required>
                                </div>
                                @error('monto')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <hr>
                        
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('projects.show', $project->id) }}" class="btn btn-outline-custom-primary">
                                <i class="fas fa-times"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-custom-accent btn-lg">
                                <i class="fas fa-save"></i> Actualizar Proyecto
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection