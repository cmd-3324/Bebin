{{-- Video Card Component --}}
@php
$videos = [
    [
        'title' => "Learn JavaScript in 1 Hour - Full Beginner's Tutorial",
        'channel' => "CodeMaster",
        'views' => "1.2M",
        'uploadDate' => "2 years ago",
        'duration' => "58:24",
        'thumbnail' => "https://via.placeholder.com/300x169/FF0000/FFFFFF?text=JavaScript+Tutorial",
        'channelAvatar' => "https://via.placeholder.com/36/FF0000/FFFFFF?text=CM"
    ],
    [
        'title' => "Building a YouTube Clone with HTML, CSS & JavaScript",
        'channel' => "WebDev Simplified",
        'views' => "543K",
        'uploadDate' => "6 months ago",
        'duration' => "42:15",
        'thumbnail' => "https://via.placeholder.com/300x169/008000/FFFFFF?text=YouTube+Clone",
        'channelAvatar' => "https://via.placeholder.com/36/008000/FFFFFF?text=WD"
    ],
    [
        'title' => "10 CSS Pro Tips That Will Make You a Better Developer",
        'channel' => "CSS Wizard",
        'views' => "892K",
        'uploadDate' => "1 year ago",
        'duration' => "18:32",
        'thumbnail' => "https://via.placeholder.com/300x169/0000FF/FFFFFF?text=CSS+Tips",
        'channelAvatar' => "https://via.placeholder.com/36/0000FF/FFFFFF?text=CW"
    ],
    [
        'title' => "React Hooks Explained - useState, useEffect, useContext",
        'channel' => "React Rocks",
        'views' => "756K",
        'uploadDate' => "8 months ago",
        'duration' => "36:47",
        'thumbnail' => "https://via.placeholder.com/300x169/61DAFB/000000?text=React+Hooks",
        'channelAvatar' => "https://via.placeholder.com/36/61DAFB/000000?text=RR"
    ],
    [
        'title' => "How to Build a Responsive Website from Scratch",
        'channel' => "Web Design Pro",
        'views' => "1.5M",
        'uploadDate' => "3 years ago",
        'duration' => "1:05:22",
        'thumbnail' => "https://via.placeholder.com/300x169/FFA500/FFFFFF?text=Responsive+Design",
        'channelAvatar' => "https://via.placeholder.com/36/FFA500/FFFFFF?text=WP"
    ],
    [
        'title' => "Node.js Crash Course for Beginners",
        'channel' => "Backend Boss",
        'views' => "623K",
        'uploadDate' => "1 year ago",
        'duration' => "47:18",
        'thumbnail' => "https://via.placeholder.com/300x169/8CC84B/FFFFFF?text=Node.js+Course",
        'channelAvatar' => "https://via.placeholder.com/36/8CC84B/FFFFFF?text=BB"
    ],
    [
        'title' => "Python Automation - 10 Projects You Can Build Today",
        'channel' => "Python Pro",
        'views' => "934K",
        'uploadDate' => "5 months ago",
        'duration' => "29:56",
        'thumbnail' => "https://via.placeholder.com/300x169/3776AB/FFFFFF?text=Python+Automation",
        'channelAvatar' => "https://via.placeholder.com/36/3776AB/FFFFFF?text=PP"
    ],
    [
        'title' => "UI/UX Design Principles Every Developer Should Know",
        'channel' => "Design Guru",
        'views' => "412K",
        'uploadDate' => "10 months ago",
        'duration' => "24:33",
        'thumbnail' => "https://via.placeholder.com/300x169/FF6B6B/FFFFFF?text=UI+UX+Design",
        'channelAvatar' => "https://via.placeholder.com/36/FF6B6B/FFFFFF?text=DG"
    ],
  [
        'title' => "UI/UX Design Principles Every Developer Should Know",
        'channel' => "Design Guru",
        'views' => "412K",
        'uploadDate' => "10 months ago",
        'duration' => "24:33",
        'thumbnail' => "https://via.placeholder.com/300x169/FF6B6B/FFFFFF?text=UI+UX+Design",
        'channelAvatar' => "https://via.placeholder.com/36/FF6B6B/FFFFFF?text=DG"
    ]
];
@endphp

@foreach($videos as $video)
<div class="video-card">
    <div class="thumbnail-container">
        <img src="{{ $video['thumbnail'] }}"  class="thumbnail">
        <span class="duration">{{ $video['duration'] }}</span>
    </div>
    <div class="video-info">
        <img src="{{ $video['channelAvatar'] }}" alt="{{ $video['channel'] }}" class="channel-avatar">
        <div class="video-details">
            <h3 class="video-title">{{ $video['title'] }}</h3>
            <p class="channel-name">{{ $video['channel'] }}</p>
            <p class="video-metadata">
                <span>{{ $video['views'] }} views</span>
                <span class="metadata-separator">•</span>
                <span>{{ $video['uploadDate'] }}</span>
            </p>
        </div>
    </div>
</div>
@endforeach

@push('styles')
<style>
.video-card {
    cursor: pointer;
    margin-bottom: 40px;
}

.thumbnail-container {
    position: relative;
    margin-bottom: 12px;
}

.thumbnail {
    width: 100%;
    aspect-ratio: 16/9;
    object-fit: cover;
    border-radius: 8px;
}

.duration {
    position: absolute;
    bottom: 8px;
    right: 8px;
    background-color: rgba(0, 0, 0, 0.8);
    color: white;
    padding: 2px 4px;
    border-radius: 2px;
    font-size: 12px;
    font-weight: 500;
}

.video-info {
    display: flex;
}

.channel-avatar {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    margin-right: 12px;
    object-fit: cover;
}

.video-details {
    flex: 1;
}

.video-title {
    font-size: 16px;
    font-weight: 500;
    margin-bottom: 4px;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.channel-name {
    font-size: 14px;
    color: #606060;
    margin-bottom: 2px;
}

body.dark .channel-name {
    color: #aaa;
}

.video-metadata {
    font-size: 14px;
    color: #606060;
    display: flex;
    align-items: center;
}

body.dark .video-metadata {
    color: #aaa;
}

.metadata-separator {
    margin: 0 4px;
}
</style>
@endpush
