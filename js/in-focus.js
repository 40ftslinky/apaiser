document.addEventListener('DOMContentLoaded', function() {
    // Select the form input and button elements
    const formInput = document.querySelector('form.search input');
    const formButton = document.querySelector('form.search button');

    // Add focus event listener to the form input
    formInput.addEventListener('focus', function() {
        formButton.classList.add('in-focus');
    });

    // Add blur event listener to the form input
    formInput.addEventListener('blur', function() {
        formButton.classList.remove('in-focus');
    });
});