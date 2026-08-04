<nav class="site-nav">
    <!-- Menu icon and brand grouped together -->
    <div class="nav-left">
        <!-- Mobile hamburger button (left corner) -->
        <button id="nav-hamburger" class="nav-hamburger" aria-label="Open navigation">
            <i class="fa-solid fa-bars"></i>
        </button>

        <div class="brand">
            <img src="/images/logo.jpeg" alt="Logo" class="logo"  loading="lazy">
            <a href="/">SIN Travels &amp; Manpower</a>
        </div>
    </div>

    <div class="nav-toggle">
        <!-- Desktop navigation links -->
        <ul class="nav-links">
            <li><a href="/">{{ __('header.home') }}</a></li>
            <li><a href="/jobs">{{ __('header.jobs') }}</a></li>
            <li><a href="/services">{{ __('header.services') }}</a></li>
            <li><a href="/about">{{ __('header.about') }}</a></li>
            <li><a href="/contact">{{ __('header.contact') }}</a></li>
        </ul>
    </div>

    <!-- Mobile drawer navigation (slides from left) -->
    <div id="nav-drawer" class="nav-drawer" aria-hidden="true">
        <button id="nav-close" class="nav-close" aria-label="Close navigation"><i class="fas fa-times"></i></button>
        <ul class="nav-drawer-links">
            <li><a href="/">{{ __('header.home') }}</a></li>
            <li><a href="/jobs">{{ __('header.jobs') }}</a></li>
            <li><a href="/services">{{ __('header.services') }}</a></li>
            <li><a href="/about">{{ __('header.about') }}</a></li>
            <li><a href="/contact">{{ __('header.contact') }}</a></li>
        </ul>
        <!-- Find Jobs button in drawer for mobile -->
        <a href="/jobs" class="btn-find-jobs-drawer">{{ __('header.browse_jobs') ?? 'Find Jobs' }}</a>
    </div>

    <div class="language-selection">
        <button class="btn-find-job">Find Jobs</button>
        <select name="language" id="language-select">
            <option value="en" {{ app()->getLocale() === 'en' ? 'selected' : '' }}>English</option>
            <option value="si" {{ app()->getLocale() === 'si' ? 'selected' : '' }}>සිංහල</option>
            <option value="ta" {{ app()->getLocale() === 'ta' ? 'selected' : '' }}>தமிழ்</option>
        </select>
    </div>
</nav>

<script>
    // language switcher
    document.getElementById('language-select').addEventListener('change', function() {
        if (this.value) {
            window.location.href = '{{ url("lang") }}/' + this.value;
        }
    });

    // navigation drawer toggle for small screens
    (function() {
        var btn = document.getElementById('nav-hamburger');
        var drawer = document.getElementById('nav-drawer');
        var closeBtn = document.getElementById('nav-close');

        if (!btn || !drawer) return;

        function openDrawer() {
            drawer.classList.add('open');
            drawer.setAttribute('aria-hidden', 'false');
            document.body.style.overflow = 'hidden';
        }

        function closeDrawer() {
            drawer.classList.remove('open');
            drawer.setAttribute('aria-hidden', 'true');
            document.body.style.overflow = '';
        }

        btn.addEventListener('click', function(e) {
            openDrawer();
        });

        if (closeBtn) closeBtn.addEventListener('click', closeDrawer);

        // close when clicking outside drawer
        document.addEventListener('click', function(e) {
            if (!drawer.classList.contains('open')) return;
            if (drawer.contains(e.target) || btn.contains(e.target)) return;
            closeDrawer();
        });

        // close on Escape
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') closeDrawer();
        });
    })();
</script>