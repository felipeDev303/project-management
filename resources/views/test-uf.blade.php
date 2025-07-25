@extends('layouts.app')

@section('title', 'Prueba del Componente UF')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4><i class="fas fa-vial"></i> Prueba del Componente UF</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h5>Componente UF integrado:</h5>
                        <div class="p-3 bg-light border rounded">
                            <x-uf-value />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h5>Información del componente:</h5>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <i class="fas fa-code"></i> 
                                <strong>Sintaxis:</strong> <code>&lt;x-uf-value /&gt;</code>
                            </li>
                            <li class="list-group-item">
                                <i class="fas fa-server"></i> 
                                <strong>Fuente:</strong> API del Banco Central de Chile
                            </li>
                            <li class="list-group-item">
                                <i class="fas fa-clock"></i> 
                                <strong>Caché:</strong> 24 horas
                            </li>
                            <li class="list-group-item">
                                <i class="fas fa-recycle"></i> 
                                <strong>Reutilizable:</strong> Sí, en cualquier vista Blade
                            </li>
                        </ul>
                    </div>
                </div>
                
                <hr>
                
                <div class="row mt-4">
                    <div class="col-12">
                        <h5>Ejemplos de uso en diferentes contextos:</h5>
                        
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card bg-info text-white">
                                    <div class="card-body text-center">
                                        <h6>En Header</h6>
                                        <x-uf-value />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card bg-success text-white">
                                    <div class="card-body text-center">
                                        <h6>En Sidebar</h6>
                                        <x-uf-value />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card bg-warning text-dark">
                                    <div class="card-body text-center">
                                        <h6>En Footer</h6>
                                        <x-uf-value />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="mt-4 text-center">
                    <a href="{{ route('projects.index') }}" class="btn btn-primary">
                        <i class="fas fa-arrow-left"></i> Volver a Proyectos
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
