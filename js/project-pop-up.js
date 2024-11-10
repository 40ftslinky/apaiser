// project-pop-up.js

document.addEventListener('DOMContentLoaded', function() {
    
	var closes = document.getElementsByClassName("close"); 
	var projectPopUp = document.getElementsByClassName("project-pop-up"); 
	var popUpButton = document.getElementsByClassName("pop-up-link"); 
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
			
			// make pop-up visible 
			projectPopUp[i].classList.toggle('is-visible');
	
			// no scrolling 
			body.classList.toggle('no_scroll');
		});

	}
	
	
});

/*

document.addEventListener('DOMContentLoaded', function() {
    // Select the div with the class 'project_featured_products'
    const projectDiv = document.querySelector('.project_featured_products');

    // Remove all paragraph tags inside this div
    if (projectDiv) {
        const paragraphs = projectDiv.querySelectorAll('p');
        paragraphs.forEach(function(paragraph) {
            paragraph.remove();
        });

        // Example array (replace with your actual array)
        const MyArray = ['First item', 'Second item', 'Third item'];

        // Loop through the array and add a new paragraph for each row's value
        MyArray.forEach(function(item) {
            const newParagraph = document.createElement('p');
            newParagraph.textContent = item;
            projectDiv.appendChild(newParagraph);
        });
    } else {
        console.error('Div with class "project_featured_products" not found.');
    }
});






*/


