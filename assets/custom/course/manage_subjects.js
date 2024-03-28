document.addEventListener('DOMContentLoaded', function (e) {

    const subject_type = $('input[name="subject_type"]');
    const add_form = document.getElementById('subject_add');
    const list_subjects = $('#list-subjects');
    // console.log(add_form);
    if (add_form) {
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        var validator = FormValidation.formValidation(
            add_form,
            {
                fields: {
                    course_id: {
                        validators: {
                            notEmpty: {
                                message: "Select a course"
                            }
                        }
                    },
                    duration: {
                        validators: {
                            notEmpty: {
                                message: 'Select a duration'
                            }
                        }
                    },
                    subject_name: {
                        validators: {
                            notEmpty: {
                                message: 'Subject Name is required'
                            }
                        }
                    },
                    subject_code: {
                        validators: {
                            notEmpty: {
                                message: 'Subject Code is required'
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

        add_form.addEventListener('submit', function (e) {
            // Prevent default button action
            e.preventDefault();
            var submitButton = $(this).find('button');

            // Validate form before submit
            if (validator) {
                // console.log(validator);
                validator.validate().then(function (status) {
                    // console.log(validator);
                    var formData = new FormData(add_form);

                    if (status == 'Valid') {
                        $(submitButton).attr('data-kt-indicator', 'on').prop('disabled', true);

                        axios
                            .post(
                                ajax_url + 'course/add-subject',
                                new FormData(add_form)
                            )
                            .then(function (e) {
                                console.log(e);
                                if (e.data.status) {
                                    add_form.reset(),
                                        Swal.fire({
                                            text: "Subject Submited Successfully.",
                                            icon: "success",
                                            buttonsStyling: !1,
                                            confirmButtonText: "Ok, got it!",
                                            customClass: {
                                                confirmButton: "btn btn-primary",
                                            },
                                        });
                                    list_subjects.DataTable().ajax.reload();
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

    if (list_subjects) {
        var index = 1;
        var dt = list_subjects.DataTable({
            dom: small_dom,
            ajax: {
                url: ajax_url + 'course/list-subjects',

                success: function (d) {
                    // console.log(d);
                    if (d.data && d.data.length) {
                        dt.clear();
                        dt.rows.add(d.data).draw();
                    }
                    else {
                        toastr.error('Table Data Not Found.');
                        DataTableEmptyMessage(list_subjects);
                        SwalWarning('Notice', `                        Subjects not Found..                    `)
                    }
                },
                'error': function (xhr, error, thrown) {
                    // Custom error handling
                    console.log('DataTables Error:', xhr, error, thrown);

                    // Show an alert or a custom message
                    alert('An error occurred while loading data. Please try again.');
                }

            },
            columns: [
                { 'data': null },
                { 'data': 'subject_code' },
                { 'data': 'subject_name' },
                { 'data': 'course_name' },
                { 'data': 'theory_min_marks' },
                { 'data': 'theory_max_marks' },
                { 'data': 'practical_min_marks' },
                { 'data': 'practical_max_marks' },
                { 'data': null },
            ],
            columnDefs: [
                {
                    target: 0,
                    render: function (data,type,row,meta) {
                        return `${meta.row + 1}.`;
                    }
                },
                {
                    targets: 3,
                    render: function (data, type, row) {
                        var badgeClass = duration_badge(row.duration_type, duration_colors);//) ? duration_colors[row.duration_type] : 'danger';
                        var myduration = `<lable class="badge badge-${badgeClass}"> ${course_duration_humnize_without_ordinal(row.subject_duration, row.duration_type)}</lable>`;//row.duration+ ` </>`;

                        return `${data} &nbsp; ${myduration}`;
                    }
                },
                {
                    targets: -1,
                    render: function (data, type, row) {
                        delete row.id;
                        row.id = row.subject_id;
                        return `
                                <button class="btn btn-sm btn-light-info edit-record">
                                    <i class="fa fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-light-danger delete-subject" data-id="${row.subject_id}">
                                    <i class="fa fa-trash"></i>
                                </button>`;
                    }
                }
            ]
        });
        dt.on('draw', function (e) {
            index = 1;
            list_subjects.EditForm('course/edit-subject', 'Edit Subject');
        })
        $(document).on('click', '.delete-subject', function () {
            var id = $(this).data('id');
            $.AryaAjax({
                url: 'course/subject-delete',
                data: { id },
                success_message: 'Suject Deleted Successfully..'
            }).then((f) => list_subjects.DataTable().ajax.reload());
        });
    }

    subject_type.on('change', function () {
        var divclass = (this.value);
        $('.both_box').slideUp('fast');

        $('.' + divclass + '_box').slideDown('fast')
        $('.' + divclass + '_box').find('input:eq(1)').focus();
    });

});