// pop-up.js




document.addEventListener('DOMContentLoaded', function() {
	
    var subscribepopUp = document.querySelector('.subscribe-pop-up');
	
	var subscribe_pop_up_wrapper = document.querySelector('.subscribe-pop-up_wrapper');
	
	
    var close = document.querySelector('.subscribe-close');
    // var overlay = document.querySelector('.overlay');
    var subscribepopUpButton = document.querySelector('.subscribe_link');
    var body = document.body;
	
	let consent_checkbox = document.querySelector('input[name="enquiry-consent"]');

	

    subscribepopUpButton.addEventListener('click', function() {
        subscribepopUp.classList.toggle('is-visible');
        body.classList.toggle('no_scroll');
    });

    close.addEventListener('click', function() {
        subscribepopUp.classList.remove('is-visible');
        body.classList.remove('no_scroll');
    });
	

		/*
		subscribepopUp.addEventListener('click', function(event) {

				if (event.target === subscribepopUp || event.target === close) {
					subscribepopUp.classList.remove('is-visible');
					body.classList.remove('no_scroll');
				}

		});
		*/
		
		subscribepopUp.addEventListener('click', function(event) {
			if (event.target !== close && event.target.closest('#subscribepopUp') !== event.currentTarget) {
				// Do nothing if the clicked element is not the close button or the div itself
				return;
			}
			if (event.target === subscribepopUp || event.target === close) {
				subscribepopUp.classList.remove('is-visible');
				body.classList.remove('no_scroll');
			}
		});

		
	
});