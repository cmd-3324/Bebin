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
