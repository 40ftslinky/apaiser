// pop-up.js

document.addEventListener('DOMContentLoaded', function() {
    var popUp = document.querySelector('.pop-up');
    var close = document.querySelector('.close');
    var overlay = document.querySelector('.overlay');
    var popUpButton = document.querySelector('.pop-up-link');
    var body = document.body;

    popUpButton.addEventListener('click', function() {
        popUp.classList.toggle('is-visible');
        body.classList.toggle('no_scroll');
    });

    close.addEventListener('click', function() {
        popUp.classList.remove('is-visible');
        body.classList.remove('no_scroll');
    });

    popUp.addEventListener('click', function(event) {
        if (event.target === popUp || event.target === close) {
            popUp.classList.remove('is-visible');
            body.classList.remove('no_scroll');
        }
    });
});