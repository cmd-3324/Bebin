@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('css/ChannelPageCss.css') }}">
@endpush

<div class="channel-root">

    <!-- Banner -->
    <div class="channel-banner">
        <img src="{{ $banner ?? 'https://via.placeholder.com/1200x300' }}"
             alt="Channel Banner"
             class="w-full h-64 object-cover">
    </div>

    <!-- Channel Header -->
    <div class="channel-header flex items-center gap-4 p-4">
        <div class="channel-avatar w-24 h-24 rounded-full overflow-hidden">
            <img src="{{ $avatar ?? 'https://via.placeholder.com/150' }}"
                 alt="{{ $name ?? 'Channel Avatar' }}"
                 class="w-full h-full object-cover">
        </div>

        <div class="channel-info">
            <h2 class="channel-name text-2xl font-bold">{{ $name ?? 'Channel Name' }}</h2>
            <p class="channel-meta text-gray-500">
                {{ $subscribers ?? 0 }} subscribers • {{ $videosCount ?? 0 }} videos
            </p>
        </div>

        <div class="ml-auto">
            @auth
                @if(Auth::id() === ($channelOwnerId ?? null))
                    <!-- Owner view -->
                    <button class="manage-btn bg-gray-200 px-4 py-2 rounded hover:bg-gray-300">
                        Manage Channel
                    </button>
                    <button class="customize-btn bg-gray-100 px-4 py-2 rounded hover:bg-gray-200">
                        Customize Layout
                    </button>
                @else
                    <!-- Viewer view -->
                    <button class="subscribe-btn bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
                        Subscribe
                    </button>
                @endif
            @else
                <a href="{{ route('login') }}"
                   class="subscribe-btn bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
                   Sign in to Subscribe
                </a>
            @endauth
        </div>
    </div>

    <!-- Tabs -->
    <div class="channel-tabs border-b">
        <ul class="flex gap-6 px-4 text-gray-700 font-medium">
            <li><a href="#" class="tab-link py-3 inline-block hover:text-black">Home</a></li>
            <li><a href="#" class="tab-link py-3 inline-block hover:text-black">Videos</a></li>
            <li><a href="#" class="tab-link py-3 inline-block hover:text-black">Playlists</a></li>
            <li><a href="#" class="tab-link py-3 inline-block hover:text-black">Posts</a></li>
            <li><a href="#" class="tab-link py-3 inline-block hover:text-black">About</a></li>
            <li><a href="#" class="tab-link py-3 inline-block hover:text-black">More</a></li>
        </ul>
    </div>

    <!-- Slot for page-specific content -->
    <div class="channel-content p-4">
        {{ $slot }}
    </div>

</div>
