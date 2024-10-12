/* -- vanilla js -- */

var elem = document.querySelector('.range .carousel');
var flkty = new Flickity( elem, {
    // options
    cellAlign: 'left',
    contain: true,
    prevNextButtons: true,
    pageDots: true,
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