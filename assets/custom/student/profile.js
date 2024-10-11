document.addEventListener('DOMContentLoaded', function (d) {
    const update_profile = document.getElementById('save-student-data');
    const course_box = $('select[name="course_id"]');
    select2Student('select[name="student_id"]');
    const search = $('.search');
    search.on('click', function () {
        var box = $(this).closest('.menu');
        box.find('.message').html('');
        var searchValue = $('.get-std-id').val();
        
        if(searchValue == ''){
            box.find('.message').html(badge('Please Select An Student.','danger'));
            return;
        }
        if (searchValue == uri_segment(3, 0)) {
            box.find('.message').html(badge('This student\'s profile is already open.', 'danger'));
            return;
        }
        SwalShowloading();
        var url = `${base_url}student/profile/${searchValue}/${uri_segment(4)}`;
        if (box.find('#openNEwTab:checked').val()){
            window.open(url, '_blank');
            SwalHideLoading();
        }
        else
            window.location.href = url;
        // location.href = ;
    })
    if (update_profile) {
        var validation = MyFormValidation(update_profile);
        validation.addField('name', {
            validators: {
                notEmpty: { message: 'Enter Student Name.' }
            }
        });
        validation.addField('alternative_mobile', {
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
        });
        validation.addField('contact_number', {
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
        });
        validation.addField('father_name', {
            validators: {
                notEmpty: {
                    message: 'Please enter father name.'
                }
            }
        });
        validation.addField('mother_name', {
            validators: {
                notEmpty: {
                    message: 'Please enter mother name.'
                },
            }
        });
        // validation.addField('email', {
        //     validators: {
        //         regexp: {
        //             regexp: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
        //             message: "The value is not a valid email address",
        //         },
        //         notEmpty: { message: "Email address is required" },
        //     },
        // });
        validation.addField('address', {
            validators: {
                notEmpty: {
                    message: 'Address is required'
                },
            }
        });
        validation.addField('dob', {
            validators: { notEmpty: { message: 'Date of Birth is requried' } }
        })
        validation.addField('pincode', {
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
        });
        $(document).on('submit', '.save-student-data', function (r) {
            r.preventDefault();
            $.AryaAjax({
                url: 'website/update-stuednt-basic-details',
                data: new FormData(this),
                success_message: 'Profile Data Updated Successfully..',
                validation: validation
            }).then((d) => {
                if (d.status) {
                    $.each(d.student_data, function (i, v) {
                        if (i == 'status') {
                            if (v)
                                $(`.student-${i}`).addClass('d-none')
                            else
                                $(`.student-${i}`).removeClass('d-none')
                        }
                        else
                            $(`.student-${i}`).text(v);
                    });
                }
            });
        })
    }
    const fee_record = $("#fee-record");
    if (fee_record) {
        var dt = fee_record.DataTable({
            columnDefs: [
                // {
                //     targets: 2,
                //     render: function (ac, b, c) {
                //         return `<div class="d-flex align-items-center flex-wrap">
                //                     <div class="fs-2 fw-bold me-5" id="payment_id_${ac}">${ac}</div>
                //                     <button class="btn btn-icon btn-sm btn-light copy-text list-payment_id" data-text="${ac}">
                //                         <i class="ki-duotone ki-copy fs-2 text-muted"></i>
                //                     </button>
                //                 </div>`;
                //     }
                // },
                {
                    targets: 3,
                    render: function (ad, b, c) {
                        return `${inr} ${ad} `;
                    }
                }
            ],
            "footerCallback": function (row, data, start, end, display) {
                var api = this.api(),
                    data;
                // Remove the formatting to get integer data for summation
                var intVal = function (i) {
                    return typeof i === "string" ?
                        i.replace(/[\$,]/g, "") * 1 :
                        typeof i === "number" ?
                            i : 0;
                };
                // Total over all pages
                var total = api
                    .column(3)
                    .data()
                    .reduce(function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);
                // Total over this page
                var pageTotal = api
                    .column(3, {
                        page: "current"
                    })
                    .data()
                    .reduce(function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);
                // Update footer
                $(api.column(3).footer()).html(
                    // "$" + pageTotal + " ( $" + total + " total)"
                    `${inr} ${pageTotal} ( ${inr} ${total} Total )`
                );
            }
        }).on('draw', function (e) {
        });
        // log(dt);
    }
    $(document).on('change', '.upload-student-docs', function () {
        var id = $(this).closest('table').data('id');
        var fileInput = this;
        var file = fileInput.files[0];

        if (!file) {
            SwalWarning('Please Choose a valid file.');
            return;
        }

        var formData = new FormData();

        formData.append('file', file);
        formData.append('student_id', id);
        formData.append('name', $(fileInput).attr('name'));

        Swal.fire({
            title: 'Uploading...',
            html: '0%',
            allowOutsideClick: false,
            showConfirmButton: false,
            willOpen: () => {
                $.ajax({
                    url: ajax_url + 'website/update-student-docs', // Change this to your upload endpoint
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    xhr: function () {
                        var xhr = new window.XMLHttpRequest();
                        xhr.upload.addEventListener("progress", function (evt) {
                            if (evt.lengthComputable) {
                                var percentComplete = evt.loaded / evt.total * 100;
                                Swal.getContent().querySelector('p').innerHTML = percentComplete.toFixed(2) + '%';
                            }
                        }, false);
                        return xhr;
                    },
                    success: function (response) {
                        console.log(response);
                        if (response.status) {
                            // SwalSuccess('Uploaded','File Uploaded Successfully').then( (r) => {
                            //     if(r.isConfirmed){
                            location.reload();
                            //     }
                            // })
                        }
                        Swal.close();
                    },
                    error: function (xhr, status, error) {
                        Swal.close();
                        // Handle error
                        console.error(xhr.responseText);
                    }
                });
            }
        });
    });
    $(document).on('submit', '.change-student-password', function (re) {
        re.preventDefault();
        $.AryaAjax({
            url: 'website/update-stuednt-password',
            data: new FormData(this),
            success_message: 'Password Updated Successfully.',
            page_reload: true
        }).then((r) => showResponseError(r));
    });
    $(document).on('submit', '.update-student-batch-and-roll-no', function (e) {
        e.preventDefault();
        $.AryaAjax({
            url: 'website/update-student-batch-and-roll_no',
            data: new FormData(this),
            success_message: 'Student Updated Successfully.',
            page_reload: true
        }).then((r) => showResponseError(r));
    });
    $(document).on('click', '.edit-fee-record', function () {
        var fee_id = $(this).data('fee_id');
        $.AryaAjax({
            url: 'website/edit-fee-record',
            data: { fee_id },
        }).then((r) => {
            ki_modal.find('.modal-dialog').addClass('modal-lg');
            myModel('Edit Fee Record', r.html, 'website/update-fee-record').then((r) => {
                if (r.status) {
                    location.reload();
                }
            });
        });
    });
    $(document).on('click', '.delete-fee-record', function () {
        var fee_id = $(this).data('fee_id');
        SwalWarning('Confirmation!', 'Are you sure for delete fee record', true, 'Yes').then((e) => {

            if (e.isConfirmed) {
                $.AryaAjax({
                    url: 'website/delete-fee-record',
                    data: { fee_id },
                    page_reload: true,
                    success_message: 'Fee Record Deleted Successfully..'
                })
            }
        })
    })
    $(document).on('click', '.print-receipt', function () {
        var payment_id = $(this).data('fee_id');
        $.AryaAjax({
            url: 'website/print-fee-record',
            data: { payment_id },
        }).then((res) => {
            var drawerEl = document.querySelector("#kt_drawer_example_advanced");
            drawerEl.setAttribute('data-kt-drawer-width', "{default:'300px', 'md': '900px'}");
            var drawer = KTDrawer.getInstance(drawerEl);
            // drawer.trigger(drawer, "kt.drawer.show"); // trigger show drawer
            drawer.update();
            drawer.show();
            var
                main = $('#kt_drawer_example_advanced'),
                body = main.find('.card-body'),
                title = main.find('.card-title');
            // console.log(title);
            title.html('Fee Receipt');
            body.html(res.html).find('button').on('click', function () {
                // alert(9);
                var content = $(this).closest('.card-body').clone();
                content.find('button').remove();
                content = content.html();

                var newWindow = window.open('', '_blank');
                newWindow.document.open();
                newWindow.document.write(`<html><head><title>Print Receipt</title>`);
                newWindow.document.write(`<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">`);
                // await newWindow.document.write(`<link href="${base_url}assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css">`);
                // await newWindow.document.write(`<link href="${base_url}assets/css/style.bundle.css" rel="stylesheet" type="text/css">`);
                newWindow.document.write(`</head><body style="padding:20px">${content}</body></html>`);

                newWindow.document.close();
                newWindow.print();
                // newWindow.close();
            });
        });
    });

    course_box.select2({
        placeholder: "Select a Course",
        templateSelection: optionFormatSecond,
        templateResult: optionFormatSecond
        ,
    });
})
