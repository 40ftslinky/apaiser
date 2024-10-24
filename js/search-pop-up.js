// search-pop-up.js

document.addEventListener('DOMContentLoaded', function() {
    var search_popUp = document.querySelector('.search-pop-up');
    var close = document.querySelector('.search-close');
    // var overlay = document.querySelector('.search-overlay');
    var searchButton = document.querySelector('.search');
    var mobileSearchButton = document.querySelector('.mobile-secondary-menu .search');
    var body = document.body;

    searchButton.addEventListener('click', function() {
        search_popUp.classList.toggle('is-visible');
        body.classList.toggle('no_scroll');
    });
    mobileSearchButton.addEventListener('click', function() {
        search_popUp.classList.toggle('is-visible');
        body.classList.toggle('no_scroll');
    });

    close.addEventListener('click', function() {
        search_popUp.classList.remove('is-visible');
        body.classList.remove('no_scroll');
    });

    search_popUp.addEventListener('click', function(event) {
        if (event.target === search_popUp || event.target === close) {
            search_popUp.classList.remove('is-visible');
            body.classList.remove('no_scroll');
        }
    });
});