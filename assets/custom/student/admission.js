document.addEventListener('DOMContentLoaded', function (e) {
    // $('input[name="passing_year"]').flatpickr();
    const form = document.getElementById('form');
    const institue_box = $('select[name="center_id"]');
    const roll_no_box = $('input[name="roll_no"]');
    const course_box = $('select[name="course_id"]');
    // const input_center = $('input[name="center_id"]');
    const referral_id = $('[name="referral_id"]');
    if(referral_id)
        select2Student(referral_id);
    // console.log(institue_box);
    if (form) {
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        var validator = FormValidation.formValidation(
            form,
            {
                fields: {
                    name: {
                        validators: {
                            notEmpty: {
                                message: 'Owner Name is required'
                            }
                        }
                    },
                    dob: {
                        validators: { notEmpty: { message: 'Date of Birth is requried' } }
                    },
                    address: {
                        validators: {
                            notEmpty: {
                                message: 'Address is required'
                            },
                        }
                    },
                    pincode: {
                        validators: {
                            notEmpty: {
                                message: 'Pincode is required'
                            },
                            regexp: {
                                regexp: /^[1-9][0-9]{5}$/,
                                message: 'Invalid Pincode format'
                            },
                            stringLength: {
                                max: 6,
                                message: 'Pincode must be 6 digits'
                            }
                        }
                    },
                    image: {
                        validators: {
                            notEmpty: {
                                message: 'Please choose a file.'
                            },
                            file: {
                                extension: 'jpg,jpeg,png,gif',
                                type: 'image/jpeg,image/png,image/gif',
                                maxSize: max_upload_size, // 5 MB
                                message: 'The selected file is not valid. Allowed types: jpg, jpeg, png, gif. Maximum size: 2 MB.'
                            }
                        }
                    },

                    'upload_docs[file][]': {
                        validators: {
                            file: {
                                extension: 'jpg,jpeg,png,gif,pdf',
                                type: 'image/jpeg,image/png,image/gif,application/pdf',
                                maxSize: max_upload_size, // 5 MB
                                message: 'The selected file is not valid. Allowed types: jpg, jpeg, png, gif and pdf. Maximum size: 2 MB.'
                            }
                        }
                    },

                    adhar_card: {
                        validators: {
                            notEmpty: {
                                message: 'Please choose a file of Aadhar Card.'
                            },
                            file: {
                                extension: 'jpg,jpeg,png,gif,pdf',
                                type: 'image/jpeg,image/png,image/gif,application/pdf',
                                maxSize: max_upload_size, // 5 MB
                                message: 'The selected file is not valid. Allowed types: jpg, jpeg, png, gif and pdf. Maximum size: 2 MB.'
                            }
                        }
                    },

                    // adhar_back: {
                    //     validators: {
                    //         notEmpty: {
                    //             message: 'Please choose a file of Aadhar Back side.'
                    //         },
                    //         file: {
                    //             extension: 'jpg,jpeg,png,gif',
                    //             type: 'image/jpeg,image/png,image/gif',
                    //             maxSize: max_upload_size,
                    //             message: 'The selected file is not valid. Allowed types: jpg, jpeg, png, gif. Maximum size: 2 MB.'
                    //         }
                    //     }
                    // },
                    state_id: {
                        validators: {
                            notEmpty: {
                                message: 'State is required'
                            },
                        }
                    },
                    enrollment_no: {
                        validators: {
                            notEmpty: {
                                message: 'Enter Enrollment No.'
                            },
                        }
                    },
                    gender: {
                        validators: {
                            notEmpty: {
                                message: 'Select A Gender'
                            },
                        }
                    },
                    city_id: {
                        validators: {
                            notEmpty: {
                                message: 'City is required'
                            },
                        }
                    },

                    alternative_mobile: {
                        validators: {
                            regexp: {
                                regexp: /^(?:\+|\d)[\d-\s]+$/,
                                message: 'Please enter a valid contact number.'
                            },
                            stringLength: {
                                min: 10,
                                max: 15,
                                message: 'The Mobile number must be between 10 and 15 characters.'
                            }
                        }
                    },
                    /*
                    father_mobile: {
                        validators: {
                            notEmpty: {
                                message: 'Please enter a number of father.'
                            },
                            regexp: {
                                regexp: /^(?:\+|\d)[\d-\s]+$/,
                                message: 'Please enter a valid contact number.'
                            },
                            stringLength: {
                                min: 10,
                                max: 15,
                                message: 'The Mobile number must be between 10 and 15 characters.'
                            }
                        }
                    },*/
                    contact_number: {
                        validators: {
                            notEmpty: {
                                message: 'Please enter a Whatsapp number.'
                            },
                            regexp: {
                                regexp: /^(?:\+|\d)[\d-\s]+$/,
                                message: 'Please enter a valid Whatsapp number.'
                            },
                            stringLength: {
                                min: 10,
                                max: 15,
                                message: 'The Whatsapp number must be between 10 and 15 characters.'
                            }
                        }
                    },
                    father_name: {
                        validators: {
                            notEmpty: {
                                message: 'Please enter father name.'
                            }
                        }
                    },
                    mother_name: {
                        validators: {
                            notEmpty: {
                                message: 'Please enter mother name.'
                            },
                        }
                    },
                    // email_id: {
                    //     validators: {
                    //         regexp: {
                    //             regexp: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
                    //             message: "The value is not a valid email address",
                    //         },
                    //         notEmpty: { message: "Email address is required" },
                    //     },
                    // },
                    /*
                    username: {
                        validators: {
                            notEmpty: { message: "The username is required" },
                            regexp: {
                                regexp: /^[A-Za-z]+$/, // Only letters allowed
                                message: 'Only letters are allowed in the string.'
                            },
                            callback: {
                                callback: function (input) {
                                    // Check if the string has no spaces
                                    return input.value.indexOf(' ') === -1;
                                },
                                message: 'Spaces are not allowed.'
                            }
                        },
                    },
                    password: {
                        validators: {
                            notEmpty: { message: "The password is required" },
                            stringLength: {
                                min: 8,
                                message: 'The password must be at least 8 characters long.'
                            },
                            regexp: {
                                regexp: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/,
                                message: 'The password must contain at least one uppercase letter, one lowercase letter, one digit, and one special character.'
                            }
                        },
                    },
                    */
                    batch_id: {
                        validators: { notEmpty: { message: 'Please Select a Time Table' } }
                    },
                    course_id: {
                        validators: { notEmpty: { message: 'Please Select a course' } }
                    },
                    center_id: {
                        validators: { notEmpty: { message: 'Please Select a Center' } }
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

            if(!isValidWallet()){
                low_balance_message();
                return false;
            }



            // Validate form before submit
            if (validator) {
                // console.log(validator);
                validator.validate().then(function (status) {
                    // console.log(validator);
                    var formData = new FormData(form);

                    if (status == 'Valid') {
                        $(submitButton).attr('data-kt-indicator', 'on').prop('disabled', true);
                        axios
                            .post(
                                ajax_url + 'student/add',
                                new FormData(form)
                            )
                            .then(function (e) {
                                console.log(e);
                                if (e.data.status) {
                                    form.reset(),
                                        Swal.fire({
                                            text: "Student Submited Successfully.",
                                            icon: "success",
                                            buttonsStyling: !1,
                                            confirmButtonText: "Ok, got it!",
                                            customClass: {
                                                confirmButton: "btn btn-primary",
                                            },
                                        }).then(function (result) {
                                            if (result.isConfirmed) {
                                                location.reload();
                                            }
                                        });
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


        institue_box.change(function () {
            var center_id = $(this).val();
            course_box.html('');
            roll_no_box.val('');
            // alert(center_id);
            $.AryaAjax({
                url: 'student/genrate-a-new-rollno-with-center-courses',
                data: { center_id },
                dataType: 'json'
            }).then(function (res) {
                log(res);
                if (res.status) {
                    roll_no_box.val(res.roll_no);
                    var options = '<option value=""></option>';
                    if (res.courses.length) {
                        $.each(res.courses, function (index, course) {
                            options += `<option value="${course.course_id}" data-kt-rich-content-subcontent="${course.duration} ${course.duration_type}">${course.course_name}</option>`;
                        });
                    }
                    course_box.html(options).select2({
                        placeholder: "Select a Course",
                        templateSelection: optionFormatSecond,
                        templateResult: optionFormatSecond,
                    });
                }
                else {
                    roll_no_box.val('');
                    SwalWarning('This Center have not roll_no Prefix , Please Assign it.');
                }
            }).catch(function (a) {
                console.log(a);
            });
        }).select2({
            placeholder: "Select a Center",
            templateSelection: optionFormatSecond,
            templateResult: optionFormatSecond,
        });


        if(login_type == 'center'){
            institue_box.trigger("change");
        }
      
    }
}); 