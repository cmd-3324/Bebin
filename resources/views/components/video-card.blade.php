
<link rel="stylesheet" href="{{ asset('css/VideoCard.css') }}">

@php
$videos = [
    [
        'id' => 2,
        'thumbnail' => 'https://i.ytimg.com/vi/3JZ_D3ELwOQ/hqdefault.jpg',
        'title' => 'Mark Ronson - Uptown Funk ft. Bruno Mars',
        'uploader_img' => 'https://th.bing.com/th/id/R.9672077568e5fd194b1cda6d5734d90e?rik=EMNJxFFHEcB2tw&pid=ImgRaw&r=0',
        'uploader_name' => 'Mark Ronson',
        'views' => '4.7B views',
        'duration' => '4:31',
        'time_passed' => '2 days ago',
    ],
  [
        'id' => 2,
        'thumbnail' => 'https://i.ytimg.com/vi/3JZ_D3ELwOQ/hqdefault.jpg',
        'title' => 'Mark Ronson - Uptown Funk ft. Bruno Mars',
        'uploader_img' => 'https://th.bing.com/th/id/R.9672077568e5fd194b1cda6d5734d90e?rik=EMNJxFFHEcB2tw&pid=ImgRaw&r=0',
        'uploader_name' => 'Mark Ronson',
        'views' => '4.7B views',
        'duration' => '4:31',
        'time_passed' => '8 years ago',
    ],
    [
        'id' => 2,
        'thumbnail' => 'https://i.ytimg.com/vi/3JZ_D3ELwOQ/hqdefault.jpg',
        'title' => 'Mark Ronson - Uptown Funk ft. Bruno Mars',
        'uploader_img' => 'https://th.bing.com/th/id/R.9672077568e5fd194b1cda6d5734d90e?rik=EMNJxFFHEcB2tw&pid=ImgRaw&r=0',
        'uploader_name' => 'Mark Ronson',
        'views' => '4.7B views',
        'duration' => '4:31',
        'time_passed' => '8 years ago',
    ],
    [
        'id' => 2,
        'thumbnail' => 'https://i.ytimg.com/vi/3JZ_D3ELwOQ/hqdefault.jpg',
        'title' => 'Mark Ronson - Uptown Funk ft. Bruno Mars',
        'uploader_img' => 'https://th.bing.com/th/id/R.9672077568e5fd194b1cda6d5734d90e?rik=EMNJxFFHEcB2tw&pid=ImgRaw&r=0',
        'uploader_name' => 'Mark Ronson',
        'views' => '4.7B views',
        'duration' => '4:31',
        'time_passed' => '8 years ago',
    ],
    [
        'id' => 2,
        'thumbnail' => 'https://i.ytimg.com/vi/3JZ_D3ELwOQ/hqdefault.jpg',
        'title' => 'Mark Ronson - Uptown Funk ft. Bruno Mars',
        'uploader_img' => 'https://th.bing.com/th/id/R.9672077568e5fd194b1cda6d5734d90e?rik=EMNJxFFHEcB2tw&pid=ImgRaw&r=0',
        'uploader_name' => 'Mark Ronson',
        'views' => '4.7B views',
        'duration' => '4:31',
        'time_passed' => '8 years ago',
    ],
    [
        'id' => 2,
        'thumbnail' => 'https://i.ytimg.com/vi/3JZ_D3ELwOQ/hqdefault.jpg',
        'title' => 'Mark Ronson - Uptown Funk ft. Bruno Mars',
        'uploader_img' => 'https://th.bing.com/th/id/R.9672077568e5fd194b1cda6d5734d90e?rik=EMNJxFFHEcB2tw&pid=ImgRaw&r=0',
        'uploader_name' => 'Mark Ronson',
        'views' => '4.7B views',
        'duration' => '4:31',
        'time_passed' => '8 years ago',
    ],
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
@foreach($videos as $video) 
<a href="{{ route('videos.show', ['id' => $video['id']]) }}" class="video-card">

    <div class="thumbnail">
        <img src="{{ $video['thumbnail'] }}" alt="{{ $video['title'] }}">
        <span class="duration">{{ $video['duration'] }}</span>
    </div>

    <div class="video-details">
        <div class="channel-avatar">
            <img src="{{ $video['uploader_img'] }}" alt="{{ $video['uploader_name'] }}">
        </div>
        <div class="info">
             
            <h3 class="title" title="{{ $video['title'] }}">{{ $video['title'] }}</h3>
            <p class="channel-name">{{ $video['uploader_name'] }}</p>
            <p class="meta">{{ $video['views'] }} • {{ $video['time_passed'] }}</p>
   @if(str_contains($video['time_passed'], 'd') && (int)filter_var($video['time_passed'], FILTER_SANITIZE_NUMBER_INT) < 3)

    <span class="new-badge">NEW</span>
    @else
    <span class="new-badge">Old</span></span>
@endif
        </div>


        <!-- 3 dots menu added here -->
        <div class="menu-container">
    <input type="checkbox" id="menu-toggle-{{ $video['id'] }}-{{ $loop->index }}" class="menu-toggle" />
    <label for="menu-toggle-{{ $video['id'] }}-{{ $loop->index }}" class="menu-btn" aria-label="Toggle menu">
        &#8942;
    </label>

    <div class="menu">
        <button class="menu-item">Option 1</button>
        <button class="menu-item">Option 2</button>
        <button class="menu-item">Option 3</button>
        <button class="menu-item">Option 4</button>
        <button class="menu-item">Option 5</button>
    </div>
</div>

    </div>
</a>
@endforeach

