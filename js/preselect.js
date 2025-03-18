document.addEventListener('DOMContentLoaded', function() {
    const formId = '103'; // Replace with your form ID
    const fieldName = 'your-dropdown-field-name'; // Replace with your dropdown field name

    const form = document.querySelector(`form.wpcf7-form[data-id="${formId}"]`);
    if (form) {
        const urlParams = new URLSearchParams(window.location.search);
        const urlParamValue = urlParams.get('url_param');

        if (urlParamValue) {
            const dropdown = form.querySelector(`select[name="${fieldName}"]`);
            if (dropdown) {
                for (let option of dropdown.options) {
                    if (option.text === urlParamValue) {
                        option.selected = true;
                    } else {
                        option.selected = false;
                    }
                }
            }
        }
    }
});
