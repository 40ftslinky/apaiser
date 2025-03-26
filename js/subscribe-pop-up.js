// Wait until the entire DOM content is loaded and ready
document.addEventListener('DOMContentLoaded', function() {
	
    // Select the pop-up element with the class '.subscribe-pop-up'
    var subscribepopUp = document.querySelector('.subscribe-pop-up');
    
    // Select the wrapper element for the pop-up
    var subscribe_pop_up_wrapper = document.querySelector('.subscribe-pop-up_wrapper');
    
    // Select the close button within the pop-up
    var close = document.querySelector('.subscribe-close');
    
    // Select all elements with the class '.subscribe_link'
    var subscribepopUpButtons = document.querySelectorAll('.subscribe_link'); 
    
    // Reference the body element to manipulate its class for scrolling behavior
    var body = document.body;
    
    // Select the consent checkbox input (if needed for further functionality)
    let consent_checkbox = document.querySelector('input[name="enquiry-consent"]');

    // Add click event listeners to all buttons with the class '.subscribe_link'
    subscribepopUpButtons.forEach(function(button) {
		
        button.addEventListener('click', function() {
			
            // Toggle the visibility of the pop-up
            subscribepopUp.classList.toggle('is-visible');
			
            // Toggle the 'no_scroll' class on the body to disable/enable scrolling
            body.classList.toggle('no_scroll');
			
        });
    });

    // Add click event listener to the close button
    close.addEventListener('click', function() {
		
        // Remove the 'is-visible' class to hide the pop-up
        subscribepopUp.classList.remove('is-visible');
		
        // Remove the 'no_scroll' class from the body to re-enable scrolling
        body.classList.remove('no_scroll');
		
    });

    // Add click event listener to the pop-up itself for closing when clicking outside the content
    subscribepopUp.addEventListener('click', function(event) {
		
        // Check if the clicked element is not the close button and not inside the pop-up content
        if (event.target !== close && event.target.closest('#subscribepopUp') !== event.currentTarget) {
			
            return; // Do nothing if the condition is met
        }
        // If the target is the pop-up or close button, hide the pop-up and re-enable scrolling
        if (event.target === subscribepopUp || event.target === close) {
			
            subscribepopUp.classList.remove('is-visible');
			
            body.classList.remove('no_scroll');
			
        }
    });
});





function addClassIfUrlMatches() {
  // Store the current page's URL
  var currentUrl = window.location.href;

  // Check if the URL contains either of the specified strings
  if (currentUrl.includes("#wpcf7-f22426-o2") || currentUrl.includes("#wpcf7-f22426-o3")) {
    // Find the div with id="subscribe" and add the "is-visible" class
    var subscribeDiv = document.getElementById("subscribe");
    if (subscribeDiv) {
      subscribeDiv.classList.add("is-visible");
    }
  }
}

// Call the function after the page loads
window.onload = addClassIfUrlMatches;
