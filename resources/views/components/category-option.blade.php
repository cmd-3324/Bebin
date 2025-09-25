{{-- Category Options Component --}}
<div id="categories">
    <div class="category active">All</div>
    <div class="category">Music</div>
    <div class="category">Gaming</div>
    <div class="category">Live</div>
    <div class="category">Mixes</div>
    <div class="category">Comedy</div>
    <div class="category">Recently uploaded</div>
    <div class="category">Watched</div>
    <div class="category">New to you</div>
    <div class="category">Coding</div>
    <div class="category">Tutorials</div>
    <div class="category">Podcasts</div>
</div>

@push('styles')
<style>
#categories {
    display: flex;
    padding: 12px 24px;
    overflow-x: auto;
    background-color: #fff;
    position: fixed;
    top: 56px;
    left: 240px;
    right: 0;
    z-index: 998;
    transition: left 0.3s;
    border-bottom: 1px solid #e5e5e5;
}

body.dark #categories {
    background-color: #202020;
    border-bottom-color: #303030;
}

#categories.sidebar-collapsed {
    left: 0;
}

.category {
    padding: 6px 12px;
    margin-right: 12px;
    background-color: #f2f2f2;
    border-radius: 16px;
    white-space: nowrap;
    cursor: pointer;
    font-size: 14px;
    transition: background-color 0.2s;
}

body.dark .category {
    background-color: #373737;
    color: #f1f1f1;
}

.category:hover {
    background-color: #e5e5e5;
}

body.dark .category:hover {
    background-color: #4d4d4d;
}

.category.active {
    background-color: #0f0f0f;
    color: #fff;
}

body.dark .category.active {
    background-color: #f1f1f1;
    color: #0f0f0f;
}
</style>
@endpush

@push('scripts')
<script>
// Category selection functionality
function setupCategories() {
    const categoryElements = document.querySelectorAll('.category');

    categoryElements.forEach(category => {
        category.addEventListener('click', function() {
            // Remove active class from all categories
            categoryElements.forEach(c => c.classList.remove('active'));

            // Add active class to clicked category
            this.classList.add('active');

            // In a real app, you would filter videos based on the selected category
            console.log('Category selected:', this.textContent);
        });
    });
}

// Initialize categories when component loads
document.addEventListener('DOMContentLoaded', function() {
    setupCategories();
});
</script>
@endpush
