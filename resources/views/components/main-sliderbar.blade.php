{{-- Main Sidebar Component --}}
<div id="sidebar" class="collapsed">
    <div class="sidebar-section">
        <div class="sidebar-item active"><i class="fas fa-home"></i> Home</div>
        <div class="sidebar-item"><i class="fas fa-fire"></i> Trending</div>
        <div class="sidebar-item"><i class="fas fa-play-circle"></i> Subscriptions</div>
    </div>

    <div class="sidebar-section">
    @auth
        <div class="sidebar-item"><i class="fas fa-folder"></i> Library</div>
        <div class="sidebar-item"><i class="fas fa-history"></i> History</div>
        <div class="sidebar-item"><i class="fas fa-clock"></i> Watch later</div>
        <div class="sidebar-item"><i class="fas fa-thumbs-up"></i> Liked videos</div>
    @endauth

    </div>

    <div class="sidebar-section">
        <div class="sidebar-title">SUBSCRIPTIONS</div>
        <div class="sidebar-item"><i class="fas fa-user-circle"></i> Channel One</div>
        <div class="sidebar-item"><i class="fas fa-user-circle"></i> Channel Two</div>
        <div class="sidebar-item"><i class="fas fa-user-circle"></i> Channel Three</div>
        <div class="sidebar-item"><i class="fas fa-user-circle"></i> Channel Four</div>
    </div>

    <div class="sidebar-section">
        <div class="sidebar-title">MORE FROM YOUTUBE</div>
        <div class="sidebar-item"><i class="fab fa-youtube"></i> YouTube Premium</div>
        <div class="sidebar-item"><i class="fas fa-film"></i> Movies & TV</div>
        <div class="sidebar-item"><i class="fas fa-gamepad"></i> Gaming</div>
        <div class="sidebar-item"><i class="fas fa-broadcast-tower"></i> Live</div>
    </div>

    <div class="sidebar-section">
        <div class="sidebar-item"><i class="fas fa-cog"></i> Settings</div>
        <div class="sidebar-item"><i class="fas fa-flag"></i> Report history</div>
        <div class="sidebar-item"><i class="fas fa-question-circle"></i> Help</div>
        <div class="sidebar-item"><i class="fas fa-comment-alt"></i> Send feedback</div>
    </div>
    <div class="dark-toggle" id="darkToggle">
        <span>Dark Mode</span>
        <i class="fas fa-moon"></i>
    </div>
</div>

@push('styles')
<style>
#sidebar {
    position: fixed;
    top: 56px;
    left: 0;
    width: 240px;
    height: calc(100vh - 56px);
    background-color: #fff;
    overflow-y: auto;
    transition: transform 0.3s ease;
    z-index: 999;
    padding-bottom: 12px;
}
body.dark #sidebar {
    background-color: #202020;
}
#sidebar.collapsed {
    transform: translateX(-100%);
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
}
.sidebar-title {
    padding: 8px 24px;
    font-size: 14px;
    font-weight: 500;
    color: #606060;
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
</style>
@endpush

@push('scripts')
<script>
const sidebarToggle = document.getElementById('sidebarToggle');
const sidebar = document.getElementById('sidebar');
const categories = document.getElementById('categories');
const main = document.getElementById('main');
if (!localStorage.getItem('theme')) {
    if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
        body.classList.add('dark');
        darkToggle.querySelector('i').classList.remove('fa-moon');
        darkToggle.querySelector('i').classList.add('fa-sun');
    }
}
document.querySelectorAll('.sidebar-item').forEach(item => {
    item.addEventListener('click', () => {
        localStorage.setItem('activeSidebarItem', item.textContent.trim());
    });
});

// On page load
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

// Start collapsed
let sidebarOpen = false;

function toggleSidebar() {
    sidebarOpen = !sidebarOpen;
    if (sidebarOpen) {
        sidebar.classList.remove('collapsed');
        categories?.classList.remove('sidebar-collapsed');
        main?.classList.remove('sidebar-collapsed');
    } else {
        sidebar.classList.add('collapsed');
        categories?.classList.add('sidebar-collapsed');
        main?.classList.add('sidebar-collapsed');
    }
}

const darkToggle = document.getElementById('darkToggle');
const body = document.body;

function toggleDarkMode() {
    body.classList.toggle('dark');
    const icon = darkToggle.querySelector('i');
    if (body.classList.contains('dark')) {
        icon.classList.remove('fa-moon');
        icon.classList.add('fa-sun');
    } else {
        icon.classList.remove('fa-sun');
        icon.classList.add('fa-moon');
    }
}

if (sidebarToggle) {
    sidebarToggle.addEventListener('click', toggleSidebar);
}
if (darkToggle) {
    darkToggle.addEventListener('click', toggleDarkMode);
}
const mainContent = document.getElementById('main-content');

// Highlight active item
function setActiveSidebarItem(selectedItem) {
    document.querySelectorAll('.sidebar-item').forEach(item => {
        item.classList.remove('active');
    });
    selectedItem.classList.add('active');
}

// Load view content (via Blade route or partial)
function loadView(view) {
    fetch(`/views/${view}`)
        .then(res => res.text())
        .then(html => {
            mainContent.innerHTML = html;
        })
        .catch(() => {
            mainContent.innerHTML = `<div style="padding:20px;">View "${view}" not found.</div>`;
        });
}

// Handle click events
document.querySelectorAll('.sidebar-item').forEach(item => {
    item.addEventListener('click', () => {
        const view = item.getAttribute('data-view');
        localStorage.setItem('activeView', view);
        setActiveSidebarItem(item);
        loadView(view);
    });
});

// Restore last view on page load
window.addEventListener('DOMContentLoaded', () => {
    const savedView = localStorage.getItem('activeView') || 'trending';
    const savedItem = [...document.querySelectorAll('.sidebar-item')]
        .find(item => item.getAttribute('data-view') === savedView);
    if (savedItem) {
        setActiveSidebarItem(savedItem);
        loadView(savedView);
    }
});
</script>
@endpush
