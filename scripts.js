// scripts
document.getElementById('menu-button').addEventListener('click', function() {
    document.getElementById('mobile-menu').classList.toggle('hidden');
});

document.getElementById('nav-toggle').addEventListener('click', function() {
    document.getElementById('nav-links').classList.toggle('active');
});


// scripts.js
document.addEventListener('DOMContentLoaded', () => {
    const filterToggle = document.getElementById('filter-toggle');
    const filters = document.getElementById('filters');

    filterToggle.addEventListener('click', () => {
        filters.style.display = filters.style.display === 'block' ? 'none' : 'block';
    });
});
