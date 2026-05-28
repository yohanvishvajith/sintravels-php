<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'SiN Travels')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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