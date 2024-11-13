// menu-active.js

// vanilla js - change class


document.getElementById('menu-button').onclick = function() { 
    this.classList.toggle('active');
    document.getElementsByTagName('header')[0].classList.toggle('active');
    //document.getElementsByClassName('[class*="submenu"]')[0].classList.remove('open');
	document.getElementsByClassName('submenu')[0].classList.remove('open');
    // document.getElementsByClassName('wp-block-navigation-submenu')[0].classList.remove('open');
    document.body.classList.toggle('no_scroll'); // Add 'no_scroll' class to body
	

	// Select all 'ul' elements and remove the 'open' class from each
	const ulElements = document.querySelectorAll('ul');
	ulElements.forEach(function(ul) {
		ul.classList.remove('open');
	});

	

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
        document.querySelector('.search-pop-up').classList.remove('has-popped');
        document.body.classList.add('no_scroll');
    });
    // Add mouseout event listener to remove .no_scroll from body
    desk_menuLinks[i].addEventListener('mouseout', function() {
        document.body.classList.remove('no_scroll');
    });
}

// mobile dropdown menu show`n`hide

// Get all elements with class 'has-dropdown'
const mob_hasDropdownElements = document.querySelectorAll('.fullscreen .has-dropdown');

// Loop over the elements
for (let j = 0; j < mob_hasDropdownElements.length; j++) {

    // Add the onclick event listener to each element
    mob_hasDropdownElements[j].onclick = function() {

        // Remove 'open' class from all dropdown elements
        const openDropdownElements = document.querySelectorAll('.dropdown.open');
        const dropdownElement = this.querySelectorAll('.dropdown');
        // const opensubmenuElement = this.querySelectorAll('.submenu.open');

        for (let k = 0; k < openDropdownElements.length; k++) {
            if (openDropdownElements[k] !== dropdownElement) {
                openDropdownElements[k].classList.toggle('open');
                // opensubmenuElement[k].classList.remove('open');
            }
        }
        

        // Loop over the dropdown elements
        for (let l = 0; l < dropdownElement.length; l++) {
            // Toggle the 'open' class on each dropdown element
            
            dropdownElement[l].classList.toggle('open');
        }

		// Toggle the 'open' class on the submenu element
		if (dropdownElement && dropdownElement.classList) {
			dropdownElement.classList.toggle('open');
		}       
    }
}

// mobile submenu show`n`hide

// Get all elements with class 'has-submenu'
const mob_hasSubmenuElements = document.querySelectorAll('.has-submenu');

// Loop over the elements
for (let m = 0; m < mob_hasSubmenuElements.length; m++) {

    // Add the onclick event listener to each element
    mob_hasSubmenuElements[m].onclick = function() {

        // Get the submenu element within the clicked element's parent
        const submenuElement = this.parentElement.querySelector('.submenu');

        // Close any open submenu
        const openSubmenuElements = document.querySelectorAll('.submenu.open');
        for (let n= 0; n < openSubmenuElements.length; n++) {
            if (openSubmenuElements[n] !== submenuElement) {
                openSubmenuElements[n].classList.remove('open');
            }
        }

        // Toggle the 'open' class on the submenu element
        if (submenuElement) {
            submenuElement.classList.toggle('open');
        }
    }
}





document.addEventListener('DOMContentLoaded', function() {
    // Select all elements with the class 'menu-link'
    const menuLinks = document.querySelectorAll('.menu-link');
    
    // Add a click event listener to each 'menu-link' element
    menuLinks.forEach(function(menuLink) {
        menuLink.addEventListener('click', function() {
            // Select all 'ul' elements and remove the 'open' class from each
            const ulElements = document.querySelectorAll('ul');
            ulElements.forEach(function(ul) {
                ul.classList.remove('open');
            });
        });
    });		
});


// smoothly scroll to the target element

// get all elements with link to id
const links = document.querySelectorAll('.submenu-link[href^="#"]');

// loop through the links
for (let i = 0; i < links.length; i++) {
    links[i].addEventListener('click', function(event) {

        // prevent default action
        event.preventDefault();

        // get the target element
        const target = document.querySelector(this.getAttribute('href'));

        // scroll to the target element minus the height of the header
        window.scrollTo({
            top: target.offsetTop - document.querySelector('header').offsetHeight,
            behavior: 'smooth'
        });
    });
}