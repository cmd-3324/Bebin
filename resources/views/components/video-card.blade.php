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
    [
        'id' => 3,
        'thumbnail' => 'https://i.ytimg.com/vi/L_jWHffIx5E/hqdefault.jpg',
        'title' => 'Smells Like Teen Spirit (Official Video)',
        'uploader_img' => 'https://yt3.ggpht.com/ytc/AAUvwnh4GL-Myfl_K6m2ZvlCwbvckOc5Qxvl3kCd=s88-c-k-c0x00ffffff-no-rj',
        'uploader_name' => 'Nirvana',
        'views' => '1.1B views',
        'duration' => '5:02',
        'time_passed' => '12 years ago',
    ],
    [
        'id' => 4,
        'thumbnail' => 'https://i.ytimg.com/vi/kJQP7kiw5Fk/hqdefault.jpg',
        'title' => 'Luis Fonsi - Despacito ft. Daddy Yankee',
        'uploader_img' => 'https://yt3.ggpht.com/ytc/AAUvwni0vXvx8IHPqG_mB2m_xxJvcujcVJOQqI-w=s88-c-k-c0x00ffffff-no-rj',
        'uploader_name' => 'Luis Fonsi',
        'views' => '8.9B views',
        'duration' => '4:42',
        'time_passed' => '5 years ago',
    ],
    [
        'id' => 5,
        'thumbnail' => 'https://i.ytimg.com/vi/ktvTqknDobU/hqdefault.jpg',
        'title' => 'Imagine Dragons - Radioactive',
        'uploader_img' => 'https://yt3.ggpht.com/ytc/AAUvwniJOZ7xE1-VyMkqkQ3C1QJ7MY5-Dd3HrUGw=s88-c-k-c0x00ffffff-no-rj',
        'uploader_name' => 'Imagine Dragons',
        'views' => '1.5B views',
        'duration' => '3:06',
        'time_passed' => '10 years ago',
    ],
  [
        'id' => 5,
        'thumbnail' => 'https://i.ytimg.com/vi/ktvTqknDobU/hqdefault.jpg',
        'title' => 'Imagine Dragons - Radioactive',
        'uploader_img' => 'https://yt3.ggpht.com/ytc/AAUvwniJOZ7xE1-VyMkqkQ3C1QJ7MY5-Dd3HrUGw=s88-c-k-c0x00ffffff-no-rj',
        'uploader_name' => 'Imagine Dragons',
        'views' => '1.5B views',
        'duration' => '3:06',
        'time_passed' => '10 years ago',
    ],
  [
        'id' => 5,
        'thumbnail' => 'https://i.ytimg.com/vi/ktvTqknDobU/hqdefault.jpg',
        'title' => 'Imagine Dragons - Radioactive',
        'uploader_img' => 'https://yt3.ggpht.com/ytc/AAUvwniJOZ7xE1-VyMkqkQ3C1QJ7MY5-Dd3HrUGw=s88-c-k-c0x00ffffff-no-rj',
        'uploader_name' => 'Imagine Dragons',
        'views' => '1.5B views',
        'duration' => '3:06',
        'time_passed' => '10 years ago',
    ],
    [
        'id' => 6,
        'thumbnail' => 'https://i.ytimg.com/vi/fRh_vgS2dFE/hqdefault.jpg',
        'title' => 'Justin Bieber - Sorry (PURPOSE : The Movement)',
        'uploader_img' => 'https://yt3.ggpht.com/ytc/AAUvwnjqyV6El34gRxPAw2Ny3-EspMwcfNmknJxfq=s88-c-k-c0x00ffffff-no-rj',
        'uploader_name' => 'Justin Bieber',
        'views' => '3.2B views',
        'duration' => '3:20',
        'time_passed' => '7 years ago',
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
