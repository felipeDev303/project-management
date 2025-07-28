<footer class="bg-light border-top mt-5 py-4">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <p class="text-muted mb-0">
                    &copy; {{ date('Y') }} Sistema de Gestión de Proyectos
                </p>
            </div>
            <div class="col-md-6 text-md-end">
                <small class="text-muted">
                    Desarrollado con <i class="fas fa-heart text-danger"></i> usando Laravel {{ app()->version() }}
                </small>
            </div>
        </div>
    </div>
</footer>
            <!-- Enlaces rápidos -->
            <div class="col-md-4 mb-3">
                <h6 class="text-secondary">Enlaces Rápidos</h6>
                <ul class="list-unstyled small">
                    <li class="mb-2">
                        <a href="{{ route('dashboard') }}" class="text-light text-decoration-none">
                            <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('projects.index') }}" class="text-light text-decoration-none">
                            <i class="fas fa-list me-2"></i>Ver Proyectos
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('projects.create') }}" class="text-light text-decoration-none">
                            <i class="fas fa-plus me-2"></i>Nuevo Proyecto
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="/test-uf" class="text-light text-decoration-none">
                            <i class="fas fa-vial me-2"></i>Prueba UF
                        </a>
                    </li>
                </ul>
            </div>
            
            <!-- Acceso al Dashboard destacado -->
            <div class="col-md-4 mb-3">
                <h6 class="text-secondary">Panel de Control</h6>
                <div class="card bg-primary border-0">
                    <div class="card-body text-center py-3">
                        <h6 class="card-title text-white mb-2">
                            <i class="fas fa-chart-pie me-2"></i>Dashboard
                        </h6>
                        <p class="card-text small text-white-50 mb-3">
                            Accede al panel principal con estadísticas y resumen de proyectos
                        </p>
                        <a href="{{ route('dashboard') }}" class="btn btn-light btn-sm">
                            <i class="fas fa-external-link-alt me-1"></i>
                            Ir al Dashboard
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <hr class="border-secondary">
        
        <!-- Copyright y versión -->
        <div class="row">
            <div class="col-md-8">
                <p class="small text-muted mb-0">
                    &copy; {{ date('Y') }} Sistema de Gestión de Proyectos - 
                    Desarrollado con <i class="fas fa-heart text-danger"></i> usando Laravel {{ app()->version() }}
                </p>
            </div>
            <div class="col-md-4 text-md-end">
                <small class="text-muted">
                    <i class="fas fa-code"></i> PHP {{ PHP_VERSION }}
                </small>
            </div>
        </div>
    </div>
</footer>
