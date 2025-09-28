<div class="header-center">
    <form class="search-container" role="search"  method="GET" autocomplete="on">
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
<style>
/* Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Header center container */
.header-center {
    display: flex;
    align-items: center;
    flex: 0 1 728px;
    margin: 0 40px;
}

/* Search form container */
.search-container {
    display: flex;
    flex: 1;
    max-width: 640px;
    border-radius: 24px;
    overflow: hidden;
    box-shadow: 0 1px 2px rgb(0 0 0 / 0.1);
    background-color: #fff;
    transition: box-shadow 0.3s;
}

.search-container:focus-within {
    box-shadow: 0 0 8px #1a73e8;
}

/* Search input */
.search-input {
    flex: 1;
    height: 40px;
     border-radius: 50%;
    padding: 0 16px;
    font-size: 16px;
    /* outline: none; */
    color: #202020;
}

/* Search button */
.search-button {
    width: 64px;
    background-color: #f8f8f8;
    border: none;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background-color 0.3s;
}

.search-button:hover {
    background-color: #e0e0e0;
}

.search-button i {
    font-size: 14px;
    color: #606060;
}

/* Microphone button */
.mic-button {
    margin-left: 8px;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background-color: #f8f8f8;
    border: none;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background-color 0.3s;
}

.mic-button:hover {
    background-color: #e0e0e0;
}

.mic-button i {
    font-size: 18px;
    color: #606060;
}

/* Dark mode support */
body.dark .search-container {
    background-color: #121212;
    box-shadow: 0 1px 2px rgba(255 255 255 / 0.1);
}

body.dark .search-input {
    background-color: transparent;
    color: #eee;
}

body.dark .search-button {
    background-color: #303030;
}

body.dark .search-button:hover {
    background-color: #404040;
}

body.dark .search-button i,
body.dark .mic-button i {
    color: #ccc;
}

body.dark .mic-button {
    background-color: #181818;
}

body.dark .mic-button:hover {
    background-color: #282828;
}
</style>
@endpush
