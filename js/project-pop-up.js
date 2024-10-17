// project-pop-up.js

document.addEventListener('DOMContentLoaded', function() {
    
	var closes = document.getElementsByClassName("close"); 
	var projectPopUp = document.getElementsByClassName("project-pop-up"); 
	var popUpButton = document.getElementsByClassName("grid-projects pop-up-link"); 
    var body = document.body;
	
	// loop through the closes
	for (let i = 0; i < closes.length; i++) {
		// add onclick function for each close button	
		closes[i].addEventListener('click', function() {
			projectPopUp[i].classList.remove('is-visible');
			body.classList.remove('no_scroll');
		});
			
	}
	
	// loop thru the pop-ups
	for (let i = 0; i < projectPopUp.length; i++) {
		projectPopUp[i].addEventListener('click', function(event) {
			if (event.target === projectPopUp || event.target === closes) {
				projectPopUp[i].classList.remove('is-visible');
				body.classList.remove('no_scroll');
			}
		});
	}

	// loop through the pop up buttons 
	for (let i = 0; i < popUpButton.length; i++) {
		// add on click function for each popupButton 
		popUpButton[i].addEventListener('click', function() {
			projectPopUp[i].classList.toggle('is-visible');
			body.classList.toggle('no_scroll');
		});

	}
	
	
});