document.addEventListener('DOMContentLoaded', function() {
    const forms = document.querySelectorAll('form');
    // add a delay to the form submission
    setTimeout(function() {
        
    forms.forEach(form => {
        const status = form.getAttribute('data-status');
        
        // If status is "sent" add success class and scroll to the form with 250px offset.
        if (status === 'sent') {
            const srParent = form.parentElement.querySelector('.screen-reader-response');
            const srResponse = form.previousElementSibling;

            // Debugging logs
            console.log('srParent:', srParent);
            console.log('srResponse:', srResponse);

            if (srResponse && srResponse.classList.contains('screen-reader-response')) {
                srResponse.classList.add('success-message');
                srResponse.classList.add('offset');

                // Ensure the form is displayed well below the top of the window (250px offset)
                // const offsetSuccess = form.previousElementSibling.getBoundingClientRect().top + window.scrollY - 250;
                const offsetSuccess = srParent.getBoundingClientRect().top + window.scrollY - 250;

                // Debugging log for offset
                console.log('offsetSuccess:', offsetSuccess);

                // Scroll to the offset with smooth behavior
                window.scrollTo({
                    top: offsetSuccess,
                    behavior: 'smooth'
                });

                // Add a class to the form
                form.classList.remove('error-scrolled');
                form.classList.add('submit-scrolled');

                // Log success message to the console
                console.log('Form submitted successfully and scrolled into view.');
            }
        }

        // If status is "invalid" or "spam" or "unaccepted" or "failed" or "aborted", scroll to the form.
        if (status === 'invalid' || status === 'spam' || status === 'unaccepted' || status === 'failed' || status === 'aborted') {
            const srResponse = form.previousElementSibling;

            // Debugging log
            console.log('srResponse:', srResponse);

            if (srResponse && srResponse.classList.contains('screen-reader-response')) {
                srResponse.classList.add('error-message-visible');
                srResponse.classList.add('offset');

                // Ensure the form is displayed well below the top of the window (200px offset)
                const offset = form.previousElementSibling.getBoundingClientRect().top + window.scrollY - 200;

                // Debugging log for offset
                console.log('offset:', offset);

                // Scroll to the offset with smooth behavior
                window.scrollTo({
                    top: offset,
                    behavior: 'smooth'
                });

                // Add a class to the form
                form.classList.remove('submit-scrolled');
                form.classList.add('error-scrolled');

                // Log error message to the console
                console.log('Form submission failed. Scrolled to the form with errors.');
            }
        }
    });
    }
    , 1000);
});

// Select all elements with the class 'subscribe_link'
const subscribeLinks = document.querySelectorAll('.subscribe_link');

// Loop through each element and attach a click event listener
subscribeLinks.forEach(function(link) {
    link.addEventListener('click', function() {
        // Find the first element with the class 'success-message'
        const successMessage = document.querySelector('.success-message');
        
        // Check if the 'success-message' element exists on the page
        if (successMessage) {
            // Hide the 'success-message' element by setting its display style to 'none'
            successMessage.style.display = 'none';

            // Log message to the console
            console.log('Success message hidden after clicking subscribe link.');
        }
    });
});