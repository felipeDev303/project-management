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
        </div>
        
        <hr class="border-secondary">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <h6 class="text-secondary">Enlaces Rápidos</h6>
                    <ul class="list-unstyled small">
                        <li class="mb-2">
                            <a href="{{ route('dashboard') }}" class="text-primary text-decoration-none">
                                <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="{{ route('projects.index') }}" class="text-primary text-decoration-none">
                                <i class="fas fa-list me-2"></i>Ver Proyectos
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="{{ route('projects.create') }}" class="text-primary text-decoration-none">
                                <i class="fas fa-plus me-2"></i>Nuevo Proyecto
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="/test-uf" class="text-primary text-decoration-none">
                                <i class="fas fa-vial me-2"></i>Prueba UF
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </footer>