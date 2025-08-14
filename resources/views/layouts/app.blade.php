<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gestión de Proyectos')</title>
    
    <!-- Meta Tags -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="@yield('description', 'Sistema de gestión de proyectos')">
    
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    @stack('styles')
</head>
<body class="@yield('body_class', 'd-flex flex-column min-vh-100')">
    <!-- Navigation -->
    <x-layout.header />

    <!-- Main Content -->
    <main class="@yield('main_class', 'container mt-4 flex-grow-1')">
        <!-- Breadcrumbs -->
        <x-layout.breadcrumbs />
        
        <!-- Flash Messages -->
        <x-alerts.flash-messages />
        
        @yield('content')
    </main>

    <!-- Footer -->
    <x-layout.footer />

    <!-- Scripts -->
    @stack('scripts')
</body>
</html>
</html>
