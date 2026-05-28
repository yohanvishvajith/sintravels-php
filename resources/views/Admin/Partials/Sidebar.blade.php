<aside class="sidebar">
    <div class="sidebar-header">
        <div class="sidebar-logo">
            <img src="{{ asset('images/logo.jpeg') }}" alt="Logo" class="sidebar-logo-image">
            <span>Admin Panel</span>
        </div>
    </div>
    <nav class="sidebar-menu">
        <ul class="sidebar-menu-items">
            <li class="menu-item">
                <a href="{{ route('admin.dashboard') }}"
                    class="menu-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-chart-line menu-icon"></i>
                    <span class="menu-label">Dashboard</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('admin.jobs') }}"
                    class="menu-link {{ request()->routeIs('admin.jobs') ? 'active' : '' }}">
                    <i class="fas fa-briefcase menu-icon"></i>
                    <span class="menu-label">Jobs</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('admin.expired-jobs') }}"
                    class="menu-link {{ request()->routeIs('admin.expired-jobs') ? 'active' : '' }}">
                    <i class="fas fa-archive menu-icon"></i>
                    <span class="menu-label">Expired Jobs</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('admin.settings') }}"
                    class="menu-link {{ request()->routeIs('admin.settings') ? 'active' : '' }}">
                    <i class="fas fa-cog menu-icon"></i>
                    <span class="menu-label">Settings</span>
                </a>
            </li>
        </ul>
    </nav>
    <div class="sidebar-footer">
        <a href="#" class="sidebar-help">
            <i class="fas fa-question-circle"></i>
            <span>Help & Support</span>
        </a>
        <form method="POST" action="{{ route('logout') }}" id="logout-form">
            @csrf
            <button type="submit" class="sidebar-logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
            </button>
        </form>
    </div>
</aside>