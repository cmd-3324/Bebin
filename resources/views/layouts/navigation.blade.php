<!-- Header -->
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
@section('title', "")
<div id="header">
    <div class="header-left">
        <div id="sidebarToggle" class="header-icon"><i class="fas fa-bars"></i></div>
        <div class="logo"><i class="fab fa-youtube"></i> Bebin</div>
    </div>
    <x-search-form/>

    <div class="header-right">
        <div class="upload-button">
            <span class="plus">+</span>
            <span>Upload</span>
            <div class="header-icon">
                <i class="fas fa-video"></i>
            </div>
        </div>
        @auth
            @if (Auth::user()->UserName)
            <div class="header-icon"><i class="fas fa-bell"></i></div>
            <div class="user-avatar">{{ substr(Auth::user()->UserName, 0, 1) }}</div>
            @else
            <div class="header-icon"><i class="fas fa-bell"></i></div>
            <div class="guest-avatar">
                <i class="fas fa-user-circle"></i>
            </div>
            @endif
        @else
       <div class="header-icon"><i class="fas fa-bell"></i></div>
<div class="guest-avatar">
  <i class="fas fa-user-circle"></i>
  <span class="guest-text">Guest</span>
</div>

        @endauth
    </div>
</div>

<!-- Sidebar Component -->
<x-main-sliderbar />

<style>
/* Reset & body */
* { margin: 0; padding: 0; box-sizing: border-box; }
body { font-family: 'Roboto', Arial, sans-serif; background-color: #f9f9f9; color: #0f0f0f; transition: background-color 0.3s, color 0.3s; }
body.dark { background-color: #0f0f0f; color: #f1f1f1; }

/* Header */
#header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 16px;
    height: 56px;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    background-color: #fff;
    border-bottom: 1px solid #e5e5e5;
    z-index: 1000;
}
body.dark #header {
    background-color: #202020;
    border-bottom: 1px solid #303030;
}
.header-left, .header-center, .header-right {
    display: flex;
    align-items: center;
}
.header-center {
    flex: 0 1 728px;
    margin: 0 40px;
}
#sidebarToggle {
    padding: 8px;
    margin-right: 16px;
    cursor: pointer;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}
#sidebarToggle:hover {
    background-color: rgba(0,0,0,0.05);
}
body.dark #sidebarToggle:hover {
    background-color: rgba(255,255,255,0.1);
}
.logo {
    display: flex;
    align-items: center;
    font-size: 20px;
    font-weight: bold;
    color: #0f0f0f;
}
body.dark .logo {
    color: #f1f1f1;
}
.logo i {
    color: #ff0000;
    margin-right: 4px;
}
.search-container {
    display: flex;
    flex: 1;
    max-width: 640px;
}
.search-input {
    flex: 1;
    height: 40px;
    padding: 0 12px;
    border: 1px solid #ccc;
    border-radius: 2px 0 0 2px;
    font-size: 16px;
    background-color: #fff;
}
body.dark .search-input {
    background-color: #121212;
    border-color: #303030;
    color: #f1f1f1;
}
.search-button {
    height: 40px;
    width: 64px;
    border: 1px solid #d3d3d3;
    border-left: none;
    border-radius: 0 2px 2px 0;
    background-color: #f8f8f8;
    cursor: pointer;
}
body.dark .search-button {
    background-color: #303030;
    border-color: #303030;
}
.search-button:hover {
    background-color: #f0f0f0;
}
body.dark .search-button:hover {
    background-color: #404040;
}
.mic-button {
    margin-left: 8px;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background-color: #f8f8f8;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
}
body.dark .mic-button {
    background-color: #181818;
}
.upload-button {
    display: inline-flex;
    align-items: center;
    font-weight: 500;
    font-size: 14px;
    color: #0f0f0f;
    cursor: pointer;
    user-select: none;
    gap: 6px;
}
body.dark .upload-button {
    color: #f1f1f1;
}
.upload-button .plus {
    font-weight: bold;
    font-size: 18px;
    color: #ff0000;
}
.header-icon {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-left: 8px;
    cursor: pointer;
}
.header-icon:hover {
    background-color: rgba(0,0,0,0.05);
}
body.dark .header-icon:hover {
    background-color: rgba(255,255,255,0.1);
}
.user-avatar {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background-color: #ff0000;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    margin-left: 8px;
    font-size: 14px;
}

/* Guest Avatar Styles */
.guest-avatar {
    display: inline-flex;        /* inline-flex so it fits nicely in header */
    align-items: center;
    gap: 6px;                    /* space between icon and text */
    padding: 0 8px;              /* add some horizontal padding */
    height: 32px;
    border-radius: 16px;         /* rounded pill shape */
    background-color: transparent;
    color: #606060;
    cursor: pointer;
    font-size: 20px;             /* smaller icon to fit text */
    transition: color 0.2s ease;
    user-select: none;
}

.guest-avatar i {
    font-size: 24px;             /* keep icon slightly bigger */
}

.guest-avatar:hover {
    color: #ff0000;
}

body.dark .guest-avatar {
    color: #aaa;
}

body.dark .guest-avatar:hover {
    color: #ff4444;
}

/* Sidebar */
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
    font-size: 14px;
    color: #0f0f0f;
    text-decoration: none;
}
body.dark .sidebar-item {
    color: #f1f1f1;
}
.sidebar-item:hover {
    background-color: rgba(0,0,0,0.05);
}
body.dark .sidebar-item:hover {
    background-color: rgba(255,255,255,0.1);
}
.sidebar-item.active {
    background-color: rgba(0,0,0,0.1);
    font-weight: 500;
}
body.dark .sidebar-item.active {
    background-color: rgba(255,255,255,0.2);
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

/* Main content */
#main {
    margin-top: 56px;
    margin-left: 240px;
    padding: 24px;
    transition: margin-left 0.3s;
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 16px;
}
#main.sidebar-collapsed {
    margin-left: 0;
}
.video-card {
    background-color: #e5e5e5;
    height: 180px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    border-radius: 4px;
}
body.dark .video-card {
    background-color: #303030;
    color: #f1f1f1;
}

/* Responsive */
@media (max-width: 1200px) {
    #main {
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    }
}
@media (max-width: 768px) {
    #main {
        margin-left: 200px;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    }
    .header-center {
        margin: 0 20px;
    }
}
@media (max-width: 576px) {
    #main {
        margin-left: 0;
        grid-template-columns: 1fr;
        padding: 16px;
    }
    .header-center {
        margin: 0 10px;
    }
    .search-container {
        display: none;
    }
}
</style>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const sidebarToggle = document.getElementById('sidebarToggle');
    const sidebar = document.getElementById('sidebar');
    const main = document.getElementById('main');

    let sidebarOpen = false;

    // Only handle sidebar toggle - dark mode is handled in sidebar component
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
});
</script>
