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
        <h5><i class="fas fa-info-circle"></i> Información detallada de la UF</h5>
        
        <div class="row">
            <div class="col-md-6">
                <div class="card border-primary">
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
            
            <div class="col-md-6">
                <div class="card border-info">
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
        <div class="card border-warning">
            <div class="card-header bg-warning text-dark">
                <h6><i class="fas fa-book"></i> Definición y Metodología</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="text-primary">UF: Unidad de Fomento</h6>
                        <p class="small text-justify">
                            Es uno de los sistemas de reajustibilidad autorizados por el Banco Central para las operaciones de crédito de dinero en moneda nacional que realicen las empresas bancarias, sociedades financieras y cooperativas de ahorro y crédito.
                        </p>
                        <p class="small text-justify">
                            Esta unidad se reajusta diariamente a partir del diez de cada mes y hasta el nueve del mes siguiente, de acuerdo con la tasa promedio geométrica correspondiente a la variación del Índice de Precios al Consumidor (IPC) en el mes calendario anterior al período para el cual esta unidad se calcula.
                        </p>
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-success">IVP: Índice de Valor Promedio</h6>
                        <p class="small text-justify">
                            Es uno de los sistemas de reajustibilidad autorizados por el Banco Central para las operaciones de crédito de dinero en moneda nacional que realicen las empresas bancarias, sociedades financieras y cooperativas de ahorro y crédito.
                        </p>
                        <p class="small text-justify">
                            Este índice se reajusta diariamente a partir del diez de cada mes y hasta el nueve del mes siguiente, de acuerdo con la tasa promedio geométrica correspondiente a la variación del IPC en los seis meses calendarios precedentes al período para el cual dicho índice se calcula.
                        </p>
                    </div>
                </div>
                <div class="text-center mt-3">
                    <small class="text-muted">
                        <i class="fas fa-external-link-alt"></i>
                        Más antecedentes metodológicos disponibles en el Capítulo II.B.3 del Compendio de Normas Financieras (CNF) en 
                        <a href="https://www.bcentral.cl" target="_blank" class="text-decoration-none">www.bcentral.cl</a>
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
