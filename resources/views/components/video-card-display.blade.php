@extends('layouts.app')

@section('title', 'Event Archive')

@section('content')
<div class="event-archive">
    <header class="event-archive__header">
        <h2>Upcoming & Past Events</h2>
        <div class="event-archive__filters">
            <button id="btn-all" type="button">All</button>
            <button id="btn-upcoming" type="button">Upcoming</button>
            <button id="btn-past" type="button">Past</button>
        </div>
    </header>

    <div class="event-archive__grid">
        <!-- Sample event cards (static demo data) -->
        <div class="event-archive__card">
            <div class="event-archive__image-wrapper">
                <img src="https://via.placeholder.com/600x300?text=Spring+Festival" alt="Spring Festival 2025">
            </div>
            <div class="event-archive__info">
                <time class="event-archive__date" datetime="2025-04-21">April 21, 2025</time>
                <h3 class="event-archive__title">Spring Festival 2025</h3>
                <p class="event-archive__excerpt">Join us for music, food, and fun on this bright spring day.</p>
            </div>
        </div>

        <div class="event-archive__card">
            <div class="event-archive__image-wrapper">
                <img src="https://via.placeholder.com/600x300?text=Coding+Bootcamp" alt="Summer Coding Bootcamp">
            </div>
            <div class="event-archive__info">
                <time class="event-archive__date" datetime="2025-06-10">June 10, 2025</time>
                <h3 class="event-archive__title">Summer Workshop: Coding Bootcamp</h3>
                <p class="event-archive__excerpt">A 3-day hands-on workshop teaching web development fundamentals.</p>
            </div>
        </div>

        <div class="event-archive__card">
            <div class="event-archive__image-wrapper">
                <img src="https://via.placeholder.com/600x300?text=Autumn+Art+Fair" alt="Autumn Art Fair">
            </div>
            <div class="event-archive__info">
                <time class="event-archive__date" datetime="2025-09-15">September 15, 2025</time>
                <h3 class="event-archive__title">Autumn Art Fair</h3>
                <p class="event-archive__excerpt">Local artists showcase their works at the annual fair.</p>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
/* Event Archive Styles */
.event-archive {
    padding: 2rem 1rem;
    max-width: 1200px;
    margin: 0 auto;
    font-family: Arial, sans-serif;
}

.event-archive__header {
    text-align: center;
    margin-bottom: 2rem;
}
.event-archive__header h2 {
    font-size: 2rem;
    margin: 0 0 1rem 0;
}
.event-archive__filters button {
    margin: 0 0.5rem;
    padding: 0.5rem 1rem;
    border: none;
    background: #f0f0f0;
    cursor: pointer;
    border-radius: 4px;
}
.event-archive__filters button:hover {
    background: #ddd;
}

.event-archive__grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    grid-gap: 1.5rem;
}

.event-archive__card {
    border: 1px solid #ddd;
    border-radius: 8px;
    overflow: hidden;
    transition: box-shadow 0.2s ease;
    background: white;
}
.event-archive__card:hover {
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

.event-archive__image-wrapper {
    width: 100%;
    height: 160px;
    overflow: hidden;
}
.event-archive__image-wrapper img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.event-archive__info {
    padding: 1rem;
}
.event-archive__date {
    font-size: 0.9rem;
    color: #666;
}
.event-archive__title {
    margin: 0.5rem 0;
    font-size: 1.25rem;
}
.event-archive__excerpt {
    color: #444;
    font-size: 1rem;
    line-height: 1.4;
    margin: 0;
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    const cards = Array.from(document.querySelectorAll('.event-archive__card'));

    function filterEvents(type) {
        const now = new Date();
        cards.forEach(card => {
            const timeElem = card.querySelector('.event-archive__date');
            const dateStr = timeElem.getAttribute('datetime'); // ISO string
            const eventDate = new Date(dateStr);

            if (type === 'upcoming') {
                card.style.display = eventDate >= now ? '' : 'none';
            } else if (type === 'past') {
                card.style.display = eventDate < now ? '' : 'none';
            } else {
                card.style.display = '';
            }
        });
    }

    document.getElementById('btn-upcoming').addEventListener('click', () => filterEvents('upcoming'));
    document.getElementById('btn-past').addEventListener('click', () => filterEvents('past'));
    document.getElementById('btn-all').addEventListener('click', () => filterEvents('all'));
});
</script>
@endpush
