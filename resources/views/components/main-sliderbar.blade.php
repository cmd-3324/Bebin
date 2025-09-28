{{-- Main Sidebar Component --}}
@php
$isDisplayPage = '';
@endphp
<div id="sidebar" class="mini-sidebar" data-default-open="{{ $isDisplayPage ? 'false' : 'true' }}">
    <div class="sidebar-section">
        {{-- Home with route --}}
        <a class="sidebar-item " title="Home">
            <i class="fas fa-home"></i>
            <span class="sidebar-text">Home</span>
        </a>

        {{-- The rest unchanged --}}
        <div class="sidebar-item" title="Trending">
            <i class="fas fa-fire"></i>
            <span class="sidebar-text">Trending</span>
        </div>
        <div class="sidebar-item" title="Subscriptions">
            <i class="fas fa-play-circle"></i>
            <span class="sidebar-text">Subscriptions</span>
        </div>
    </div>

    <div class="sidebar-section">
        {{-- Always show "You" section --}}
        <div class="sidebar-title">
            <span class="sidebar-text">You ></span>
        </div>
        <div class="sidebar-item" title="Library">
            <i class="fas fa-folder"></i>
            <span class="sidebar-text">Library</span>
        </div>
        <div class="sidebar-item" title="History">
            <i class="fas fa-history"></i>
            <span class="sidebar-text">History</span>
        </div>
        <div class="sidebar-item" title="Watch later">
            <i class="fas fa-clock"></i>
            <span class="sidebar-text">Watch later</span>
        </div>
        <div class="sidebar-item" title="Liked videos">
            <i class="fas fa-thumbs-up"></i>
            <span class="sidebar-text">Liked videos</span>
        </div>
    </div>

    <div class="sidebar-section">
        <div class="sidebar-title">
            <span class="sidebar-text">SUBSCRIPTIONS</span>
        </div>
        <div class="sidebar-item" title="Channel One">
            <i class="fas fa-user-circle"></i>
            <span class="sidebar-text">Channel One</span>
        </div>
        <div class="sidebar-item" title="Channel Two">
            <i class="fas fa-user-circle"></i>
            <span class="sidebar-text">Channel Two</span>
        </div>
        <div class="sidebar-item" title="Channel Three">
            <i class="fas fa-user-circle"></i>
            <span class="sidebar-text">Channel Three</span>
        </div>
        <div class="sidebar-item" title="Channel Four">
            <i class="fas fa-user-circle"></i>
            <span class="sidebar-text">Channel Four</span>
        </div>
    </div>

    <div class="sidebar-section">
        <div class="sidebar-title">
            <span class="sidebar-text">MORE FROM YOUTUBE</span>
        </div>
        <div class="sidebar-item" title="YouTube Premium">
            <i class="fab fa-youtube"></i>
            <span class="sidebar-text">YouTube Premium</span>
        </div>
        <div class="sidebar-item" title="Movies & TV">
            <i class="fas fa-film"></i>
            <span class="sidebar-text">Movies & TV</span>
        </div>
        <div class="sidebar-item" title="Gaming">
            <i class="fas fa-gamepad"></i>
            <span class="sidebar-text">Gaming</span>
        </div>
        <div class="sidebar-item" title="Live">
            <i class="fas fa-broadcast-tower"></i>
            <span class="sidebar-text">Live</span>
        </div>
    </div>

    <div class="sidebar-section">
        <div class="sidebar-item" title="Settings">
            <i class="fas fa-cog"></i>
            <span class="sidebar-text">Settings</span>
        </div>
        <div class="sidebar-item" title="Report history">
            <i class="fas fa-flag"></i>
            <span class="sidebar-text">Report history</span>
        </div>
        <div class="sidebar-item" title="Help">
            <i class="fas fa-question-circle"></i>
            <span class="sidebar-text">Help</span>
        </div>
        <div class="sidebar-item" title="Send feedback">
            <i class="fas fa-comment-alt"></i>
            <span class="sidebar-text">Send feedback</span>
        </div>
    </div>

  <div class="dark-toggle" id="darkToggle">
    <span id="darkModeText">🌙 </span>
    <i class="fas fa-moon"></i>
</div>

</div>

@push('styles')
<style>
#sidebar {
    position: fixed;
    top: 56px;
    left: 0;
    height: calc(100vh - 56px);
    background-color: #fff;
    overflow-y: auto;
    transition: all 0.3s ease;
    z-index: 999;
    padding-bottom: 12px;
    overflow-x: hidden;
}

/* Mini Sidebar (Icons only) */
#sidebar.mini-sidebar {
    width: 72px;
}

/* Full Sidebar (With text) */
#sidebar.full-sidebar {
    width: 240px;
}

body.dark #sidebar {
    background-color: #202020;
}

.sidebar-section {
    padding: 12px 0;
    border-bottom: 1px solid #e5e5e5;
}
body.dark .sidebar-section {
    border-bottom-color: #303030;
}

.sidebar-item {
    display: flex;
    align-items: center;
    padding: 0 24px;
    height: 40px;
    cursor: pointer;
    text-decoration: none;
    color: inherit;
    white-space: nowrap;
    position: relative;
}
.sidebar-item:hover {
    background-color: rgba(0, 0, 0, 0.05);
}
body.dark .sidebar-item:hover {
    background-color: rgba(255, 255, 255, 0.1);
}
.sidebar-item.active {
    background-color: rgba(0, 0, 0, 0.1);
    font-weight: 500;
}
body.dark .sidebar-item.active {
    background-color: rgba(255, 255, 255, 0.2);
}

.sidebar-item i {
    margin-right: 24px;
    width: 24px;
    text-align: center;
    flex-shrink: 0;
}

/* Sidebar text - hidden in mini mode */
.sidebar-text {
    opacity: 1;
    transition: opacity 0.2s ease;
    font-size: 14px;
}

#sidebar.mini-sidebar .sidebar-text {
    opacity: 0;
    width: 0;
    overflow: hidden;
}

/* Adjust padding for mini sidebar */
#sidebar.mini-sidebar .sidebar-item {
    padding: 0 20px;
    justify-content: center;
}

#sidebar.mini-sidebar .sidebar-item i {
    margin-right: 0;
}

/* Hide titles in mini sidebar */
#sidebar.mini-sidebar .sidebar-title {
    display: none;
}

/* Show tooltip in mini sidebar */
#sidebar.mini-sidebar .sidebar-item:hover::after {
    content: attr(title);
    position: absolute;
    left: 100%;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(0, 0, 0, 0.8);
    color: white;
    padding: 8px 12px;
    border-radius: 4px;
    font-size: 12px;
    white-space: nowrap;
    z-index: 1000;
    margin-left: 8px;
}
body.dark #sidebar.mini-sidebar .sidebar-item:hover::after {
    background: rgba(255, 255, 255, 0.9);
    color: #0f0f0f;
}

.sidebar-title {
    padding: 8px 24px;
    font-size: 14px;
    font-weight: 500;
    color: #606060;
    text-transform: uppercase;
}
body.dark .sidebar-title {
    color: #aaa;
}

.dark-toggle {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 12px 24px;
    cursor: pointer;
}

/* Adjust main content for sidebar states */
#main {
    margin-top: 56px;
    margin-left: 72px; /* Default to mini sidebar width */
    padding: 24px;
    transition: margin-left 0.3s;
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 16px;
}

#main.full-sidebar {
    margin-left: 240px;
}

/* Responsive */
@media (max-width: 768px) {
    #sidebar.full-sidebar {
        width: 200px;
    }
    #main.full-sidebar {
        margin-left: 200px;
    }
}

@media (max-width: 576px) {
    #sidebar.full-sidebar {
        transform: translateX(-100%);
    }
    #sidebar.full-sidebar.mobile-open {
        transform: translateX(0);
    }
    #main {
        margin-left: 0;
    }
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const sidebarToggle = document.getElementById('sidebarToggle');
    const sidebar = document.getElementById('sidebar');
    const main = document.getElementById('main');
    const darkToggle = document.getElementById('darkToggle');
    const darkModeText = document.getElementById('darkModeText');
    const body = document.body;

    // ✅ 1. Detect current path
    const isHomePage = window.location.pathname === '/';

    // ✅ 2. Check localStorage or use default based on route
    let sidebarExpanded = localStorage.getItem('sidebarExpanded') === 'true';

    if (localStorage.getItem('sidebarExpanded') === null) {
        sidebarExpanded = isHomePage; // default only open on "/"
    }

    // ✅ 3. Apply sidebar state
    function updateSidebar() {
        if (sidebarExpanded) {
            sidebar.classList.remove('mini-sidebar');
            sidebar.classList.add('full-sidebar');
            main?.classList.remove('mini-sidebar');
            main?.classList.add('full-sidebar');
        } else {
            sidebar.classList.remove('full-sidebar');
            sidebar.classList.add('mini-sidebar');
            main?.classList.remove('full-sidebar');
            main?.classList.add('mini-sidebar');
        }
    }

    // ✅ 4. Toggle sidebar and save state
    function toggleSidebar() {
        sidebarExpanded = !sidebarExpanded;
        localStorage.setItem('sidebarExpanded', sidebarExpanded);
        updateSidebar();
    }

    // ✅ 5. Apply theme from storage or system
    const preferredDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
    let theme = localStorage.getItem('theme') || (preferredDark ? 'dark' : 'light');
    setTheme(theme);

    function setTheme(mode) {
        if (mode === 'dark') {
            body.classList.add('dark');
            darkToggle.querySelector('i').classList.replace('fa-moon', 'fa-sun');
            darkModeText.textContent = 'Light Mode';
            localStorage.setItem('theme', 'dark');
        } else {
            body.classList.remove('dark');
            darkToggle.querySelector('i').classList.replace('fa-sun', 'fa-moon');
            darkModeText.textContent = 'Dark Mode';
            localStorage.setItem('theme', 'light');
        }
    }

    // ✅ 6. Toggle theme
    function toggleDarkMode() {
        const newTheme = body.classList.contains('dark') ? 'light' : 'dark';
        setTheme(newTheme);
    }

    // ✅ 7. Sidebar active item saving
    document.querySelectorAll('.sidebar-item').forEach(item => {
        item.addEventListener('click', () => {
            localStorage.setItem('activeSidebarItem', item.textContent.trim());
        });
    });

    // ✅ 8. Set previously active item
    const savedItem = localStorage.getItem('activeSidebarItem');
    if (savedItem) {
        document.querySelectorAll('.sidebar-item').forEach(item => {
            if (item.textContent.trim() === savedItem) {
                item.classList.add('active');
            } else {
                item.classList.remove('active');
            }
        });
    }

    // ✅ 9. Initialize
    updateSidebar();

    // ✅ 10. Event Listeners
    sidebarToggle?.addEventListener('click', toggleSidebar);
    darkToggle?.addEventListener('click', toggleDarkMode);
});
</script>
@endpush
