<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard - SiN Travels')</title>
    @vite(['resources/css/dashboard/dashboard.css', 'resources/js/app.js', 'resources/js/dashboard.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @livewireStyles
    @stack('styles')
</head>

<body>
    <div class="main-container">
        @include('Admin.Partials.Sidebar')
        @include('Admin.Partials.Header')

        <div class="container-dashboard">
            <div class="dashboard-content">
                @yield('content')
            </div>
        </div>

        @stack('scripts')

        <script>
            // sidebar toggle functionality
            document.getElementById('sidebar-toggle')?.addEventListener('click', function(e) {
                e.preventDefault();
                const sidebar = document.querySelector('.sidebar');
                if (!sidebar) return;

                // On desktop (>768px): use collapsed class to slide out
                // On mobile (<=768px): use open class to slide in from left
                if (window.innerWidth > 768) {
                    sidebar.classList.toggle('collapsed');
                } else {
                    sidebar.classList.toggle('open');
                }
            });

            // close sidebar when clicking outside on mobile
            document.addEventListener('click', function(e) {
                const sidebar = document.querySelector('.sidebar');
                const toggle = document.getElementById('sidebar-toggle');
                if (!sidebar || !toggle) return;

                // only on smaller screens
                if (window.innerWidth <= 768) {
                    if (!sidebar.contains(e.target) && !toggle.contains(e.target)) {
                        sidebar.classList.remove('open');
                    }
                }
            });

            // handle window resize - restore sidebar on resize to desktop
            window.addEventListener('resize', function() {
                const sidebar = document.querySelector('.sidebar');
                if (!sidebar) return;

                if (window.innerWidth > 768) {
                    sidebar.classList.remove('open');
                } else {
                    sidebar.classList.remove('collapsed');
                }
            });
        </script>
    </div>
    @livewireScripts
</body>

</html>