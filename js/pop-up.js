// pop-up.js

/*


document.addEventListener('DOMContentLoaded', function() {
    //var popUp = document.querySelector('.pop-up');
	var popUp = document.getElementsByClassName("pop-up"); // changed ross
    var close = document.getElementsByClassName('close');
    var overlay = document.getElementsByClassName('overlay');
   // var popUpButton = document.querySelector('.pop-up-link');
	var popUpButton = document.getElementsByClassName("pop-up-link"); // changed ross
    var body = document.body;

	for (let i = 0; i < popUpButton.length; i++) {
			popUpButton[i].addEventListener('click', function() {
			popUp[i].classList.toggle('is-visible');
			body.classList.toggle('no_scroll');
		});
	}

	for (let i = 0; i < close.length; i++) {
			close[i].addEventListener('click', function() {
			popUp[i].classList.remove('is-visible');
			body.classList.remove('no_scroll');
		});
	}

	for (let i = 0; i < popUp.length; i++) {
			popUp.addEventListener('click', function(event) {
			if (event.target === popUp[i] || event.target === close) {
				popUp[i].classList.remove('is-visible');
				body.classList.remove('no_scroll');
			}
		});
	}
});


*/