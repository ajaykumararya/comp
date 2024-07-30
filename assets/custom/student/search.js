document.addEventListener('DOMContentLoaded', function (e) {
    const form = document.getElementById('search_by_roll_no');
    const result_box
        = $('.record-show');
    select2Student('select[name="student_id"]');
    if (form) {
        var validator = FormValidation.formValidation(
            form,
            {
                fields: {
                    roll_no: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter Roll No.'
                            }
                        }
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
                    // var formData = new FormData(form);

                    if (status == 'Valid') {
                        $(submitButton).attr('data-kt-indicator', 'on').prop('disabled', true);
                        result_box.addClass('fade').html('');
                        SwalShowloading();
                        axios
                            .post(
                                ajax_url + 'student/get-via-id',
                                new FormData(form)
                            )
                            .then(function (e) {
                                console.log(e.data);
                                if (e.data.status) {
                                    // form.reset(),
                                    SwalHideLoading();
                                    result_box.removeClass('fade').html(e.data.html);
                                    
                                }
                                else {

                                    Swal.fire({
                                        // text: 'Please Check It.',
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
                                SwalHideLoading();
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
});