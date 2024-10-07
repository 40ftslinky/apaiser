// menu-active.js

// vanilla js - change class


document.getElementById('menu-button').onclick = function() { 
    this.classList.toggle('active');
    document.getElementsByTagName('header')[0].classList.toggle('active');
    //document.getElementsByClassName('[class*="submenu"]')[0].classList.remove('open');
	document.getElementsByClassName('submenu')[0].classList.remove('open');
    // document.getElementsByClassName('wp-block-navigation-submenu')[0].classList.remove('open');
    document.body.classList.toggle('no_scroll'); // Add 'no_scroll' class to body
}

// Get all elements with class 'menu-link'
const menuLinks = document.getElementsByClassName('menu-link');
const desk_menuLinks = document.querySelectorAll('.desktop .menu-link');

// Add an event listener to each menu link
for (let i = 0; i < desk_menuLinks.length; i++) {
    desk_menuLinks[i].onclick = function() {
        // Remove 'active' class from 'menu-button' and 'header' when any menu link except has-child is clicked
        if (!this.classList.contains('has-dropdown')) {
            document.getElementById('menu-button').classList.remove('active');
            document.getElementById('header').classList.remove('active');
        }
    }
    desk_menuLinks[i].addEventListener('mouseover', function() {
        // code for the hover effect
        document.querySelector('.search-pop-up').classList.remove('is-visible');
        document.body.classList.remove('no_scroll');
    });
}

// mobile dropdown menu show`n`hide

// Get all elements with class 'has-dropdown'
const mob_hasDropdownElements = document.querySelectorAll('.fullscreen .has-dropdown');

// Loop over the elements
for (let i = 0; i < mob_hasDropdownElements.length; i++) {

    // Add the onclick event listener to each element
    mob_hasDropdownElements[i].onclick = function() {

        // Remove 'open' class from all dropdown elements
        const allDropdownElements = document.querySelectorAll('.dropdown.open');
        const dropdownElement = this.querySelectorAll('.dropdown');
        // const opensubmenuElement = this.querySelectorAll('.submenu.open');

        for (let k = 0; k < allDropdownElements.length; k++) {
            if (allDropdownElements[k] !== dropdownElement) {
                allDropdownElements[k].classList.remove('open');
                // opensubmenuElement[k].classList.remove('open');
            }
        }
        

        // Remove 'open' class from all submenu elements
        // this isnt working - is it because .dropdown is a parent of .submenu?

        // const openSubmenuElements = document.querySelectorAll('.submenu.open');
        // for (let l = 0; l < openSubmenuElements.length; l++) {
        //     openSubmenuElements[l].classList.remove('open');
        // }


        // Loop over the dropdown elements
        for (let j = 0; j < dropdownElement.length; j++) {
            // Toggle the 'open' class on each dropdown element
            dropdownElement[j].classList.toggle('open');
        }
        // Toggle the 'open' class on the submenu element
        if (dropdownElement) {
            dropdownElement.classList.toggle('open');
        }
    }
}

// mobile submenu show`n`hide

// Get all elements with class 'has-submenu'
const mob_hasSubmenuElements = document.querySelectorAll('.fullscreen .dropdown .submenu-title');

// Loop over the elements
for (let i = 0; i < mob_hasSubmenuElements.length; i++) {

    // Add the onclick event listener to each element
    mob_hasSubmenuElements[i].onclick = function() {

        // Get the submenu element within the clicked element's parent
        const submenuElement = this.parentElement.querySelector('.submenu');

        // Close any open submenu
        const allSubmenuElements = document.querySelectorAll('.submenu.open');
        for (let j = 0; j < allSubmenuElements.length; j++) {
            if (allSubmenuElements[j] !== submenuElement) {
                allSubmenuElements[j].classList.remove('open');
            }
        }

        // Toggle the 'open' class on the submenu element
        if (submenuElement) {
            submenuElement.classList.toggle('open');
        }
    }
}