{{-- Video Display Page --}}
{{-- Implementation of slider and nav --}}
@include('layouts.navigation')

<header>
<link rel="stylesheet" type="style/css" href="">
<title>Watch In Bebin</title>
</header>
<div class="video-page">
    {{-- Main Video Player --}}

    <div class="video-main">
     <div class="player">
   
    <iframe
        id="video-iframe"
        width="100%"
        height="480"
        src="{{ $video['video_url'] }}"
        frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
        allowfullscreen>
    </iframe>
  @if ($restrictionerror)
        <div class="alert alert-warning">
            {{ $restrictionerror }}
        </div>
    @else
    @endif
</div>
        {{-- Title and Actions container --}}
        <div class="title-actions">
            <h1 class="video-title" id="video-title">{{ $video['title'] }}</h1>
            <div class="actions">
                <button>👍 Like</button>
                <button>👎 Dislike</button>
                <button>🔗 Share</button>
                <button>💾 Save</button>
            </div>
        </div>

        <p class="video-meta" id="video-meta">
            {{ $video['views'] }} • {{ $video['time_passed'] }}
        </p>

        {{-- Uploader row with subscribe --}}
        <div class="uploader">
            <img
                src="{{ $video['uploader_img'] }}"
                class="uploader-img"
                id="uploader-img"
                alt="{{ $video['uploader_name'] }}"
            >
            <div class="uploader-details">
                <p class="uploader-name" id="uploader-name">
                    {{ $video['uploader_name'] }}
                </p>
            </div>
            <div class="subscribe-wrapper">
                <button class="subscribe-btn">Subscribe</button>
                <button class="bell-btn">🔔</button>
            </div>
        </div>

        {{-- Description with Read More --}}
        <div class="description">
            <pre class="description-text" id="video-description">
{{ $video['description'] ?? '' }}
            </pre>
            <button class="read-more-btn" aria-expanded="false">Read more</button>
        </div>
    </div>

    {{-- Related Videos --}}
    <div class="related" id="related-videos">
        @foreach($relatedVideos as $rv)
        <div class="video-card" data-video='@json($rv)'>
            <div class="thumbnail">
                <img src="{{ $rv['thumbnail'] }}" alt="{{ $rv['title'] }}">
                <span class="time">{{ $rv['duration'] }}</span>
            </div>
            <div class="video-info">
                <img class="channel" src="{{ $rv['uploader_img'] }}" alt="{{ $rv['uploader_name'] }}">
                <div class="details">
                    <h3 class="title">{{ $rv['title'] }}</h3>
                    <p class="channel-name">{{ $rv['uploader_name'] }}</p>
                    <p class="meta">{{ $rv['views'] }} • {{ $rv['time_passed'] }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<style>
.video-page {
    display: flex;
    gap: 20px;
    margin-top: 20px;
    flex-wrap: wrap;
}
.video-main {
    flex: 2;
    min-width: 320px;
}
.related {
    flex: 1;
    display: flex;
    flex-direction: column;
    gap: 12px;
    min-width: 280px;
}

/* Video Player */
.player iframe {
    border-radius: 8px;
    width: 100%;
}

/* Title and actions container */
.title-actions {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin: 12px 0 4px;
    gap: 16px;
}
.video-title {
    font-size: 20px;
    margin: 0;
    flex: 1;
    word-break: break-word;
}
body.dark .video-title {
    color: #f1f1f1;
}
.video-meta {
    font-size: 14px;
    color: #606060;
    margin-bottom: 12px;
}
body.dark .video-meta {
    color: #aaa;
}

/* Uploader row */
.uploader {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 12px;
}
.uploader-img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
}
/* Moved channel name/details slightly to the right */
.uploader-details {
    margin-left: 10px;
}
.uploader-name {
    font-weight: bold;
    font-size: 14px;
}
body.dark .uploader-name {
    color: #f1f1f1;
}
.subscribe-wrapper {
    margin-left: auto;
    display: flex;
    gap: 8px;
}
.subscribe-btn {
    background: #cc0000;
    color: #fff;
    border: none;
    padding: 8px 16px;
    border-radius: 20px;
    font-weight: 600;
    cursor: pointer;
    font-size: 14px;
}
.subscribe-btn:hover {
    background: #e60000;
}
.bell-btn {
    background: #f1f1f1;
    border: none;
    padding: 8px 12px;
    border-radius: 50%;
    font-size: 16px;
    cursor: pointer;
}
body.dark .bell-btn {
    background: #303030;
    color: #fff;
}

/* Description */
.description {
    position: relative;
    margin-bottom: 20px;
    max-width: 100%;
}
.description-text {
    font-size: 14px;
    line-height: 1.5;
    color: #333;
    max-height: 4.5em;
    overflow: hidden;
    white-space: pre-wrap;
    text-overflow: ellipsis;
    transition: max-height 0.3s ease;
    user-select: text;
}
body.dark .description-text {
    color: #f1f1f1;
}
.description.expanded .description-text {
    max-height: 1000px;
}
.read-more-btn {
    background: none;
    border: none;
    color: #065fd4;
    cursor: pointer;
    padding: 0;
    font-weight: 600;
    margin-top: 10px;
}
.read-more-btn:hover {
    text-decoration: underline;
}

/* Actions */
.actions {
    display: flex;
    gap: 8px;
}
.actions button {
    border: none;
    background: #f1f1f1;
    padding: 6px 12px;
    border-radius: 20px;
    cursor: pointer;
    white-space: nowrap;
    font-size: 14px;
}
body.dark .actions button {
    background: #303030;
    color: #fff;
}

/* Related cards */
.video-card {
    flex: 1 1 280px;
    max-width: 350px;
    background: #fff;
    border-radius: 8px;
    overflow: hidden;
    cursor: pointer;
    transition: transform 0.2s;
    text-decoration: none;
    color: inherit;
    display: flex;
    flex-direction: column;
}
body.dark .video-card {
    background: #181818;
}
.video-card:hover {
    transform: translateY(-3px);
}
.thumbnail {
    position: relative;
    width: 100%;
    aspect-ratio: 16/9;
    overflow: hidden;
}
.thumbnail img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.thumbnail .time {
    position: absolute;
    bottom: 6px;
    right: 6px;
    background: rgba(0,0,0,0.8);
    color: #fff;
    font-size: 12px;
    padding: 2px 4px;
    border-radius: 4px;
}
.video-info {
    display: flex;
    padding: 10px;
}
.video-info .channel {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    margin-right: 30px;
}
.video-info .title {
    font-size: 14px;
    font-weight: 500;
    margin: 0 0 4px 0;
    line-height: 1.3;
}
body.dark .video-info .title {
    color: #f1f1f1;
}
.video-info .channel-name {
    font-size: 13px;
    margin-left:50px;
    color: #606060;
}
body.dark .video-info .channel-name {
    color: #aaa;
}
.video-info .meta {
    font-size: 12px;
    color: #909090;
}
body.dark .video-info .meta {
    color: #888;
}
</style>
{{-- <a href="{{ route('home') }}">homr</a> --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    // DARK MODE SETUP
    const darkToggle = document.getElementById('darkToggle');
    const body = document.body;

    // Apply saved theme or system preference
    if (localStorage.getItem('theme') === 'dark') {
        body.classList.add('dark');
        if (darkToggle) {
            darkToggle.querySelector('i').classList.remove('fa-moon');
            darkToggle.querySelector('i').classList.add('fa-sun');
        }
    } else if (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches) {
        body.classList.add('dark');
        if (darkToggle) {
            darkToggle.querySelector('i').classList.remove('fa-moon');
            darkToggle.querySelector('i').classList.add('fa-sun');
        }
    }

    // Dark mode toggle functionality
    function toggleDarkMode() {
        body.classList.toggle('dark');
        const icon = darkToggle.querySelector('i');
        if (body.classList.contains('dark')) {
            icon.classList.remove('fa-moon');
            icon.classList.add('fa-sun');
            localStorage.setItem('theme', 'dark');
        } else {
            icon.classList.remove('fa-sun');
            icon.classList.add('fa-moon');
            localStorage.setItem('theme', 'light');
        }
    }

    if (darkToggle) {
        darkToggle.addEventListener('click', toggleDarkMode);
    }

    // Read more toggle (existing)
    const descriptionBox = document.querySelector('.description');
    const readMoreBtn = descriptionBox.querySelector('.read-more-btn');
    readMoreBtn.addEventListener('click', function () {
        const expanded = descriptionBox.classList.toggle('expanded');
        readMoreBtn.setAttribute('aria-expanded', expanded);
        readMoreBtn.textContent = expanded ? 'Show less' : 'Read more';
    });

    // VIDEO CARD CLICK LOGIC
    const videoCards = document.querySelectorAll('.video-card');

    function loadVideo(video) {
        // Update browser URL without page reload
        const newUrl = `/video-watching/${video.id}`;
        window.history.pushState({}, '', newUrl);

        // Update video content
        const iframe = document.getElementById('video-iframe');
        const titleEl = document.getElementById('video-title');
        const metaEl = document.getElementById('video-meta');
        const uploaderImg = document.getElementById('uploader-img');
        const uploaderName = document.getElementById('uploader-name');
        const descriptionEl = document.getElementById('video-description');

        iframe.src = video.video_url || video.thumbnail || '';
        titleEl.textContent = video.title || '';
        metaEl.textContent = `${video.views || ''} • ${video.time_passed || ''}`;
        uploaderImg.src = video.uploader_img || '';
        uploaderImg.alt = video.uploader_name || '';
        uploaderName.textContent = video.uploader_name || '';
        descriptionEl.textContent = video.description || '';

        // Reset description state
        descriptionBox.classList.remove('expanded');
        readMoreBtn.textContent = 'Read more';
        readMoreBtn.setAttribute('aria-expanded', false);

        // Hide the clicked video from related videos
        videoCards.forEach(card => {
            const cardVideo = JSON.parse(card.dataset.video);
            if(cardVideo.id === video.id){
                card.style.display = 'none';
            } else {
                card.style.display = 'flex';
            }
        });
    }

    // Handle clicks on related videos
    videoCards.forEach(card => {
        card.addEventListener('click', function (e) {
            e.preventDefault(); // Prevent default link behavior
            const videoData = JSON.parse(this.dataset.video);
            loadVideo(videoData);
        });
    });

    // Handle browser back/forward buttons
    window.addEventListener('popstate', function() {
        // You might want to reload the page or fetch new data
        window.location.reload();
    });
});
</script>