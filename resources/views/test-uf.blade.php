@extends('layouts.app')

@section('title', 'Prueba del Componente UF')

@push('styles')
<style>
    .uf-component-demo {
        background: #f8f9fa;
        border: 2px solid var(--color-light);
        border-radius: 8px;
        padding: 20px;
    }
    
    .info-card {
        border: 1px solid var(--color-light);
        border-radius: 8px;
    }
    
    .card-header.custom-header {
        background-color: var(--color-primary);
        color: white;
        border-bottom: 1px solid var(--color-light);
    }
    
    .uf-value-highlight {
        font-size: 1.6rem;
        font-weight: bold;
        color: var(--color-dark);
        background: #f0f8ff;
        padding: 15px;
        border-radius: 6px;
        border-left: 4px solid var(--color-primary);
        text-align: center;
    }
    
    .usage-card-primary {
        background-color: var(--color-primary);
        color: white;
    }
    
    .usage-card-light {
        background-color: var(--color-light);
        color: white;
    }
    
    .usage-card-accent {
        background-color: var(--color-accent);
        color: white;
    }
    
    .data-card {
        border-radius: 8px;
    }
    
    .data-card.border-primary {
        border-color: var(--color-primary);
    }
    
    .data-card.border-info {
        border-color: var(--color-light);
    }
    
    .data-card .bg-primary {
        background-color: var(--color-primary) !important;
    }
    
    .data-card .bg-info {
        background-color: var(--color-light) !important;
    }
    
    .definition-section {
        background-color: #fefefe;
        border: 1px solid var(--color-accent);
        border-radius: 8px;
    }
    
    .definition-section .card-header {
        background-color: var(--color-accent);
        color: white;
    }
    
    .text-primary-custom {
        color: var(--color-primary) !important;
    }
    
    .text-success-custom {
        color: var(--color-light) !important;
    }
    
    .external-link {
        color: var(--color-primary);
        text-decoration: none;
    }
    
    .external-link:hover {
        color: var(--color-dark);
        text-decoration: underline;
    }
</style>
@endpush

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card info-card">
                <div class="card-header custom-header">
                    <h4><i class="fas fa-vial"></i> Prueba del Componente UF</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Componente UF integrado:</h5>
                            <div class="uf-component-demo">
                                <div class="uf-value-highlight">
                                    <x-uf-value />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h5>Información del componente:</h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <i class="fas fa-code text-primary-custom"></i> 
                                    <strong>Sintaxis:</strong> <code>&lt;x-uf-value /&gt;</code>
                                </li>
                                <li class="list-group-item">
                                    <i class="fas fa-server text-primary-custom"></i> 
                                    <strong>Fuente:</strong> API del Banco Central de Chile
                                </li>
                                <li class="list-group-item">
                                    <i class="fas fa-clock text-primary-custom"></i> 
                                    <strong>Caché:</strong> 24 horas
                                </li>
                                <li class="list-group-item">
                                    <i class="fas fa-recycle text-primary-custom"></i> 
                                    <strong>Reutilizable:</strong> Sí, en cualquier vista Blade
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                    <hr class="my-4">
                    
                    <div class="row">
                        <div class="col-12">
                            <h5>Ejemplos de uso en diferentes contextos:</h5>
                            <div class="row mt-3">
                                <div class="col-md-4 mb-3">
                                    <div class="card usage-card-primary">
                                        <div class="card-body text-center">
                                            <h6>En Header</h6>
                                            <x-uf-value />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="card usage-card-light">
                                        <div class="card-body text-center">
                                            <h6>En Sidebar</h6>
                                            <x-uf-value />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="card usage-card-accent">
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
                        <div class="btn-group" role="group">
                            <a href="{{ route('dashboard') }}" class="btn btn-success">
                                <i class="fas fa-tachometer-alt"></i> Ir al Dashboard
                            </a>
                            <a href="{{ route('projects.index') }}" class="btn btn-primary">
                                <i class="fas fa-list"></i> Ver Proyectos
                            </a>
                            <a href="{{ route('projects.create') }}" class="btn btn-outline-primary">
                                <i class="fas fa-plus"></i> Nuevo Proyecto
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <h5><i class="fas fa-info-circle text-primary-custom"></i> Información detallada de la UF</h5>
            
            <div class="row mt-3">
                <div class="col-md-6 mb-4">
                    <div class="card data-card border-primary">
                        <div class="card-header bg-primary text-white">
                            <h6><i class="fas fa-dollar-sign"></i> Datos Actuales</h6>
                        </div>
                        <div class="card-body">
                            <dl class="row mb-0">
                                <dt class="col-sm-4">Valor:</dt>
                                <dd class="col-sm-8"><strong>$39.133,45</strong></dd>
                                <dt class="col-sm-4">Fecha:</dt>
                                <dd class="col-sm-8">09.Ago.2025</dd>
                                <dt class="col-sm-4">Unidad:</dt>
                                <dd class="col-sm-8">Pesos</dd>
                                <dt class="col-sm-4">Frecuencia:</dt>
                                <dd class="col-sm-8">Diaria</dd>
                            </dl>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6 mb-4">
                    <div class="card data-card border-info">
                        <div class="card-header bg-info text-white">
                            <h6><i class="fas fa-building-columns"></i> Información de Fuente</h6>
                        </div>
                        <div class="card-body">
                            <dl class="row mb-0">
                                <dt class="col-sm-5">Fuente:</dt>
                                <dd class="col-sm-7">Banco Central de Chile</dd>
                                <dt class="col-sm-5">Última actualización:</dt>
                                <dd class="col-sm-7">09.Jul.2025</dd>
                                <dt class="col-sm-5">Contacto:</dt>
                                <dd class="col-sm-7">
                                    <small>contactocentral.bcentral.cl</small>
                                </dd>
                                <dt class="col-sm-5">Metodología:</dt>
                                <dd class="col-sm-7">UF e IVP</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <div class="card definition-section">
                <div class="card-header">
                    <h6><i class="fas fa-book"></i> Definición y Metodología</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="text-primary-custom">UF: Unidad de Fomento</h6>
                            <p class="small">
                                Es uno de los sistemas de reajustibilidad autorizados por el Banco Central para las operaciones de crédito de dinero en moneda nacional que realicen las empresas bancarias, sociedades financieras y cooperativas de ahorro y crédito.
                            </p>
                            <p class="small">
                                Esta unidad se reajusta diariamente a partir del diez de cada mes y hasta el nueve del mes siguiente, de acuerdo con la tasa promedio geométrica correspondiente a la variación del Índice de Precios al Consumidor (IPC) en el mes calendario anterior al período para el cual esta unidad se calcula.
                            </p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-success-custom">IVP: Índice de Valor Promedio</h6>
                            <p class="small">
                                Es uno de los sistemas de reajustibilidad autorizados por el Banco Central para las operaciones de crédito de dinero en moneda nacional que realicen las empresas bancarias, sociedades financieras y cooperativas de ahorro y crédito.
                            </p>
                            <p class="small">
                                Este índice se reajusta diariamente a partir del diez de cada mes y hasta el nueve del mes siguiente, de acuerdo con la tasa promedio geométrica correspondiente a la variación del IPC en los seis meses calendarios precedentes al período para el cual dicho índice se calcula.
                            </p>
                        </div>
                    </div>
                    <div class="text-center mt-3">
                        <small class="text-muted">
                            <i class="fas fa-external-link-alt"></i>
                            Más antecedentes metodológicos disponibles en el Capítulo II.B.3 del Compendio de Normas Financieras (CNF) en 
                            <a href="https://www.bcentral.cl" target="_blank" class="external-link">www.bcentral.cl</a>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
                