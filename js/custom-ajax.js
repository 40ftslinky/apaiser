
console.log("custom-ajax");

document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.load-more-link').forEach(function(link) {
        link.addEventListener('click', function(event) {
            
			alert("click");
			
			
			event.preventDefault();

            // Get the current offset from a data attribute or set it to 0
            const offset = parseInt(this.getAttribute('data-offset')) || 0;

            // Increment the offset for the next batch
            const newOffset = offset + 9;

            // Set up the AJAX request
            const xhr = new XMLHttpRequest();
            xhr.open('POST', loadMorePosts.ajaxurl, true); // Use the localized ajaxurl
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');

            // Handle the AJAX response
            xhr.onload = function() {
                if (xhr.status === 200) {
                    // Insert the posts into a container
                    document.querySelector('#posts-container').insertAdjacentHTML('beforeend', xhr.responseText);
                    // Update the offset attribute
                    link.setAttribute('data-offset', newOffset);
                } else {
                    console.error('Error: ' + xhr.statusText);
                }
            };

            // Send the AJAX request
            xhr.send('action=get_installations&nonce=' + loadMorePosts.nonce + '&n=' + offset);
        });
    });
});
