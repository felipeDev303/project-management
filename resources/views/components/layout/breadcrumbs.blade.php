@php
    $routeName = request()->route()->getName();
    $segments = request()->segments();
@endphp

@if($routeName && $routeName !== 'dashboard')
<nav aria-label="breadcrumb" class="mb-3">
    <ol class="breadcrumb bg-custom-light rounded px-3 py-2">
        <li class="breadcrumb-item">
            <a href="{{ route('dashboard') }}" class="text-custom-dark text-decoration-none">
                <i class="fas fa-home"></i> Inicio
            </a>
        </li>
        
        @if(str_contains($routeName, 'projects'))
            <li class="breadcrumb-item">
                <a href="{{ route('projects.index') }}" class="text-custom-dark text-decoration-none">
                    <i class="fas fa-list"></i> Proyectos
                </a>
            </li>
            
            @if($routeName === 'projects.create')
                <li class="breadcrumb-item active text-custom-accent" aria-current="page">
                    <i class="fas fa-plus"></i> Crear Proyecto
                </li>
            @elseif($routeName === 'projects.show' && isset($project))
                <li class="breadcrumb-item active text-custom-accent" aria-current="page">
                    <i class="fas fa-eye"></i> {{ $project->name ?? 'Ver Proyecto' }}
                </li>
            @elseif($routeName === 'projects.edit' && isset($project))
                <li class="breadcrumb-item">
                    <a href="{{ route('projects.show', $project->id ?? '#') }}" class="text-custom-dark text-decoration-none">
                        <i class="fas fa-eye"></i> {{ $project->name ?? 'Proyecto' }}
                    </a>
                </li>
                <li class="breadcrumb-item active text-custom-accent" aria-current="page">
                    <i class="fas fa-edit"></i> Editar
                </li>
            @endif
        @elseif($routeName === 'test-uf')
            <li class="breadcrumb-item active text-custom-accent" aria-current="page">
                <i class="fas fa-vial"></i> Prueba Componente UF
            </li>
        @endif
    </ol>
</nav>
@endif
