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
                
                @include('projects._form')

                <hr>

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