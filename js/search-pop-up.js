// search-pop-up.js

document.addEventListener('DOMContentLoaded', function() {
    var search_popUp = document.querySelector('.search-pop-up');
    var close = document.querySelector('.search-close');
    // var overlay = document.querySelector('.search-overlay');
    var searchButton = document.querySelector('a.search');
    var mobileSearchButton = document.querySelector('.mobile-secondary-menu .search');
    var body = document.body;

    searchButton.addEventListener('click', function() {
        search_popUp.classList.toggle('has-popped');
        body.classList.toggle('no_scroll');
    });
    mobileSearchButton.addEventListener('click', function() {
        search_popUp.classList.toggle('has-popped');
        body.classList.toggle('no_scroll');
    });

    close.addEventListener('click', function() {
        search_popUp.classList.remove('has-popped');
        body.classList.remove('no_scroll');
    });

    search_popUp.addEventListener('click', function(event) {
        if (event.target === search_popUp || event.target === close) {
            search_popUp.classList.remove('has-popped');
            body.classList.remove('no_scroll');
        }
    });
});