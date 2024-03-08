document.addEventListener('DOMContentLoaded', function() {
    const nav = document.querySelector('nav');
    const toggleBtn = document.querySelector('.toggle-btn');

    toggleBtn.addEventListener('click', function() {
        nav.classList.toggle('show');
    });
});