<div class="header">
    <button id="sidebar-toggle" class="header-menu" aria-label="Toggle sidebar">
        <i class="fas fa-bars header-icon" aria-hidden="true"></i>
    </button>
    <h1 class="header-title">Dashboard</h1>

    <div class="header-user">
        <div class="user-dropdown">
            <button class="user-dropdown-btn" id="userDropdownBtn">
                <span class="user-name">{{ auth()->user()->name ?? 'Admin' }}</span>
                <i class="fas fa-chevron-down ml-2" style="font-size: 0.8rem; margin-left: 0.5rem; opacity: 0.8;"></i>
            </button>
            <div class="user-dropdown-content" id="userDropdownContent">
                <div class="dropdown-header">
                    <p class="dropdown-user-email">{{ auth()->user()->email ?? '' }}</p>
                </div>
                <div class="dropdown-divider"></div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="dropdown-item logout-item">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dropdownBtn = document.getElementById('userDropdownBtn');
        const dropdownContent = document.getElementById('userDropdownContent');

        if (dropdownBtn && dropdownContent) {
            dropdownBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                dropdownContent.classList.toggle('show');
            });

            document.addEventListener('click', function(e) {
                if (!dropdownBtn.contains(e.target) && !dropdownContent.contains(e.target)) {
                    dropdownContent.classList.remove('show');
                }
            });
        }
    });
</script>