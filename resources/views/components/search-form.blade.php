<div class="header-center">
    <form class="search-container" role="search" method="GET" autocomplete="on">
        <input
            type="search"
            name="q"
            class="search-input"
            placeholder="Search"
            aria-label="Search"
            {{-- value="{{ request('q') }}" --}}
        />
        <button type="submit" class="search-button" aria-label="Search">
            <i class="fas fa-search"></i>
        </button>
    </form>
    <button class="mic-button" aria-label="Voice Search" type="button">
        <i class="fas fa-microphone"></i>
    </button>
</div>

@push('styles')
   <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('css/SearchBarCss.css') }}">
@endpush