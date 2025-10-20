{{-- Main Sidebar Component --}}

@php
$isDisplayPage = '';
@endphp
<div id="sidebar" class="mini-sidebar overflow-y-auto h-screen" data-default-open="{{ $isDisplayPage ? 'false' : 'true' }}">
    <div class="sidebar-section">
        {{-- Home with route --}}
        <a class="sidebar-item " title="Home">
            <i class="fas fa-home"></i>
            <span class="sidebar-text"><a href="{{url("/")}}">Home</a></span>
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
            <span class="sidebar-text"><a href="{{route("gettoChannelPage")}}">You ></a></span>
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
@push('styles')
   <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('css/MainSliderCss.css') }}">
@endpush
 

@push('scripts')
<script src="{{ asset('js/mainsidebar.js') }}"></script>
@endpush