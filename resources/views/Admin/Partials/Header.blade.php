<div class="header">
    <button id="sidebar-toggle" class="header-menu" aria-label="Toggle sidebar">
        <i class="fas fa-bars header-icon" aria-hidden="true"></i>
    </button>
    <h1 class="header-title">Dashboard</h1>

    <div class="header-user">
        <span class="user-name">{{ auth()->user()->name ?? 'Admin' }}</span>
    </div>
</div>