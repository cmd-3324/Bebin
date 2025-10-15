{{-- Main Sidebar Component --}}
@php
$isDisplayPage = '';
@endphp
<div id="sidebar" class="mini-sidebar overflow-y-auto h-screen" data-default-open="{{ $isDisplayPage ? 'false' : 'true' }}">
    <div class="sidebar-section">
        {{-- Home with route --}}
        <a class="sidebar-item " title="Home">
            <i class="fas fa-home"></i>
            <span class="sidebar-text"><a href="{{route("home")}}">Home</a></span>
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
            <span class="sidebar-text"><a href="{{ route("gettoChannelPage") }}">You ></a></span>
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

    <!-- Physical Toggle Switch -->
   <label class="switch">
  <input type="checkbox" id="toggleTheme" />
  <span class="slider"></span>
</label>
</div>
<script>
const toggle = document.getElementById('toggleTheme');

        toggle.addEventListener('change', () => {
            if (toggle.checked) {
                document.body.classList.add('dark');
            } else {
                document.body.classList.remove('dark');
            }
        });</script>
{{-- @push('styles') --}}

<style>
 body {
            font-family: Arial, sans-serif;
            background-color: white;
            color: black;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        body.dark {
            background-color: #121212;
            color: #eee;
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 34px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }

        input:checked+.slider {
            background-color: #2196F3;
        }

        input:checked+.slider:before {
            transform: translateX(26px);
        }
/* Dark Mode Toggle Section */
.dark-mode-section {
    border-bottom: none !important;
    margin-top: auto;
    padding: 16px 0 !important;
}

.dark-toggle-wrapper {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 16px;
}

.dark-toggle-content {
    display: flex;
    align-items: center;
    gap: 12px;
}

.dark-mode-icon {
    color: #606060;
    font-size: 18px;
    width: 20px;
    text-align: center;
}

body.dark .dark-mode-icon {
    color: #aaa;
}

/* Physical Toggle Switch */
.toggle-switch {
    position: relative;
    display: inline-block;
    width: 60px;
    height: 34px;
    cursor: pointer;
}

.toggle-switch-input {
    opacity: 0;
    width: 0;
    height: 0;
    position: absolute;
}

.toggle-switch-slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    transition: .4s;
    border-radius: 34px;
    box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.2);
}

.toggle-switch-handle {
    position: absolute;
    content: "";
    height: 26px;
    width: 26px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    transition: .4s;
    border-radius: 50%;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}

/* Checked state - Physical movement */
.toggle-switch-input:checked + .toggle-switch-slider {
    background-color: #2196F3;
}

.toggle-switch-input:checked + .toggle-switch-slider .toggle-switch-handle {
    transform: translateX(26px);
}

/* Focus state for accessibility */
.toggle-switch-input:focus + .toggle-switch-slider {
    outline: 2px solid #2196F3;
    outline-offset: 2px;
}

/* Hover effects */
.toggle-switch:hover .toggle-switch-slider {
    background-color: #b8b8b8;
}

.toggle-switch:hover .toggle-switch-input:checked + .toggle-switch-slider {
    background-color: #1976D2;
}

.toggle-switch:hover .toggle-switch-handle {
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.25);
}

/* Active state */
.toggle-switch:active .toggle-switch-handle {
    transform: scale(0.95);
}

.toggle-switch-input:checked:active + .toggle-switch-slider .toggle-switch-handle {
    transform: translateX(26px) scale(0.95);
}

/* Dark mode specific adjustments */
body.dark .toggle-switch-slider {
    background-color: #555;
}

body.dark .toggle-switch:hover .toggle-switch-slider {
    background-color: #666;
}

/* Mini Sidebar Adjustments */
#sidebar.mini-sidebar .dark-toggle-wrapper {
    justify-content: center;
    padding: 0 20px;
}

#sidebar.mini-sidebar .dark-toggle-content {
    justify-content: center;
}

#sidebar.mini-sidebar .sidebar-text {
    display: none;
}

#sidebar.mini-sidebar .dark-toggle-wrapper:hover::after {
    content: "Dark Mode";
    position: absolute;
    left: 100%;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(0, 0, 0, 0.9);
    color: white;
    padding: 8px 12px;
    border-radius: 6px;
    font-size: 12px;
    font-weight: 500;
    white-space: nowrap;
    z-index: 1000;
    margin-left: 8px;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.1);
}

body.dark #sidebar.mini-sidebar .dark-toggle-wrapper:hover::after {
    background: rgba(255, 255, 255, 0.95);
    color: #0f0f0f;
    border: 1px solid rgba(0, 0, 0, 0.1);
}

/* Existing Sidebar Styles */
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
    display: flex;
    flex-direction: column;
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
    background: rgba(0, 0, 0, 0.9);
    color: white;
    padding: 8px 12px;
    border-radius: 6px;
    font-size: 12px;
    font-weight: 500;
    white-space: nowrap;
    z-index: 1000;
    margin-left: 8px;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.1);
}
body.dark #sidebar.mini-sidebar .sidebar-item:hover::after {
    background: rgba(255, 255, 255, 0.95);
    color: #0f0f0f;
    border: 1px solid rgba(0, 0, 0, 0.1);
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
{{-- @endpush --}}

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const themeToggle = document.getElementById('themeToggle');
    const body = document.body;
    const toggleSwitch = themeToggle.closest('.toggle-switch');

    // System Preference Detection
    function getSystemPreference() {
        return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
    }

    // Persistent Storage
    function getStoredTheme() {
        return localStorage.getItem('theme');
    }

    function setStoredTheme(theme) {
        localStorage.setItem('theme', theme);
    }

    // Initialize theme
    function initializeTheme() {
        const storedTheme = getStoredTheme();
        const systemTheme = getSystemPreference();

        // Use stored theme if available, otherwise use system preference
        const theme = storedTheme || systemTheme;

        if (theme === 'dark') {
            body.classList.add('dark');
            themeToggle.checked = true;
            toggleSwitch.setAttribute('aria-checked', 'true');
        } else {
            body.classList.remove('dark');
            themeToggle.checked = false;
            toggleSwitch.setAttribute('aria-checked', 'false');
        }
    }

    // Toggle theme function
    function toggleTheme() {
        if (themeToggle.checked) {
            body.classList.add('dark');
            setStoredTheme('dark');
            toggleSwitch.setAttribute('aria-checked', 'true');
        } else {
            body.classList.remove('dark');
            setStoredTheme('light');
            toggleSwitch.setAttribute('aria-checked', 'false');
        }
    }

    // Initialize theme on page load
    initializeTheme();

    // Add event listener for theme toggle
    themeToggle.addEventListener('change', toggleTheme);

    // Keyboard accessibility
    themeToggle.addEventListener('keydown', function(e) {
        if (e.key === 'Enter' || e.key === ' ') {
            e.preventDefault();
            themeToggle.checked = !themeToggle.checked;
            toggleTheme();
        }
    });

    // Listen for system theme changes (only if no user preference is stored)
    window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => {
        if (!getStoredTheme()) {
            if (e.matches) {
                body.classList.add('dark');
                themeToggle.checked = true;
                toggleSwitch.setAttribute('aria-checked', 'true');
            } else {
                body.classList.remove('dark');
                themeToggle.checked = false;
                toggleSwitch.setAttribute('aria-checked', 'false');
            }
        }
    });

    // Enhanced tooltip support for mini sidebar
    function enhanceTooltips() {
        const darkToggleWrapper = document.querySelector('.dark-toggle-wrapper');

        if (darkToggleWrapper) {
            darkToggleWrapper.addEventListener('mouseenter', function() {
                if (document.getElementById('sidebar').classList.contains('mini-sidebar')) {
                    // Tooltip is handled by CSS, but we can add additional functionality here if needed
                }
            });
        }
    }

    enhanceTooltips();
});
</script>
@endpush
