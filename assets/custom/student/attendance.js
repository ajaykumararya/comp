document.addEventListener('DOMContentLoaded', function (e) {
    const form = document.getElementById('add_form');
    $('.attendance-date').flatpickr({
        maxDate: 'today',
        dateFormat : dateFormat
    });
    if (form) {
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        var validator = FormValidation.formValidation(
            form,
            {
                fields: {
                    attendance_date: {
                        validators: {
                            notEmpty: {
                                message: 'Select a date'
                            }
                        }
                    },
                    batch_id: {
                        validators: { notEmpty: { message: 'Please Select a Batch' } }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.form-group',
                        eleInvalidClass: '',
                        eleValidClass: ''
                    })
                }
            }
        );
        // Submit button handler
        // const submitButton = document.getElementById('kt_docs_formvalidation_text_submit');
        form.addEventListener('submit', function (e) {
            // Prevent default button action
            e.preventDefault();
            var submitButton = $(this).find('button');
            // Validate form before submit
            if (validator) {
                // console.log(validator);
                validator.validate().then(function (status) {
                    // console.log(validator);
                    var formData = new FormData(form);
                    if (status == 'Valid') {
                        $('.view-list').html('<h3 class="text-center"><i class="fa fa-spin fa-spinner"></i> Please wait..</h3>');
                        $(submitButton).attr('data-kt-indicator', 'on').prop('disabled', true);
                        axios
                            .post(
                                ajax_url + 'student/search-student-for-attendance',
                                new FormData(form)
                            )
                            .then(function (e) {
                                console.log(e);
                                if (e.data.status) {
                                    $('.view-list').html(e.data.html);
                                }
                                else {
                                    Swal.fire({
                                        text: 'Please Check It.',
                                        html: e.data.html,
                                        icon: "warning",
                                        buttonsStyling: !1,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton: "btn btn-primary",
                                        },
                                    });
                                }
                            })
                            .catch(function (t) {
                                console.log(t);
                                Swal.fire({
                                    text: "Sorry, looks like there are some errors detected, please try again.",
                                    icon: "error",
                                    buttonsStyling: !1,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: { confirmButton: "btn btn-primary" },
                                });
                            })
                            .then(() => {
                                $(submitButton).removeAttr('data-kt-indicator').prop("disabled", false);
                            });
                    }
                });
            }
        });
    }
    $(document).on('submit', '#submit-attendance-form', function (r) {
        r.preventDefault();
        $.AryaAjax({
            url: 'student/save-attendance',
            data: $(this).serialize(),
        }).then(function (r) {
            // console.log(r);
            // form.reset();
            $('.view-list').html('');
            Swal.fire({
                html: 'Student Attendance Submitted Successfully...',
                icon: 'success'
            });
        });
        // console.log($(this).serialize());
    })
});
