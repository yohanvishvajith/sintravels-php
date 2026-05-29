<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'SIN Travels - Auth')</title>
    @vite(['resources/css/auth/auth.css', 'resources/js/app.js'])
    @stack('styles')
</head>

<body class="bg-gray-50">
    <div class="min-h-screen flex flex-col items-center justify-center px-4 sm:px-6 lg:px-8">
        <!-- Branding / Logo Section -->
        <div class="mb-8 text-center">
            <a href="" class="inline-block">
                <h1 class="text-3xl font-bold text-gray-900">SIN Travels</h1>
                <p class="text-gray-600 mt-1">Manpower Solutions</p>
            </a>
        </div>

        <!-- Auth Card Container -->
        <div class="w-full max-w-md bg-white rounded-lg shadow-md p-8">
            @yield('content')
        </div>

     
    </div>

    <!-- WhatsApp Floating Button -->


    <!-- Scripts -->
    @stack('scripts')
</body>

</html>