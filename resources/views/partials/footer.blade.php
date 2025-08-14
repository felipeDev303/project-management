<footer class="bg-custom-dark text-white mt-5 pt-4 pb-2">
    <div class="container">
        <div class="row pb-3">
            {{-- Columna de Enlaces Rápidos --}}
            <div class="col-md-4 mb-3">
                <h6 class="text-custom-accent">
                    <i class="fas fa-project-diagram"></i> Enlaces Rápidos
                </h6>
                <ul class="list-unstyled small">
                    <li class="mb-2">
                        <a href="{{ route('dashboard') }}" class="text-custom-light text-decoration-none hover-custom-accent">
                            <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('projects.index') }}" class="text-custom-light text-decoration-none hover-custom-accent">
                            <i class="fas fa-list me-2"></i>Ver Proyectos
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('projects.create') }}" class="text-custom-light text-decoration-none hover-custom-accent">
                            <i class="fas fa-plus me-2"></i>Nuevo Proyecto
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="/test-uf" class="text-custom-light text-decoration-none hover-custom-accent">
                            <i class="fas fa-vial me-2"></i>Prueba UF
                        </a>
                    </li>
                </ul>
            </div>
            
            {{-- Columna de Información del Sistema --}}
            <div class="col-md-4 mb-3">
                <h6 class="text-custom-accent">
                    <i class="fas fa-info-circle"></i> Sistema
                </h6>
                <ul class="list-unstyled small">
                    <li class="mb-1">
                        <span class="text-custom-light">
                            <i class="fas fa-code me-2"></i>Laravel {{ app()->version() }}
                        </span>
                    </li>
                    <li class="mb-1">
                        <span class="text-custom-light">
                            <i class="fas fa-palette me-2"></i>Bootstrap 5
                        </span>
                    </li>
                    <li class="mb-1">
                        <span class="text-custom-light">
                            <i class="fas fa-tools me-2"></i>Vite
                        </span>
                    </li>
                    <li class="mb-1">
                        <span class="text-custom-light">
                            <i class="fas fa-server me-2"></i>MySQL
                        </span>
                    </li>
                </ul>
            </div>
            
            {{-- Columna de Información Financiera --}}
            <div class="col-md-4 mb-3">
                <h6 class="text-custom-accent">
                    <i class="fas fa-chart-line"></i> Información Financiera
                </h6>
                <div class="small">
                    <div class="mb-2 p-2 bg-custom-primary rounded">
                        <x-uf-value />
                    </div>
                    <small class="text-custom-light">
                        <i class="fas fa-building-columns me-1"></i>
                        Fuente: Banco Central de Chile
                    </small>
                </div>
            </div>
        </div>

        <hr class="border-custom-light">

        {{-- Copyright y Versión --}}
        <div class="row align-items-center pt-2">
            <div class="col-md-6">
                <p class="text-custom-light mb-0">
                    &copy; {{ date('Y') }} Sistema de Gestión de Proyectos
                </p>
                <small class="text-muted">
                    Desarrollado con tecnologías modernas
                </small>
            </div>
            <div class="col-md-6 text-md-end">
                <small class="text-custom-light">
                    <i class="fas fa-heart text-custom-accent"></i> 
                    Hecho con dedicación para la gestión eficiente
                </small>
            </div>
        </div>
    </div>
</footer>