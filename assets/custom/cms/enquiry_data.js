document.addEventListener('DOMContentLoaded', function (e) {

    const update_enquiry = $('.update-status');
    const table = $('#enquiry_data');
    $(document).on('click','.update-status', function (r) {
        var text = $(this).attr('data-text');
        var data = table.DataTable().row($(r.target).parents('tr')).data();
        var id = (data[data.length - 1]);
        var td = $(this);
        Swal.fire({
            title: 'Enter your message',
            input: 'textarea',
            inputLabel: 'Message',
            inputValue: text,
            inputPlaceholder: 'Type your message here...',
            customClass:{
                input: 'swal2-textarea text-dark',
            },
            inputAttributes: {
                'aria-label': 'Type your message here'
            },
            showCancelButton: true,
            confirmButtonText: 'Save',
            cancelButtonText: 'Cancel',
            preConfirm: (textareaValue) => {
                // Regular expression to detect special characters
                var specialCharRegex = /[^a-zA-Z0-9\s]/;

                if (textareaValue) {
                    if (specialCharRegex.test(textareaValue)) {
                        // If special characters are found, show validation message
                        Swal.showValidationMessage('Special characters are not allowed.');

                        return false;

                    } else {
                        return textareaValue;
                    }
                } else {
                    Swal.showValidationMessage('Please enter a message.');
                    return false;
                }
            }
        }).then((result) => {
            // log(result);
            if (result.isConfirmed) {
                // Swal.fire('Saved!', 'Your message has been saved.', 'success');
                $.AryaAjax({
                    url: 'website/enquiry-update-status',
                    data : {id : id,value : result.value},
                    success_message : 'Your Message has been saved.'
                }).then((e) => {
                    $(td).attr('data-text',result.value);
                });
            }
        });
    });

});