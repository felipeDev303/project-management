<nav class="navbar navbar-expand-lg navbar-dark bg-custom-dark">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('dashboard') }}">
            <i class="fas fa-project-diagram text-custom-light"></i> Gestión de Proyectos
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active text-custom-accent fw-bold' : '' }}" href="{{ route('dashboard') }}">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('projects.*') ? 'active text-custom-accent fw-bold' : '' }}" href="{{ route('projects.index') }}">
                        <i class="fas fa-list"></i> Proyectos
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-plus"></i> Crear
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="{{ route('projects.create') }}">
                                <i class="fas fa-plus-circle text-custom-primary"></i> Nuevo Proyecto
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item" href="/test-uf">
                                <i class="fas fa-vial text-custom-accent"></i> Prueba Componente UF
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            
            <ul class="navbar-nav">
                <li class="nav-item">
                    <span class="navbar-text d-flex align-items-center">
                        <small class="text-custom-light me-2">Valor UF:</small>
                        <x-uf-value />
                    </span>
                </li>
            </ul>
        </div>
    </div>
</nav>
