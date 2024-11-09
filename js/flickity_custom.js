/* -- vanilla js -- */

var rangeCarousel = document.querySelector('.range .carousel');
var flkty = new Flickity( rangeCarousel, {
    // options
    cellAlign: 'left',
    contain: true,
    prevNextButtons: true,
    pageDots: true,
    arrowShape: 'M60.5689 0.5L66 6L21.363 50.2884L66 94.5L60.6455 100L10.6348 50.2884L60.5689 0.5Z'
    
    
    // groupCells: 3,
});

var projectCarousel = document.querySelector('.project-carousel');
var flkty = new Flickity( projectCarousel, {
    // options
    cellAlign: 'left',
    contain: true,
    prevNextButtons: true,
    pageDots: true,
    // margin: 1,
    // groupCells: 3,
});

// 

// external js: flickity.pkgd.js

var utils = window.fizzyUIUtils;



document.addEventListener('DOMContentLoaded', function() {
    window.addEventListener('resize', function() {
        // trigger resize method after showing
        var carousel = document.querySelector('.projects .carousel');
        if (carousel && typeof Flickity !== 'undefined') {
            var flkty = Flickity.data(carousel);
            if (flkty) {
                flkty.resize();
            }
        }
    });
    // 
});