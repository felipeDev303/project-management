<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('dashboard') }}"><i class="fas fa-home"></i> Inicio</a>
        </li>
        
        @if(request()->routeIs('projects.*'))
            <li class="breadcrumb-item">
                <a href="{{ route('projects.index') }}">Proyectos</a>
            </li>
            
            @if(request()->routeIs('projects.create'))
                <li class="breadcrumb-item active">Crear Proyecto</li>
            @elseif(request()->routeIs('projects.show'))
                <li class="breadcrumb-item active">{{ isset($project) ? $project->name : 'Ver Proyecto' }}</li>
            @elseif(request()->routeIs('projects.edit'))
                <li class="breadcrumb-item active">Editar {{ isset($project) ? $project->name : 'Proyecto' }}</li>
            @endif
        @endif
        
        @yield('breadcrumbs')
    </ol>
</nav>
