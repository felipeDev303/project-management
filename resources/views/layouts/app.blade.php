 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Incluye Tailwind CSS si lo usas -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="container mx-auto px-4">
        @yield('content')
    </div>
</body>
</html>