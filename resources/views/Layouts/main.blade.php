<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'SIN Travels')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
   <!-- Stylesheet -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jsvectormap/dist/jsvectormap.min.css" />

<!-- Core library -->
<script src="https://cdn.jsdelivr.net/npm/jsvectormap"></script>

<!-- World map (replace with your desired map) -->
<script src="https://cdn.jsdelivr.net/npm/jsvectormap/dist/maps/world.js"></script>
    @stack('styles')
</head>

<body>
    <header class="header">

        @include('Partials.Header')

    </header>

    <main class="main-container">
        @yield('content')
    </main>

    <footer class="text-center">
        @include('Partials.Footer')
    </footer>

    <!-- WhatsApp Floating Button -->
    <x-whatsapp-float />

    <!-- Scripts -->

    @stack('scripts')
</body>

</html>