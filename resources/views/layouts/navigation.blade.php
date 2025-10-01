<!-- Header -->
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('css/navCss.css') }}">

<!-- Sidebar Component -->
<x-main-sliderbar />
@section('title', "Main-Page")
<div id="header">
    <div class="header-left">
        <div id="sidebarToggle" class="header-icon"><i class="fas fa-bars"></i></div>
        <div class="logo"><i class="fab fa-youtube"></i> Bebin</div>
    </div>
    <x-search-form/>

    <div class="header-right">
<div class="header-right">
    <!-- Upload Form -->
    <form method="POST" action="{{ route('upload.video.post') }}" enctype="multipart/form-data" style="display: inline-block;">
        @csrf
        <input type="file" name="video" id="videoInput" accept="video/*" style="display: none;" onchange="this.form.submit()">
        <button type="button" class="upload-button" onclick="document.getElementById('videoInput').click()">
            <span>+</span> Upload Video
        </button>
    </form>

    <!-- Display Messages -->
    @if(session('success'))
        <script>alert('✅ {{ session('success') }}');</script>
    @endif

    @if(session('error'))
        <script>alert('❌ {{ session('error') }}');</script>
    @endif

    <!-- Rest of your notifications code... -->
</div>



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
                        <div class="notification-item">
                            <div class="notification-avatar">M</div>
                            <div class="notification-content">
                                <div class="notification-channel">Music Vibes</div>
                                <div class="notification-text">uploaded a new video: "Top 10 Songs of 2023"</div>
                                <div class="notification-time">1 week ago</div>
                            </div>
                            <div class="notification-thumbnail"></div>
                        </div>
                        <div class="notification-item">
                            <div class="notification-avatar">F</div>
                            <div class="notification-content">
                                <div class="notification-channel">Food Network</div>
                                <div class="notification-text">uploaded a new video: "5 Minute Healthy Breakfast"</div>
                                <div class="notification-time">2 weeks ago</div>
                            </div>
                            <div class="notification-thumbnail"></div>
                        </div>
                    </div>
                    <div class="notification-footer">
                        <a href="#" class="view-all">View all notifications</a>
                    </div>
                </div>
            </div>
            <div class="user-avatar">{{ substr(Auth::user()->UserName, 0, 1) }}</div>
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
            <div class="guest-avatar">
                <i class="fas fa-user-circle"></i>
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
        <div class="guest-avatar">
            <i class="fas fa-user-circle"></i>
            <span class="guest-text">Guest</span>
        </div>
        @endauth
    </div>
</div>

<!-- Voice Search Modal -->
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
    const sidebarToggle = document.getElementById('sidebarToggle');
    const sidebar = document.getElementById('sidebar');
    const main = document.getElementById('main');
    const micButtons = document.querySelectorAll('.mic-button');
    const searchInput = document.querySelector('.search-input');
    const voiceSearchModal = document.getElementById('voiceSearchModal');
    const voiceModalClose = document.querySelector('.voice-modal-close');
    const voiceStatus = document.querySelector('.voice-status');
    const voiceInstruction = document.querySelector('.voice-instruction');

    let sidebarOpen = false;
    let recognition = null;
    let isListening = false;

    // Check if browser supports speech recognition
    const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;

    // Initialize speech recognition
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
                // Trigger input event for any listeners
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

    // Voice search functionality
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

    // Sidebar toggle functionality
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

    // Notification dropdown functionality
    const notificationIcons = document.querySelectorAll('.notification-icon');
    const notificationDropdowns = document.querySelectorAll('.notification-dropdown');

    notificationIcons.forEach(icon => {
        icon.addEventListener('click', function(e) {
            e.stopPropagation();
            const dropdown = this.closest('.notification-container').querySelector('.notification-dropdown');
            const isVisible = dropdown.classList.contains('show');

            // Close all dropdowns first
            notificationDropdowns.forEach(d => d.classList.remove('show'));

            // Toggle current dropdown
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
    });

    // Prevent dropdown from closing when clicking inside it
    notificationDropdowns.forEach(dropdown => {
        dropdown.addEventListener('click', function(e) {
            e.stopPropagation();
        });
    });

    // Event listeners for voice search
    micButtons.forEach(button => {
        button.addEventListener('click', startVoiceSearch);
    });

    voiceModalClose.addEventListener('click', closeVoiceModal);

    // Close modal when clicking outside
    voiceSearchModal.addEventListener('click', function(e) {
        if (e.target === voiceSearchModal) {
            closeVoiceModal();
        }
    });

    // Close modal with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeVoiceModal();
        }
    });
});
</script>

