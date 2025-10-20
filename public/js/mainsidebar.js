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