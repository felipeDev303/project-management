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
                        
                        @include('projects._form', ['project' => $project])
                        
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