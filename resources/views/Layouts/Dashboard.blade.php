<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard - SIN Travels')</title>
    @vite(['resources/css/dashboard/dashboard.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
    <script>
        // Initialize toast listener
        Livewire.on('toast', ({ type = 'success', message, position = 'bottom-right' }) => {
            showToast(message, type, position);
        });

        function showToast(message, type = 'success', position = 'bottom-right') {
            const toastContainer = document.getElementById('toast-container') || createToastContainer();
            
            const toast = document.createElement('div');
            toast.className = `toast toast-${type}`;
            toast.innerHTML = `
                <div class="toast-content">
                    <i class="fas fa-${getIconByType(type)}"></i>
                    <span>${message}</span>
                </div>
                <button class="toast-close" onclick="this.parentElement.remove()" type="button">
                    <i class="fas fa-times"></i>
                </button>
            `;
            
            toastContainer.appendChild(toast);
            
            // Trigger reflow to ensure animation plays
            void toast.offsetWidth;
            toast.classList.add('show');
            
            // Auto dismiss after 3 seconds
            setTimeout(() => {
                toast.classList.remove('show');
                setTimeout(() => toast.remove(), 300);
            }, 3000);
        }

        function createToastContainer() {
            const container = document.createElement('div');
            container.id = 'toast-container';
            container.className = 'toast-container';
            document.body.appendChild(container);
            return container;
        }

        function getIconByType(type) {
            const icons = {
                'success': 'check-circle',
                'error': 'exclamation-circle',
                'warning': 'exclamation-triangle',
                'info': 'info-circle'
            };
            return icons[type] || 'bell';
        }
    </script>
    <style>
        .toast-container {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 9999;
            display: flex;
            flex-direction: column;
            gap: 10px;
            pointer-events: none;
        }

        .toast {
            pointer-events: auto;
            background: white;
            border-left: 4px solid #10b981;
            border-radius: 4px;
            padding: 12px 16px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            min-width: 300px;
            opacity: 0;
            transform: translateX(450px);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .toast.show {
            opacity: 1;
            transform: translateX(0);
        }

        .toast-content {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #1f2937;
            font-size: 14px;
        }

        .toast-content i {
            font-size: 18px;
            flex-shrink: 0;
        }

        .toast-success { border-left-color: #10b981; }
        .toast-success .toast-content i { color: #10b981; }

        .toast-error { border-left-color: #ef4444; }
        .toast-error .toast-content i { color: #ef4444; }

        .toast-warning { border-left-color: #f59e0b; }
        .toast-warning .toast-content i { color: #f59e0b; }

        .toast-info { border-left-color: #3b82f6; }
        .toast-info .toast-content i { color: #3b82f6; }

        .toast-close {
            background: none;
            border: none;
            cursor: pointer;
            color: #9ca3af;
            font-size: 14px;
            padding: 0;
            transition: color 0.2s;
            flex-shrink: 0;
        }

        .toast-close:hover {
            color: #1f2937;
        }
    </style>
</body>

</html>