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

<body>
    <div class="container">
        <!-- Auth Header -->
        <header class="auth-header">
            <div class="header-content">
                <h1 class="header-title">SIN Travels & Manpower</h1>
          
            </div>
        </header>

        <!-- Auth Card Container -->
        <div class="auth-card">
            @yield('content')
        </div>

     
    </div>




    <!-- Scripts -->
    @stack('scripts')
</body>

</html>