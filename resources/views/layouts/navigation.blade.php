<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('css/navCss.css') }}">

<style>
/* Profile Dropdown Styles */
.user-profile-container, .guest-profile-container {
    position: relative;
    display: inline-block;
}

.user-avatar, .guest-avatar {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background: #065fd4;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 500;
    cursor: pointer;
    margin-left: 12px;
}

.guest-avatar {
    background: transparent;
    color: #666;
    font-size: 32px;
}

.guest-text {
    display: none;
}

.profile-dropdown {
    position: absolute;
    top: 100%;
    right: 0;
    width: 300px;
    background: white;
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.15);
    border: 1px solid #e0e0e0;
    opacity: 0;
    visibility: hidden;
    transform: translateY(-10px);
    transition: all 0.2s ease;
    z-index: 1000;
    margin-top: 8px;
}

.profile-dropdown.show {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

.profile-header {
    display: flex;
    align-items: center;
    padding: 20px;
    gap: 12px;
}

.profile-avatar-large {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: #065fd4;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 500;
    font-size: 16px;
    flex-shrink: 0;
}

.profile-avatar-large i {
    font-size: 40px;
    color: #666;
}

.profile-info {
    flex: 1;
    min-width: 0;
}

.profile-name {
    font-weight: 500;
    color: #333;
    margin-bottom: 4px;
    font-size: 16px;
}

.profile-email {
    color: #666;
    font-size: 14px;
    margin-bottom: 8px;
}

.manage-account {
    color: #065fd4;
    font-size: 14px;
    text-decoration: none;
}

.manage-account:hover {
    text-decoration: underline;
}

.profile-divider {
    height: 1px;
    background: #f0f0f0;
    margin: 8px 0;
}

.profile-options {
    padding: 8px 0;
}

.profile-option {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 8px 20px;
    color: #333;
    text-decoration: none;
    transition: background 0.2s ease;
    cursor: pointer;
    font-size: 14px;
    width: 100%;
    border: none;
    background: none;
    text-align: left;
}

.profile-option:hover {
    background: #f8f9fa;
}

.profile-option .material-symbols-outlined {
    font-size: 20px;
    color: #666;
    width: 24px;
}

.logout-btn {
    color: #c00;
}

.logout-btn .material-symbols-outlined {
    color: #c00;
}

.profile-footer {
    padding: 16px 20px;
    border-top: 1px solid #f0f0f0;
}

.policy-links {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    font-size: 12px;
}

.policy-links a {
    color: #666;
    text-decoration: none;
}

.policy-links a:hover {
    text-decoration: underline;
}

.policy-links span {
    color: #999;
}

/* Notification Styles */
.notification-container {
    position: relative;
    display: inline-block;
}

.notification-icon {
    position: relative;
    cursor: pointer;
    margin-right: 8px;
}

.notification-count {
    position: absolute;
    top: -2px;
    right: -2px;
    background: #c00;
    color: white;
    border-radius: 50%;
    width: 16px;
    height: 16px;
    font-size: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.notification-dropdown {
    position: absolute;
    top: 100%;
    right: 0;
    width: 380px;
    background: white;
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.15);
    border: 1px solid #e0e0e0;
    opacity: 0;
    visibility: hidden;
    transform: translateY(-10px);
    transition: all 0.2s ease;
    z-index: 1000;
    margin-top: 8px;
}

.notification-dropdown.show {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

.notification-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 16px 20px;
    border-bottom: 1px solid #e0e0e0;
}

.notification-header h3 {
    margin: 0;
    font-size: 16px;
    font-weight: 500;
}

.notification-settings {
    color: #666;
    cursor: pointer;
    padding: 4px;
    border-radius: 50%;
    transition: background 0.2s ease;
}

.notification-settings:hover {
    background: #f0f0f0;
}

.notification-list {
    max-height: 400px;
    overflow-y: auto;
}

.notification-item {
    display: flex;
    align-items: flex-start;
    padding: 12px 20px;
    gap: 12px;
    transition: background 0.2s ease;
    cursor: pointer;
}

.notification-item:hover {
    background: #f8f9fa;
}

.notification-avatar {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background: #ff6b6b;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-weight: 500;
    font-size: 14px;
    flex-shrink: 0;
}

.notification-content {
    flex: 1;
    min-width: 0;
}

.notification-channel {
    font-weight: 500;
    color: #333;
    margin-bottom: 2px;
    font-size: 14px;
}

.notification-text {
    color: #666;
    font-size: 14px;
    margin-bottom: 2px;
    line-height: 1.4;
}

.notification-time {
    color: #999;
    font-size: 12px;
}

.notification-thumbnail {
    width: 60px;
    height: 40px;
    background: #f0f0f0;
    border-radius: 4px;
    flex-shrink: 0;
}

.notification-footer {
    padding: 12px 20px;
    border-top: 1px solid #e0e0e0;
    text-align: center;
}

.view-all {
    color: #065fd4;
    text-decoration: none;
    font-weight: 500;
    font-size: 14px;
}

.view-all:hover {
    text-decoration: underline;
}
</style>

<x-main-sliderbar />
@section('title', "Main-Page")
<div id="header">
    <div class="header-left">
        <div id="sidebarToggle" class="header-icon"><i class="fas fa-bars"></i></div>
        <div class="logo"><i class="fab fa-youtube"></i> Bebin</div>
    </div>
    <x-search-form/>

    <div class="header-right">
        <form method="POST" action="{{ route('upload.video.post') }}" enctype="multipart/form-data" style="display: inline-block;">
            @csrf
            <input type="file" name="video" id="videoInput" accept="video/*" style="display: none;" onchange="this.form.submit()">
            <button type="button" class="upload-button" onclick="document.getElementById('videoInput').click()">
                <span>+</span> Upload Video
            </button>
        </form>

        @if(session('success'))
            <script>alert('✅ {{ session('success') }}');</script>
        @endif

        @if(session('error'))
            <script>alert('❌ {{ session('error') }}');</script>
        @endif

        @auth
            @if (Auth::user()->UserName)
            <div class="notification-container">
                <div class="header-icon notification-icon">
                    <i class="fas fa-bell"></i>
                    <span class="notification-count">3</span>
                </div>
                <div class="notification-dropdown">
                    <div class="notification-header">
                        <h3>Notifications</h3>
                        <div class="notification-settings">
                            <i class="fas fa-cog"></i>
                        </div>
                    </div>
                    <div class="notification-list">
                        <div class="notification-item">
                            <div class="notification-avatar">C</div>
                            <div class="notification-content">
                                <div class="notification-channel">Coding Master</div>
                                <div class="notification-text">uploaded a new video: "Learn JavaScript in 1 Hour"</div>
                                <div class="notification-time">2 hours ago</div>
                            </div>
                            <div class="notification-thumbnail"></div>
                        </div>
                        <div class="notification-item">
                            <div class="notification-avatar">T</div>
                            <div class="notification-content">
                                <div class="notification-channel">Tech Reviews</div>
                                <div class="notification-text">uploaded a new video: "iPhone 15 Pro Max Review"</div>
                                <div class="notification-time">1 day ago</div>
                            </div>
                            <div class="notification-thumbnail"></div>
                        </div>
                        <div class="notification-item">
                            <div class="notification-avatar">G</div>
                            <div class="notification-content">
                                <div class="notification-channel">Gaming World</div>
                                <div class="notification-text">uploaded a new video: "GTA 6 Gameplay Leaks"</div>
                                <div class="notification-time">3 days ago</div>
                            </div>
                            <div class="notification-thumbnail"></div>
                        </div>
                    </div>
                    <div class="notification-footer">
                        <a href="#" class="view-all">View all notifications</a>
                    </div>
                </div>
            </div>

            <div class="user-profile-container">
                <div class="user-avatar" id="userAvatar">{{ substr(Auth::user()->UserName, 0, 1) }}</div>
                <div class="profile-dropdown" id="profileDropdown">
                    <div class="profile-header">
                        <div class="profile-avatar-large">{{ substr(Auth::user()->UserName, 0, 1) }}</div>
                        <div class="profile-info">
                            <div class="profile-name">{{ Auth::user()->UserName }}</div>
                            <div class="profile-email">{{ Auth::user()->email }}</div>
                            <a href="#" class="manage-account">Manage your Google Account</a>
                        </div>
                    </div>
                    <div class="profile-divider"></div>
                    <div class="profile-options">
                        <a href="#" class="profile-option">
                            <span class="material-symbols-outlined">person</span>
                            Your channel
                        </a>
                        <a href="#" class="profile-option">
                            <span class="material-symbols-outlined">play_circle</span>
                            Your videos
                        </a>
                        <a href="#" class="profile-option">
                            <span class="material-symbols-outlined">movie</span>
                            Your movies & TV
                        </a>
                        <a href="#" class="profile-option">
                            <span class="material-symbols-outlined">history</span>
                            Watch history
                        </a>
                        <a href="#" class="profile-option">
                            <span class="material-symbols-outlined">playlist_play</span>
                            Playlists
                        </a>
                    </div>
                    <div class="profile-divider"></div>
                    <div class="profile-options">
                        <a href="#" class="profile-option">
                            <span class="material-symbols-outlined">settings</span>
                            Settings
                        </a>
                        <a href="#" class="profile-option">
                            <span class="material-symbols-outlined">help</span>
                            Help & feedback
                        </a>
                    </div>
                    <div class="profile-divider"></div>
                    <div class="profile-options">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="profile-option logout-btn">
                                <span class="material-symbols-outlined">logout</span>
                                Sign out
                            </button>
                        </form>
                    </div>
                    <div class="profile-footer">
                        <div class="policy-links">
                            <a href="#">Privacy Policy</a>
                            <span>•</span>
                            <a href="#">Terms of Service</a>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="notification-container">
                <div class="header-icon notification-icon">
                    <i class="fas fa-bell"></i>
                    <span class="notification-count">3</span>
                </div>
                <div class="notification-dropdown">
                    <div class="notification-header">
                        <h3>Notifications</h3>
                        <div class="notification-settings">
                            <i class="fas fa-cog"></i>
                        </div>
                    </div>
                    <div class="notification-list">
                        <div class="notification-item">
                            <div class="notification-avatar">C</div>
                            <div class="notification-content">
                                <div class="notification-channel">Coding Master</div>
                                <div class="notification-text">uploaded a new video: "Learn JavaScript in 1 Hour"</div>
                                <div class="notification-time">2 hours ago</div>
                            </div>
                            <div class="notification-thumbnail"></div>
                        </div>
                        <div class="notification-item">
                            <div class="notification-avatar">T</div>
                            <div class="notification-content">
                                <div class="notification-channel">Tech Reviews</div>
                                <div class="notification-text">uploaded a new video: "iPhone 15 Pro Max Review"</div>
                                <div class="notification-time">1 day ago</div>
                            </div>
                            <div class="notification-thumbnail"></div>
                        </div>
                        <div class="notification-item">
                            <div class="notification-avatar">G</div>
                            <div class="notification-content">
                                <div class="notification-channel">Gaming World</div>
                                <div class="notification-text">uploaded a new video: "GTA 6 Gameplay Leaks"</div>
                                <div class="notification-time">3 days ago</div>
                            </div>
                            <div class="notification-thumbnail"></div>
                        </div>
                    </div>
                    <div class="notification-footer">
                        <a href="#" class="view-all">View all notifications</a>
                    </div>
                </div>
            </div>
            <div class="guest-profile-container">
                <div class="guest-avatar" id="guestAvatar">
                    <i class="fas fa-user-circle"></i>
                </div>
                <div class="profile-dropdown" id="guestDropdown">
                    <div class="profile-header">
                        <div class="profile-avatar-large">
                            <i class="fas fa-user-circle"></i>
                        </div>
                        <div class="profile-info">
                            <div class="profile-name">Guest User</div>
                            <div class="profile-email">Watch and explore videos</div>
                        </div>
                    </div>
                    <div class="profile-divider"></div>
                    <div class="profile-options">
                        <a href="{{ route('login') }}" class="profile-option">
                            <span class="material-symbols-outlined">login</span>
                            Sign in
                        </a>
                        <a href="{{ route('register') }}" class="profile-option">
                            <span class="material-symbols-outlined">person_add</span>
                            Create account
                        </a>
                    </div>
                    <div class="profile-divider"></div>
                    <div class="profile-options">
                        <a href="#" class="profile-option">
                            <span class="material-symbols-outlined">language</span>
                            Language: English
                        </a>
                        <a href="#" class="profile-option">
                            <span class="material-symbols-outlined">public</span>
                            Location: Worldwide
                        </a>
                        <a href="#" class="profile-option">
                            <span class="material-symbols-outlined">settings</span>
                            Settings
                        </a>
                        <a href="#" class="profile-option">
                            <span class="material-symbols-outlined">help</span>
                            Help & feedback
                        </a>
                    </div>
                    <div class="profile-divider"></div>
                    <div class="profile-options">
                        <a href="#" class="profile-option">
                            <span class="material-symbols-outlined">volunteer_activism</span>
                            Donate to Bebin
                        </a>
                    </div>
                    <div class="profile-footer">
                        <div class="policy-links">
                            <a href="#">Privacy Policy</a>
                            <span>•</span>
                            <a href="#">Terms of Service</a>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        @else
        <div class="notification-container">
            <div class="header-icon notification-icon">
                <i class="fas fa-bell"></i>
                <span class="notification-count">3</span>
            </div>
            <div class="notification-dropdown">
                <div class="notification-header">
                    <h3>Notifications</h3>
                    <div class="notification-settings">
                        <i class="fas fa-cog"></i>
                    </div>
                </div>
                <div class="notification-list">
                    <div class="notification-item">
                        <div class="notification-avatar">C</div>
                        <div class="notification-content">
                            <div class="notification-channel">Coding Master</div>
                            <div class="notification-text">uploaded a new video: "Learn JavaScript in 1 Hour"</div>
                            <div class="notification-time">2 hours ago</div>
                        </div>
                        <div class="notification-thumbnail"></div>
                    </div>
                    <div class="notification-item">
                        <div class="notification-avatar">T</div>
                        <div class="notification-content">
                            <div class="notification-channel">Tech Reviews</div>
                            <div class="notification-text">uploaded a new video: "iPhone 15 Pro Max Review"</div>
                            <div class="notification-time">1 day ago</div>
                        </div>
                        <div class="notification-thumbnail"></div>
                    </div>
                    <div class="notification-item">
                        <div class="notification-avatar">G</div>
                        <div class="notification-content">
                            <div class="notification-channel">Gaming World</div>
                            <div class="notification-text">uploaded a new video: "GTA 6 Gameplay Leaks"</div>
                            <div class="notification-time">3 days ago</div>
                        </div>
                        <div class="notification-thumbnail"></div>
                    </div>
                </div>
                <div class="notification-footer">
                    <a href="#" class="view-all">View all notifications</a>
                </div>
            </div>
        </div>
        <div class="guest-profile-container">
            <div class="guest-avatar" id="guestAvatar">
                <i class="fas fa-user-circle"></i>
                <span class="guest-text"><a href="/dashboard" class="">Guest</a></span>
            </div>
            <div class="profile-dropdown" id="guestDropdown">
                <div class="profile-header">
                    <div class="profile-avatar-large">
                        <i class="fas fa-user-circle"></i>
                    </div>
                    <div class="profile-info">
                        <div class="profile-name">Guest User</div>
                        <div class="profile-email">Watch and explore videos</div>
                    </div>
                </div>
                <div class="profile-divider"></div>
                <div class="profile-options">
                    <a href="{{ route('login') }}" class="profile-option">
                        <span class="material-symbols-outlined">login</span>
                        Sign in
                    </a>
                    <a href="{{ route('register') }}" class="profile-option">
                        <span class="material-symbols-outlined">person_add</span>
                        Create account
                    </a>
                </div>
                <div class="profile-divider"></div>
                <div class="profile-options">
                    <a href="#" class="profile-option">
                        <span class="material-symbols-outlined">language</span>
                        Language: English
                    </a>
                    <a href="#" class="profile-option">
                        <span class="material-symbols-outlined">public</span>
                        Location: Worldwide
                    </a>
                    <a href="#" class="profile-option">
                        <span class="material-symbols-outlined">settings</span>
                        Settings
                    </a>
                    <a href="#" class="profile-option">
                        <span class="material-symbols-outlined">help</span>
                        Help & feedback
                    </a>
                </div>
                <div class="profile-divider"></div>
                <div class="profile-options">
                    <a href="#" class="profile-option">
                        <span class="material-symbols-outlined">volunteer_activism</span>
                        Donate to Bebin
                    </a>
                </div>
                <div class="profile-footer">
                    <div class="policy-links">
                        <a href="#">Privacy Policy</a>
                        <span>•</span>
                        <a href="#">Terms of Service</a>
                    </div>
                </div>
            </div>
        </div>
        @endauth
    </div>
</div>

<div id="voiceSearchModal" class="voice-modal">
    <div class="voice-modal-content">
        <div class="voice-modal-header">
            <h3>Voice Search</h3>
            <button class="voice-modal-close">&times;</button>
        </div>
        <div class="voice-modal-body">
            <div class="voice-animation">
                <div class="voice-pulse"></div>
                <i class="fas fa-microphone"></i>
            </div>
            <p class="voice-instruction">Speak now...</p>
            <p class="voice-status">Listening...</p>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    // Sidebar toggle functionality
    const sidebarToggle = document.getElementById('sidebarToggle');
    const sidebar = document.getElementById('sidebar');
    const main = document.getElementById('main');
    
    let sidebarOpen = false;

    if (sidebarToggle && sidebar) {
        sidebarToggle.addEventListener('click', function() {
            sidebarOpen = !sidebarOpen;
            if(sidebarOpen){
                sidebar.classList.remove('collapsed');
                if (main) main.classList.remove('sidebar-collapsed');
            } else {
                sidebar.classList.add('collapsed');
                if (main) main.classList.add('sidebar-collapsed');
            }
        });
    }

    // Voice search functionality
    const micButtons = document.querySelectorAll('.mic-button');
    const searchInput = document.querySelector('.search-input');
    const voiceSearchModal = document.getElementById('voiceSearchModal');
    const voiceModalClose = document.querySelector('.voice-modal-close');
    const voiceStatus = document.querySelector('.voice-status');
    const voiceInstruction = document.querySelector('.voice-instruction');
    
    let recognition = null;
    let isListening = false;

    const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;

    if (SpeechRecognition) {
        recognition = new SpeechRecognition();
        recognition.continuous = false;
        recognition.interimResults = false;
        recognition.lang = 'en-US';

        recognition.onstart = function() {
            isListening = true;
            voiceStatus.textContent = 'Listening...';
            voiceInstruction.textContent = 'Speak now...';
        };

        recognition.onresult = function(event) {
            const transcript = event.results[0][0].transcript;
            if (searchInput) {
                searchInput.value = transcript;
                searchInput.dispatchEvent(new Event('input', { bubbles: true }));
            }
            closeVoiceModal();
        };

        recognition.onerror = function(event) {
            console.error('Speech recognition error:', event.error);
            voiceStatus.textContent = 'Error: ' + event.error;
            voiceInstruction.textContent = 'Click microphone to try again';
            isListening = false;
        };

        recognition.onend = function() {
            isListening = false;
            if (voiceStatus.textContent === 'Listening...') {
                voiceStatus.textContent = 'No speech detected';
                voiceInstruction.textContent = 'Click microphone to try again';
            }
        };
    }

    function startVoiceSearch() {
        if (!recognition) {
            alert('Your browser does not support voice search. Please use Chrome, Edge, or Safari.');
            return;
        }

        showVoiceModal();

        try {
            recognition.start();
        } catch (error) {
            console.error('Error starting speech recognition:', error);
            voiceStatus.textContent = 'Error starting voice search';
            voiceInstruction.textContent = 'Please try again';
        }
    }

    function showVoiceModal() {
        voiceSearchModal.style.display = 'flex';
        voiceStatus.textContent = 'Listening...';
        voiceInstruction.textContent = 'Speak now...';
    }

    function closeVoiceModal() {
        voiceSearchModal.style.display = 'none';
        if (recognition && isListening) {
            recognition.stop();
        }
    }

    // Profile and notification dropdown functionality
    const userAvatar = document.getElementById('userAvatar');
    const guestAvatar = document.getElementById('guestAvatar');
    const profileDropdown = document.getElementById('profileDropdown');
    const guestDropdown = document.getElementById('guestDropdown');
    const notificationIcons = document.querySelectorAll('.notification-icon');
    const notificationDropdowns = document.querySelectorAll('.notification-dropdown');

    // Profile dropdown functionality
    if (userAvatar && profileDropdown) {
        userAvatar.addEventListener('click', function(e) {
            e.stopPropagation();
            const isVisible = profileDropdown.classList.contains('show');
            
            document.querySelectorAll('.profile-dropdown').forEach(d => d.classList.remove('show'));
            notificationDropdowns.forEach(d => d.classList.remove('show'));

            if (!isVisible) {
                profileDropdown.classList.add('show');
            }
        });
    }

    if (guestAvatar && guestDropdown) {
        guestAvatar.addEventListener('click', function(e) {
            e.stopPropagation();
            const isVisible = guestDropdown.classList.contains('show');
            
            document.querySelectorAll('.profile-dropdown').forEach(d => d.classList.remove('show'));
            notificationDropdowns.forEach(d => d.classList.remove('show'));

            if (!isVisible) {
                guestDropdown.classList.add('show');
            }
        });
    }

    // Notification dropdown functionality
    notificationIcons.forEach(icon => {
        icon.addEventListener('click', function(e) {
            e.stopPropagation();
            const dropdown = this.closest('.notification-container').querySelector('.notification-dropdown');
            const isVisible = dropdown.classList.contains('show');

            notificationDropdowns.forEach(d => d.classList.remove('show'));
            document.querySelectorAll('.profile-dropdown').forEach(d => d.classList.remove('show'));

            if (!isVisible) {
                dropdown.classList.add('show');
            }
        });
    });

    // Close dropdowns when clicking outside
    document.addEventListener('click', function() {
        notificationDropdowns.forEach(dropdown => {
            dropdown.classList.remove('show');
        });
        document.querySelectorAll('.profile-dropdown').forEach(dropdown => {
            dropdown.classList.remove('show');
        });
    });

    // Prevent dropdowns from closing when clicking inside
    notificationDropdowns.forEach(dropdown => {
        dropdown.addEventListener('click', function(e) {
            e.stopPropagation();
        });
    });

    document.querySelectorAll('.profile-dropdown').forEach(dropdown => {
        dropdown.addEventListener('click', function(e) {
            e.stopPropagation();
        });
    });

    // Voice search event listeners
    micButtons.forEach(button => {
        button.addEventListener('click', startVoiceSearch);
    });

    voiceModalClose.addEventListener('click', closeVoiceModal);

    voiceSearchModal.addEventListener('click', function(e) {
        if (e.target === voiceSearchModal) {
            closeVoiceModal();
        }
    });

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeVoiceModal();
        }
    });
});
</script>