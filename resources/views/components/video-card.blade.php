{{-- Video Card Component --}}
@php
   $videos = [

    [
        'id' => 2,
        'thumbnail' => 'https://i.ytimg.com/vi/3JZ_D3ELwOQ/hqdefault.jpg',
        'title' => 'Mark Ronson - Uptown Funk ft. Bruno Mars',
        'uploader_img' => 'https://yt3.ggpht.com/ytc/AAUvwnjzywWxTAzWzw3v69i6l4Z4cYn_d2mZ1RXYQw=s88-c-k-c0x00ffffff-no-rj',
        'uploader_name' => 'Mark Ronson',
        'views' => '4.7B views',
        'duration' => '4:31',
        'time_passed' => '8 years ago',
    ],
 
];
@endphp
{{-- Video Card List --}}
@foreach($videos as $video)
<a href="{{ route('videos.show', ['id' => $video['id']]) }}" class="video-card">
    <div class="thumbnail">
        <img src="{{ $video['thumbnail'] }}" alt="{{ $video['title'] }}">
        <span class="time">{{ $video['duration'] }}</span>
    </div>
    <div class="video-info">
        <img class="channel" src="{{ $video['uploader_img'] }}" alt="{{ $video['uploader_name'] }}">
        <div class="details">
            <h3 class="title">{{ $video['title'] }}</h3>
            <p class="channel-name">{{ $video['uploader_name'] }}</p>
            <p class="meta">{{ $video['views'] }} • {{ $video['time_passed'] }}</p>
        </div>
    </div>
</a>
@endforeach

<style>
.video-card {
    flex: 1 1 300px;
    max-width: 350px;
    background: #fff;
    border-radius: 8px;
    overflow: hidden;
    cursor: pointer;
    transition: transform 0.2s;
    text-decoration: none;
    color: inherit;
}
body.dark .video-card { background: #181818; }
.video-card:hover { transform: translateY(-3px); }

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

.video-info { display: flex; padding: 10px; }
.video-info .channel {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    margin-right: 10px;
}
.video-info .title {
    font-size: 14px;
    font-weight: 500;
    margin: 0 0 4px 0;
    line-height: 1.3;
}
.video-info .channel-name {
    font-size: 13px;
    color: #606060;
}
.video-info .meta {
    font-size: 12px;
    color: #909090;
}
</style>
