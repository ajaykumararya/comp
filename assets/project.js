function subModal(e) {
    var subjectModal = new bootstrap.Modal(document.getElementById('subjectsModal'));
    // alert(4);
    document.getElementById("subjectList").innerHTML = '';
    document.getElementById('smTitle').innerHTML = e.dataset.course_name + ' Subjects';
    e.dataset.course_subjects.split("?").forEach(function (sub) {
        if (sub)
            document.getElementById("subjectList").innerHTML += '<li class="list-group-item">' + sub + '</li>';
    });
    subjectModal.show();
}

// if (document.getElementById('subjectsModal').length) {
// var subjectModal = new bootstrap.Modal(document.getElementById('subjectsModal'));

// function subModal(e) {
//     document.getElementById("subjectList").innerHTML = '';
//     document.getElementById('smTitle').innerHTML = e.dataset.course_name + ' Subjects';
//     e.dataset.course_subjects.split("?").forEach(function (sub) {
//         if (sub)
//             document.getElementById("subjectList").innerHTML += '<li class="list-group-item">' + sub + '</li>';
//     });
//     subjectModal.show();
// }
// }
$(document).on('ready', function () {


    //log($('.student-verification-form'));
    $(document).on('submit', '.student-verification-form', function (e) {
        var box = $(this).closest('section').find('.show-student-details');
        box.html('');
        // alert(0);
        e.preventDefault();
        $.AryaAjax({
            url: 'website/student-verification',
            data: new FormData(this)
        }).then((r) => {
            // log(r);
            if (r.status) {
                // var box = $('.show-student-details');
                box.html(r.html);
                scrollToDiv(box);
            }
            showResponseError(r);
        });
    })
    $(document).on('submit', '.student-examination-form', function (e) {
        e.preventDefault();
        var box = $(this).closest('section').find('.student-examination-data-response');

        // alert(3);
        $.AryaAjax({
            url: 'website/student_examination_form_verification',
            data: new FormData(this),
        }).then((res) => {
            log(res);
            if (res.status) {
                // var box = $('.show-student-details');
                box.html(res.html);
                box.find('select').mySelect2()
                scrollToDiv(box);
            }
            showResponseError(res)
        });
    })
    $(document).on('submit', '.submit-examination-form', function (ee) {
        ee.preventDefault();
        var box = $(this).closest('section').find('.student-examination-data-response');
        $.AryaAjax({
            url: 'website/student_examination_form_submit',
            data: new FormData(this),
        }).then((res) => {
            // log(res)
            if (res.status) {
                box.html(`<div class="alert alert-success">${res.html}</div>`);
            }
            showResponseError(res);
        });
    })
    $(document).on('submit', '.student-result-verification-form', function (e) {
        var box = $(this).closest('section').find('.show-student-details');
        box.html('');
        // alert(0);
        e.preventDefault();
        $.AryaAjax({
            url: 'website/student-result-verification',
            data: new FormData(this)
        }).then((r) => {
            log(r);
            if (r.status) {
                // var box = $('.show-student-details');
                box.html(r.html);
                scrollToDiv(box);
            }
            showResponseError(r);

        });
    });
    $(document).on('submit', '.student-registration-form-verification', function (e) {
        e.preventDefault();
        // alert(2);
        var form = $(this)[0];
        var data = new FormData(this);
        $.AryaAjax({
            url: 'website/student-registration-form-verification',
            data: data
        }).then((res) => {
            if (res.status) {
                form.reset();
                window.open(res.url, '_blank');
            }
            else
                SwalWarning('Notice!', res.message);
        });
    })
    $(document).on('submit', '.iso-form-verification', function (e) {
        e.preventDefault();
        // alert(2);
        var form = $(this)[0];
        var data = new FormData(this);
        $.AryaAjax({
            url: 'website/iso-verification',
            data: data
        }).then((res) => {
            if (res.status) {
                form.reset();
                window.open(res.url, '_blank');
            }
            else
                SwalWarning('Notice!', res.html);
        });
    })
    // alert();
    $(document).on('change', '.admission-center', function () {
        var center_id = $(this).val();
        var roll_no_box = $(this).closest('form').find('[name="roll_no"]');
        var course_box = $(this).closest('form').find('[name="course_id"]');
        $.AryaAjax({
            url: 'website/genrate-rollno-for-admission',
            data: { center_id }
        }).then((res) => {
            if (res.status) {
                roll_no_box.val(res.roll_no);
                var options = '<option value=""></option>';
                if (res.courses.length) {
                    $.each(res.courses, function (index, course) {
                        options += `<option value="${course.course_id}" 
                                        data-kt-rich-content-subcontent="${course.duration} ${course.duration_type}"
                                        data-fee="${course.course_fee}"
                                        >${course.course_name}</option>`;
                    });
                }
                course_box.html(options).select2({
                    placeholder: "Select a Course",
                    templateSelection: frontCourseOptions,
                    templateResult: frontCourseOptions,
                });
            }
            else {
                roll_no_box.val('');
                SwalWarning('This Center have not roll_no Prefix , Please Assign it.');
            }
        });
    });
    $(document).on('click', '.print-btn', function (e) {
        e.preventDefault();
        window.print();
    })
    $(document).on('submit', '.student-registration-certificate-form', function (e) {
        e.preventDefault();
        var that = this;
        $.AryaAjax({
            url: $(this).attr('action'),
            data: new FormData(that),
        }).then((res) => {
            // log(res);
            if (res.status) {
                SwalSuccess(`Registration No. is ${res.registration_no}`, 'Your data submitted Successfully');
                that.reset();
            }
            showResponseError(res);
        });
    })

    $(document).on('submit', '.student-admission-form', function (e) {
        e.preventDefault();
        $.AryaAjax({
            url: 'website/student-admission',
            data: new FormData(this),
        }).then((r) => {
            // log(r);
            if (r.status) {
                mySwal('Admission Successfully..', r.message).then((res) => {
                    // log(res);
                    if (res.isConfirmed) {
                        // location.reload();
                        location.href = r.url;
                    }
                });
                // location.href = r.url;
            }
            showResponseError(r);
        });
    })

    $(document).on('submit', '.center-verification-form', function (r) {
        r.preventDefault();
        var box = $('.show-center-details');
        box.html('');
        $.AryaAjax({
            url: 'website/center-verification',
            data: new FormData(this)
        }).then((res) => {
            // log(res);
            if (res.status) {
                if (res.status == 'yes') {
                    box.html(res.html);
                    scrollToDiv(box);
                }
                else
                    SwalWarning('Notice', 'This Franchise does not verified..');
            }
            else
                SwalWarning('Notice', 'This Institute ID does not exists..');
        });
    })
    $(document).on('submit', '#add_center_form', function (r) {
        r.preventDefault();

        $.AryaAjax({
            url: 'website/add-center',
            data: new FormData(this)
        }).then((res) => {
            // log(res);
            if (res.status) {
                SwalSuccess('Added', 'Registration Successfully..');
                location.reload();
            }
            showResponseError(res);
        });
    });
    $(document).on('keyup', '#add_center_form [name="institute_name"]', function () {
        var roll_no = generateRollNumberPrefix(this.value);
        // console.log(roll_no);

        // Extract the last two digits
        var lastTwoDigits = String(currentYear()).slice(-2);
        var newRoll = roll_no + '' + lastTwoDigits + '000';
        if (roll_no == '')
            newRoll = '';
        $(document).find('#add_center_form [name="rollno_prefix"]').val(newRoll);
    })
    $(document).ready(function () {
        $('.generate-new-password-link').click(function () {
            Swal.fire({
                title: 'Enter your phone number:',
                input: 'number',
                inputAttributes: {
                    autocapitalize: 'off'
                },
                showCancelButton: true,
                confirmButtonText: 'Send OTP',
                showLoaderOnConfirm: true,
                preConfirm: (phoneNumber) => {
                    return new Promise((resolve, reject) => {

                        $.ajax({
                            url: ajax_url + 'website/verify_student_phone_for_reset_password',
                            type: 'POST',
                            dataType: 'json',
                            data: {
                                phoneNumber: phoneNumber
                            },
                            success: function (response) {
                                // log(response);
                                if (response.status != 'success') {
                                    Swal.showValidationMessage(`The Mobile number is not found..`)
                                }
                                resolve();
                            }
                        });

                    });
                },
                allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'OTP Sent!',
                        text: 'Please check your phone for the OTP.',
                        icon: 'success',
                        confirmButtonText: 'Enter OTP'
                    }).then(() => {
                        Swal.fire({
                            title: 'Enter OTP:',
                            input: 'text',
                            inputAttributes: {
                                autocapitalize: 'off'
                            },
                            showCancelButton: true,
                            confirmButtonText: 'Verify OTP',
                            showLoaderOnConfirm: true,
                            preConfirm: (otp) => {
                                return new Promise((resolve, reject) => {
                                    $.ajax({
                                        url: ajax_url + 'website/generate_new_password_link',
                                        type: 'POST',
                                        data: { otp: otp, phoneNumber: result.value },
                                        dataType: 'json',
                                        success: function (response) {
                                            // log(response)
                                            if (response.status != 'success') {
                                                Swal.showValidationMessage(`Invalid Otp.`)
                                            }
                                            resolve(response);
                                        },
                                        error: function (a, b, c) {
                                            log(a.responseText)
                                        }
                                    })
                                });
                            },
                            allowOutsideClick: () => !Swal.isLoading()
                        }).then((otpResult) => {
                            // log(otpResult);
                            if (otpResult.isConfirmed) {
                                Swal.fire('Verified!', 'Redirect To Create A New Password.', 'success').then((e) => {
                                    location.href = otpResult.value.url;
                                });
                            }
                        });
                    });
                }
            });
        });
        $('.login-with-otp').click(function () {
            Swal.fire({
                title: 'Enter your phone number:',
                input: 'number',
                inputAttributes: {
                    autocapitalize: 'off'
                },
                showCancelButton: true,
                confirmButtonText: 'Send OTP',
                showLoaderOnConfirm: true,
                preConfirm: (phoneNumber) => {
                    return new Promise((resolve, reject) => {

                        $.ajax({
                            url: ajax_url + 'website/verify_student_phone',
                            type: 'POST',
                            dataType: 'json',
                            data: {
                                phoneNumber: phoneNumber
                            },
                            success: function (response) {
                                // log(response);
                                if (response.status != 'success') {
                                    Swal.showValidationMessage(`The Mobile number is not found..`)
                                }
                                resolve();
                            },
                            error: function (xhr, error, status) {
                                log(xhr.responseText)
                            }
                        });

                    });
                },
                allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'OTP Sent!',
                        text: 'Please check your phone for the OTP.',
                        icon: 'success',
                        confirmButtonText: 'Enter OTP'
                    }).then(() => {
                        Swal.fire({
                            title: 'Enter OTP:',
                            input: 'text',
                            inputAttributes: {
                                autocapitalize: 'off'
                            },
                            showCancelButton: true,
                            confirmButtonText: 'Verify OTP',
                            showLoaderOnConfirm: true,
                            preConfirm: (otp) => {
                                return new Promise((resolve, reject) => {
                                    $.ajax({
                                        url: ajax_url + 'website/verify_login_otp',
                                        type: 'POST',
                                        data: { otp: otp, phoneNumber: result.value },
                                        dataType: 'json',
                                        success: function (response) {
                                            // log(response);
                                            if (response.status != 'success') {
                                                Swal.showValidationMessage(`Invalid Otp.`)
                                            }
                                            resolve();
                                        }
                                    })
                                });
                            },
                            allowOutsideClick: () => !Swal.isLoading()
                        }).then((otpResult) => {
                            if (otpResult.isConfirmed) {
                                Swal.fire('Verified!', 'Your phone number has been verified, Redirect to Your Dashboard Click to Ok', 'success').then((e) => {
                                    if (e.isConfirmed) {
                                        location.reload();
                                    }
                                });
                            }
                        });
                    });
                }
            });
        });
    });

    $(document).on('submit', '.seach-study-center-form', function (r) {
        r.preventDefault();
        var box = $('.list-study-centers');
        box.html('');
        $.AryaAjax({
            url: 'website/seach-study-center-list',
            data: new FormData(this)
        }).then((res) => {
            if (res.status) {
                box.html(res.html).find('table').DataTable({
                    dom: small_dom,
                    columnDefs: [
                        {
                            targets: 0,
                            orderable: false,
                            render: function (image) {
                                return `<img src="${base_url}upload/${image}" style="width:100px">`;
                            }
                        }
                    ]
                });
                scrollToDiv(box);
            }
            else
                SwalWarning('Notice', 'No Record Found.');
        });
    });
    $(document).on('submit', '.student-login-form', function (r) {
        r.preventDefault();
        $.AryaAjax({
            url: 'website/student-login-form',
            data: new FormData(this)
        }).then((res) => {
            showResponseError(res);
            // log(res)
            if (res.status) {
                mySwal(`Welcome <b>${res.student_name}</b>`, 'Student Login Successfully.').then((r) => {
                    if (r.isConfirmed) {
                        location.href = `${base_url}student/dashboard`;
                    }
                })
            }
        });
    });
    // $(document).on('submit', '.student-admit-card-form', function (e) {
    //     e.preventDefault();
    //     $.AryaAjax({
    //         url: 'website/admit-card',
    //         data: new FormData(this)
    //     }).then((r) => {
    //         if (r.status) {
    //             window.open(r.url, "_blank");
    //         }
    //         showResponseError(r);
    //     });
    // })
    $(document).on('submit', '.student-admit-card-form', function (e) {
        e.preventDefault();

        var box = $(this).closest('section').find('.show-student-details');
        box.html('');

        $.AryaAjax({
            url: 'website/admit-card',
            data: new FormData(this)
        }).then((r) => {
            if (r.status) {
                // window.open(r.url, "_blank");
                box.html(r.html);
                scrollToDiv(box);
            }
            showResponseError(r);
        });
    })
    $(document).on('submit', '.student-certificate-form', function (e) {
        e.preventDefault();
        $.AryaAjax({
            url: 'website/certificate',
            data: new FormData(this)
        }).then((r) => {
            if (r.status) {
                window.open(r.url, "_blank");
            }
            showResponseError(r);
        });
    });

    const syllabusTable = $('#syllabus-table-front');
    if (syllabusTable.length) {
        syllabusTable.DataTable({
            dom: "<'row'" +
                "<'col-sm-6 d-flex align-items-center justify-conten-start'>" +
                "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
                ">" +
                "<tr>" +
                "<'row'" +
                "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'>" +
                "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
                ">",
            ajax: {
                url: ajax_url + 'website/list-syllabus'
            },
            columns: [
                { 'data': null },
                { 'data': 'title' },
                { 'data': 'file' },
                { 'data': null },
            ],
            columnDefs: [
                {
                    targets: 0,
                    render: function (data, type, row, meta) {
                        // log(meta);
                        return `${meta.row + 1}.`;
                    }
                },
                {
                    targets: 2,
                    orderable: false,
                    render: function (data, type, row) {
                        return `<a href="${base_url}upload/${data}" target="_blank">${data}</a>`;
                    }
                },
                {
                    targets: -1,
                    render: function (data, type, row) {
                        return `<div class="btn-wrapper btn-wrapper2">
                                    <a class="btn btn-outline-success" href="${base_url}upload/${row.file}" target="_blank" download="${row.title}-${row.file}"><span><i class="fa fa-download"></i> Download</span></a>
                                </div>`;
                    }
                }
            ]
        });
    }

    /*===================================*
      08. CONTACT FORM JS
      *===================================*/
    $(document).on("submit", "#submitGETINTOUCH", function (event) {
        event.preventDefault();
        var mydata = $(this).serialize();
        $.AryaAjax({
            url: 'website/contact-us-action',
            data: new FormData(this),
            success_message: 'Query Submitted Successfully..',
            page_reload: true
        })
        /*
        $.ajax({
          type: "POST",
          dataType: "json",
          url: ajax_url+"website/contact-us-action",
          data: mydata,
          success: function (data) {
            if (data.type === "error") {
              $("#alert-msg").removeClass("alert-msg-success");
              $("#alert-msg").addClass("alert-msg-failure");
            } else {
              $("#alert-msg").addClass("alert-msg-success");
              $("#alert-msg").removeClass("alert-msg-failure");
              $("#first-name").val("Enter Name");
              $("#email").val("Enter Email");
              $("#phone").val("Enter Phone Number");
              $("#subject").val("Enter Subject");
              $("#description").val("Enter Message");
            }
            $("#alert-msg").html(data.msg);
            $("#alert-msg").show();
          },
          error: function (xhr, textStatus) {
            alert(textStatus);
            log(xhr.responseText);
          },
        });*/
    });
    const myDataTable = $('.my-data-table');
    if (myDataTable) {
        myDataTable.DataTable({
            dom: small_dom,
            "pagingType": "full_numbers",
            "language": {
                "paginate": {
                    "first": "First",
                    "last": "Last",
                    "next": "Next",
                    "previous": "Previous"
                }
            }
        });
    }
});