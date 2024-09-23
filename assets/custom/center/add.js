document.addEventListener('DOMContentLoaded', function (e) {
    const add_center_form = document.getElementById('add_center_form');
    const institute_name = $('input[name="institute_name"]');
    const prefix_roll_no_input = $('input[name="rollno_prefix"]');
    const check_roll_no_prefix_url = ajax_url + '';

    if (add_center_form) {
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        var validator = FormValidation.formValidation(
            add_center_form,
            {
                fields: {
                    rollno_prefix  : {
                        validators:{
                            notEmpty :{
                                message : 'Prefix Roll no. field is required.'
                            }
                        }
                    },
                    qualification_of_center_head: {
                        validators: {
                            notEmpty: {
                                message: 'Qualification field is required'
                            }
                        }
                    },
                    name: {
                        validators: {
                            notEmpty: {
                                message: 'Owner Name is required'
                            }
                        }
                    },
                    institute_name: {
                        validators: { notEmpty: { message: 'Institute name is requried' } }
                    },
                    dob: {
                        validators: { notEmpty: { message: 'Date of Birth is requried' } }
                    },
                    pan_number: {
                        validators: {
                            notEmpty: {
                                message: 'PAN card number is required'
                            },
                            regexp: {
                                regexp: /^[A-Z]{5}[0-9]{4}[A-Z]$/,
                                message: 'Invalid PAN card number format'
                            }
                        }
                    },
                    aadhar_number: {
                        validators: {
                            notEmpty: {
                                message: 'Aadhaar number is required'
                            },
                            regexp: {
                                regexp: /^\d{12}$/,
                                message: 'Invalid Aadhaar number format'
                            },
                            stringLength: {
                                max: 12,
                                message: 'Aadhaar number must be 12 digits'
                            }
                        }
                    },
                    center_full_address: {
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
                                maxSize: 5 * 1024 * 1024, // 5 MB
                                message: 'The selected file is not valid. Allowed types: jpg, jpeg, png, gif. Maximum size: 5 MB.'
                            }
                        }
                    },
                    state_id: {
                        validators: {
                            notEmpty: {
                                message: 'State is required'
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
                    whatsapp_number: {
                        validators: {
                            notEmpty: {
                                message: 'Please enter a WhatsApp number.'
                            },
                            regexp: {
                                regexp: /^(?:\+|\d)[\d-\s]+$/,
                                message: 'Please enter a valid WhatsApp number.'
                            },
                            stringLength: {
                                min: 10,
                                max: 15,
                                message: 'The WhatsApp number must be between 10 and 15 characters.'
                            }
                        }
                    },
                    contact_number: {
                        validators: {
                            notEmpty: {
                                message: 'Please enter a contact number.'
                            },
                            regexp: {
                                regexp: /^(?:\+|\d)[\d-\s]+$/,
                                message: 'Please enter a valid contact number.'
                            },
                            stringLength: {
                                min: 10,
                                max: 15,
                                message: 'The contact number must be between 10 and 15 characters.'
                            }
                        }
                    },
                    no_of_computer_operator: {
                        validators: {
                            notEmpty: {
                                message: 'Please enter a number.'
                            },
                            numeric: {
                                message: 'Please enter a valid number.'
                            }
                        }
                    },
                    no_of_class_room: {
                        validators: {
                            notEmpty: {
                                message: 'Please enter a number.'
                            },
                            numeric: {
                                message: 'Please enter a valid number.'
                            }
                        }
                    },
                    total_computer: {
                        validators: {
                            notEmpty: {
                                message: 'Please enter a number.'
                            },
                            numeric: {
                                message: 'Please enter a valid number.'
                            }
                        }
                    },
                    space_of_computer_center: {
                        validators: {
                            notEmpty: {
                                message: 'Please enter a number.'
                            },
                            numeric: {
                                message: 'Please enter a valid number.'
                            }
                        }
                    },
                    email_id: {
                        validators: {
                            regexp: {
                                regexp: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
                                message: "The value is not a valid email address",
                            },
                            notEmpty: { message: "Email address is required" },
                        },
                    },
                    // username: {
                    //     validators: {
                    //         notEmpty: { message: "The username is required" },
                    //         regexp: {
                    //             regexp: /^[A-Za-z]+$/, // Only letters allowed
                    //             message: 'Only letters are allowed in the string.'
                    //         },
                    //         callback: {
                    //             callback: function (input) {
                    //                 // Check if the string has no spaces
                    //                 return input.value.indexOf(' ') === -1;
                    //             },
                    //             message: 'Spaces are not allowed.'
                    //         }
                    //     },
                    // },

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
                    valid_upto: {
                        validators: { notEmpty: { message: 'This Date is requried' } }
                    },
                    adhar_front: {
                        validators: {
                            notEmpty: {
                                message: 'Please choose a file of Aadhar Front Side.'
                            },
                            file: {
                                extension: 'jpg,jpeg,png,gif',
                                type: 'image/jpeg,image/png,image/gif',
                                maxSize: max_upload_size, // 5 MB
                                message: 'The selected file is not valid. Allowed types: jpg, jpeg, png, gif. Maximum size: 2 MB.'
                            }
                        }
                    },

                    adhar_back: {
                        validators: {
                            notEmpty: {
                                message: 'Please choose a file of Aadhar Back side.'
                            },
                            file: {
                                extension: 'jpg,jpeg,png,gif',
                                type: 'image/jpeg,image/png,image/gif',
                                maxSize: max_upload_size,
                                message: 'The selected file is not valid. Allowed types: jpg, jpeg, png, gif. Maximum size: 2 MB.'
                            }
                        }
                    },
                    signature: {
                        validators: {
                            notEmpty: {
                                message: 'Please choose a file of Signature.'
                            },
                            file: {
                                extension: 'jpg,jpeg,png,gif',
                                type: 'image/jpeg,image/png,image/gif',
                                maxSize: max_upload_size,
                                message: 'The selected file is not valid. Allowed types: jpg, jpeg, png, gif. Maximum size: 2 MB.'
                            }
                        }
                    },
                    address_proof: {
                        validators: {
                            file: {
                                extension: 'jpg,jpeg,png,gif',
                                type: 'image/jpeg,image/png,image/gif',
                                maxSize: max_upload_size,
                                message: 'The selected file is not valid. Allowed types: jpg, jpeg, png, gif. Maximum size: 2 MB.'
                            }
                        }
                    },

                    agreement: {
                        validators: {
                            file: {
                                extension: 'jpg,jpeg,png,gif',
                                type: 'image/jpeg,image/png,image/gif',
                                maxSize: max_upload_size,
                                message: 'The selected file is not valid. Allowed types: jpg, jpeg, png, gif. Maximum size: 2 MB.'
                            }
                        }
                    },

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
        add_center_form.addEventListener('submit', function (e) {
            // Prevent default button action
            e.preventDefault();
            var submitButton = $(this).find('button');

            // Validate form before submit
            if (validator) {
                // console.log(validator);
                validator.validate().then(function (status) {
                    // console.log(validator);
                    var formData = new FormData(add_center_form);

                    if (status == 'Valid') {
                        $(submitButton).attr('data-kt-indicator', 'on').prop('disabled', true);
                        // $.ajax({
                        //     type: 'POST',
                        //     url: ajax_url + 'center/add',
                        //     data: formData,
                        //     dataType: 'json',
                        //     success: function (res) {

                        //     },
                        //     error: function (a, b, c) {

                        //     },
                        //     complete: function () {
                        //         $(submitButton).removeAttr('data-kt-indicator').prop("disabled",false);
                        //     }
                        // });


                        axios
                            .post(
                                ajax_url + 'center/add',
                                new FormData(add_center_form)
                            )
                            .then(function (e) {
                                if (e.data.status) {
                                    add_center_form.reset(),
                                        Swal.fire({
                                            text: "Center Submited Successfully.",
                                            icon: "success",
                                            buttonsStyling: !1,
                                            confirmButtonText: "Ok, got it!",
                                            customClass: {
                                                confirmButton: "btn btn-primary",
                                            },
                                        }).then((r) => {
                                            location.reload();
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


        institute_name.on('keyup',function(){
            var roll_no = generateRollNumberPrefix(this.value);
            // console.log(roll_no);

        // Extract the last two digits
            var lastTwoDigits = String(currentYear()).slice(-2);
            var newRoll = roll_no+''+lastTwoDigits+'000';
            if(roll_no == '')
                newRoll = '';
            prefix_roll_no_input.val(newRoll);
        })





    }
});