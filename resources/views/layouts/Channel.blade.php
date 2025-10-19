<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title', "This is My title") || {{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        <!-- Critical CSS -->
        <link rel="stylesheet" href="{{ asset('css/navCss.css') }}">
        <link rel="stylesheet" href="{{ asset('css/SearchBarCss.css') }}">
        <link rel="stylesheet" href="{{ asset('css/VideoCard.css') }}">
        <link rel="stylesheet" href="{{ asset('css/MainSliderCss.css') }}">

        <!-- Component CSS -->
        <style>
            /* Global Styles */
            body {
                font-family: Arial, sans-serif;
                background-color: white;
                color: black;
                transition: background-color 0.3s ease, color 0.3s ease;
                margin: 0;
                padding: 0;
            }

            body.dark {
                background-color: #121212;
                color: #eee;
            }

            /* Main Content */
            #main-content {
                margin-top: 56px;
                margin-left: 72px;
                padding: 24px;
                transition: margin-left 0.3s;
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
                gap: 16px;
            }

            #main-content.full-sidebar {
                margin-left: 240px;
            }

            /* Dropdown States */
            .profile-dropdown, .notification-dropdown {
                display: none;
            }

            .profile-dropdown.show, .notification-dropdown.show {
                display: block;
            }

            /* Header Styles */
            #header {
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                height: 56px;
                background: white;
                display: flex;
                align-items: center;
                justify-content: space-between;
                padding: 0 16px;
                z-index: 1000;
                border-bottom: 1px solid #e5e5e5;
            }

            body.dark #header {
                background: #202020;
                border-bottom-color: #303030;
            }

            .header-left, .header-right {
                display: flex;
                align-items: center;
                gap: 16px;
            }

            .header-icon {
                width: 40px;
                height: 40px;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                cursor: pointer;
                transition: background-color 0.2s;
            }

            .header-icon:hover {
                background-color: rgba(0, 0, 0, 0.05);
            }

            body.dark .header-icon:hover {
                background-color: rgba(255, 255, 255, 0.1);
            }

          
        </style>

        <script>
            localStorage.removeItem('register_email');
            localStorage.removeItem('register_username');
            localStorage.removeItem('register_code');
            localStorage.removeItem('register_password');
            localStorage.removeItem('register_password_confirm');
            localStorage.removeItem('verification_resend_expiry');
        </script>
    </head>

<body>
    @include('layouts.navigation')

    <!-- Main Content -->
   {{-- @yield("content-videos") --}}
<div id="main-content">
    
    </div>

    <x-contact-form />
    <x-email-verficiation-code />

    <!-- Global JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log('DOM loaded - initializing components');
            
            // Initialize dark mode
            initializeDarkMode();
            
            // Initialize sidebar toggle
            initializeSidebar();
            
            // Initialize dropdowns
            initializeDropdowns();
            
            // Initialize voice search
            initializeVoiceSearch();
            
            // Initialize theme system
            initializeThemeSystem();
        });

        function initializeDarkMode() {
            const toggle = document.getElementById('toggleTheme');
            if (toggle) {
                toggle.addEventListener('change', () => {
                    if (toggle.checked) {
                        document.body.classList.add('dark');
                        localStorage.setItem('theme', 'dark');
                    } else {
                        document.body.classList.remove('dark');
                        localStorage.setItem('theme', 'light');
                    }
                });

                // Set initial state
                const savedTheme = localStorage.getItem('theme') || 'light';
                if (savedTheme === 'dark') {
                    toggle.checked = true;
                    document.body.classList.add('dark');
                }
            }
        }

        function initializeSidebar() {
            const sidebarToggle = document.getElementById('sidebarToggle');
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('main-content');
            
            if (sidebarToggle && sidebar) {
                sidebarToggle.addEventListener('click', function() {
                    const isMini = sidebar.classList.contains('mini-sidebar');
                    
                    if (isMini) {
                        sidebar.classList.remove('mini-sidebar');
                        sidebar.classList.add('full-sidebar');
                        if (mainContent) mainContent.classList.add('full-sidebar');
                    } else {
                        sidebar.classList.remove('full-sidebar');
                        sidebar.classList.add('mini-sidebar');
                        if (mainContent) mainContent.classList.remove('full-sidebar');
                    }
                });
            }
        }

        function initializeDropdowns() {
            // Profile dropdowns
            const userAvatar = document.getElementById('userAvatar');
            const guestAvatar = document.getElementById('guestAvatar');
            const profileDropdown = document.getElementById('profileDropdown');
            const guestDropdown = document.getElementById('guestDropdown');

            // Notification dropdowns
            const notificationIcons = document.querySelectorAll('.notification-icon');
            const notificationDropdowns = document.querySelectorAll('.notification-dropdown');

            // Profile dropdown functionality
            if (userAvatar && profileDropdown) {
                userAvatar.addEventListener('click', function(e) {
                    e.stopPropagation();
                    closeAllDropdowns();
                    profileDropdown.classList.toggle('show');
                });
            }

            if (guestAvatar && guestDropdown) {
                guestAvatar.addEventListener('click', function(e) {
                    e.stopPropagation();
                    closeAllDropdowns();
                    guestDropdown.classList.toggle('show');
                });
            }

            // Notification dropdown functionality
            notificationIcons.forEach(icon => {
                icon.addEventListener('click', function(e) {
                    e.stopPropagation();
                    const dropdown = this.closest('.notification-container').querySelector('.notification-dropdown');
                    closeAllDropdowns();
                    dropdown.classList.toggle('show');
                });
            });

            // Close dropdowns when clicking outside
            document.addEventListener('click', closeAllDropdowns);

            function closeAllDropdowns() {
                document.querySelectorAll('.profile-dropdown, .notification-dropdown').forEach(dropdown => {
                    dropdown.classList.remove('show');
                });
            }

            // Prevent dropdowns from closing when clicking inside
            document.querySelectorAll('.profile-dropdown, .notification-dropdown').forEach(dropdown => {
                dropdown.addEventListener('click', function(e) {
                    e.stopPropagation();
                });
            });
        }

        function initializeVoiceSearch() {
            const micButtons = document.querySelectorAll('.mic-button');
            const voiceSearchModal = document.getElementById('voiceSearchModal');
            const voiceModalClose = document.querySelector('.voice-modal-close');

            if (micButtons.length && voiceSearchModal) {
                micButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        voiceSearchModal.style.display = 'flex';
                    });
                });

                if (voiceModalClose) {
                    voiceModalClose.addEventListener('click', function() {
                        voiceSearchModal.style.display = 'none';
                    });
                }

                voiceSearchModal.addEventListener('click', function(e) {
                    if (e.target === voiceSearchModal) {
                        voiceSearchModal.style.display = 'none';
                    }
                });

                document.addEventListener('keydown', function(e) {
                    if (e.key === 'Escape' && voiceSearchModal.style.display === 'flex') {
                        voiceSearchModal.style.display = 'none';
                    }
                });
            }
        }

        function initializeThemeSystem() {
            const themeToggle = document.getElementById('themeToggle');
            if (themeToggle) {
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
                    const theme = storedTheme || systemTheme;

                    if (theme === 'dark') {
                        document.body.classList.add('dark');
                        themeToggle.checked = true;
                    } else {
                        document.body.classList.remove('dark');
                        themeToggle.checked = false;
                    }
                }

                // Toggle theme function
                function toggleTheme() {
                    if (themeToggle.checked) {
                        document.body.classList.add('dark');
                        setStoredTheme('dark');
                    } else {
                        document.body.classList.remove('dark');
                        setStoredTheme('light');
                    }
                }

                // Initialize theme on page load
                initializeTheme();

                // Add event listener for theme toggle
                themeToggle.addEventListener('change', toggleTheme);

                // Listen for system theme changes
                window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => {
                    if (!getStoredTheme()) {
                        if (e.matches) {
                            document.body.classList.add('dark');
                            themeToggle.checked = true;
                        } else {
                            document.body.classList.remove('dark');
                            themeToggle.checked = false;
                        }
                    }
                });
            }
        }
    </script>
</body>
</html>