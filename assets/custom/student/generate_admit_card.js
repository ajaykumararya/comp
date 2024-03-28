document.addEventListener('DOMContentLoaded', function (e) {
    const add_form = document.getElementById('admit_card_form');
    const institue_box = $('select[name="center_id"]');
    const student_box = $('select[name="student_id"]');
    const course_id = $('input[type="hidden"][name="course_id"]');
    const course_duration = $('input[type="hidden"][name="course_duration"]');
    const course_duration_type = $('input[type="hidden"][name="course_duration_type"]');
    const duration = $('select[name="duration"]');
    const table = $("#list-admit-card").DataTable({
        dom: small_dom,
        'ajax': {
            'url': ajax_url + 'student/list-admint-cards',
            'type': 'GET',
            success: function (d) {
                // console.log(d);
                if (d.data && d.data.length) {
                    table.clear();
                    table.rows.add(d.data).draw();
                }
                else {
                    toastr.error('Table Data Not Found.');
                    DataTableEmptyMessage(table);
                }
            },
            'error': function (xhr, error, thrown) {
                // Custom error handling
                console.log('DataTables Error:', xhr, error, thrown);
                // Show an alert or a custom message
                alert('An error occurred while loading data. Please try again.');
            }
        },
        'columns': [
            // Specify your column configurations
            { 'data': 'roll_no' },
            { 'data': 'student_name' },
            { 'data': 'course_name' },
            { 'data': 'admit_card_duration' },
            { 'data': 'session' },
            { 'data': 'center_name' },
            { 'data': null }
            // Add more columns as needed
        ],
        'columnDefs': [
            {
                target: 2,
                render: function (data, type, row) {
                    var badgeClass = duration_badge(row.duration_type, duration_colors);//) ? duration_colors[row.duration_type] : 'danger';
                    var myduration = `<lable class="badge badge-${badgeClass}"> ${course_duration_humnize_without_ordinal(row.duration, row.duration_type)}</lable>`;//row.duration+ ` </>`;
                    return `${data} ${myduration} `;
                }
            },
            {
                target: 3,
                render: function (data, type, row) {
                    return `${ordinal_number(data)} ${$.ucfirst(row.duration_type)} 
                            ${row.duration == row.admit_card_duration ? badge('Final Admit Card', 'success text-black') : ''}
                        `;
                }
            },
            {
                target: -1,
                orderable: false,
                render: function (data, type, row) {
                    return `<div class="btn-group">
                
                        ${generate_link_btn(row.admit_card_id, 'admit_card')}
                        ${deleteBtnRender(1, row.admit_card_id, 'Admit Card')}
                        </div>`;
                }
            }
        ]
    }).on('draw', function () {
        handleDeleteRows('student/delete-admit-card')
    });
    // const session_id = $('select[name="session_id"]');
    if (add_form) {
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        var validator = FormValidation.formValidation(
            add_form,
            {
                fields: {
                    center_id: {
                        validators: {
                            notEmpty: {
                                message: "Select a center"
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
                    student_id: {
                        validators: {
                            notEmpty: {
                                message: 'Student is required'
                            }
                        }
                    },
                    session_id: {
                        validators: {
                            notEmpty: {
                                message: 'Session is required'
                            }
                        }
                    },
                    enrollment_no: {
                        validators: {
                            notEmpty: { message: 'Enrollment No is required' }
                        }
                    },
                    exam_date: {
                        validators: {
                            notEmpty: { message: 'Exam Date is required' }
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
        $('#admit_card_form').on('submit', function (e) {
            // Prevent default button action
            e.preventDefault();
            var that = this;
            // Validate form before submit
            if (validator) {
                // console.log(validator);
                validator.validate().then(function (status) {
                    // console.log(validator);
                    var formData = serializeFormToObject(that); //new FormData('#admit_card_form');
                    // log(formData);
                    if (status == 'Valid') {
                        $.AryaAjax({
                            data: formData,
                            url: 'student/create-admint-card',
                            success_message: '<b>Admit Card Generated Successfully..</b>',
                            page_reload: true
                        }).then((res) => {
                            if (!res.status) {
                                SwalWarning(res.html);
                            }
                        });
                    }
                });
            }
        });
        institue_box.select2({
            placeholder: "Select a Center",
            templateSelection: optionFormatSecond,
            templateResult: optionFormatSecond,
        }).on('change', function () {
            // alert('yes');
            var center_id = $(this).val();
            student_box.html(emptyOption);
            course_duration_type.val('');
            course_duration.val('');
            course_id.val('');
            duration.html(emptyOption);
            // session_id.html(emptyOption);
            if (center_id) {
                $.AryaAjax({
                    url: 'student/fetch_student_via_center',
                    data: { center_id }
                }).then((rs) => {
                    // log(rs);
                    if (rs.data.length) {
                        $.each(rs.data, (i, student) => {
                            student_box.append(`
                                    <option 
                                            value="${student.student_id}" 
                                            data-kt-rich-content-subcontent="${student.roll_no}" 
                                            data-kt-rich-content-icon="${student.image}" 
                                            data-course_duration="${student.duration}" 
                                            data-course_duration_type="${student.duration_type}" 
                                            data-course_id="${student.course_id}"
                                            data-course_name="${student.course_name}">
                                            ${student.student_name}
                                    </option>
                                `);
                        })
                        student_box.mySelect2();
                    }
                });
            }
        });
        student_box.on('change', function () {
            const student_id = $(this).val();
            course_duration_type.val('');
            course_duration.val('');
            course_id.val('');
            duration.html(emptyOption);
            // session_id.html(emptyOption);
            if (student_id) {
                const option = $(this).find('option:selected');
                const duration_val = option.data("course_duration");
                const duration_type_val = option.data("course_duration_type");
                const course_id_val = option.data("course_id");
                const course_name = option.data('course_name');
                course_duration_type.val(duration_type_val);
                course_duration.val(duration_val);
                course_id.val(course_id_val);
                // alert(duration_type_val);
                $.AryaAjax({
                    data: {
                        duration: duration_val,
                        duration_type: duration_type_val,
                        course_id: course_id_val,
                        student_id: student_id,
                        center_id: institue_box.val(),
                        course_name: course_name
                    },
                    url: 'student/genrate-admit-card'
                }).then((rs) => {
                    log(rs);
                    if (rs.options.length) {
                        $.each(rs.options, (i, d) => {
                            duration.append(`
                                <option value="${d.id}"
                                    ${d.isCreated ? 'disabled data-subtitle-class="text-danger" ' : ''}
                                    data-kt-rich-content-subcontent="${d.sub_label}">
                                    ${d.label}
                                </option>
                            `);
                        })
                        // duration.append();
                        duration.mySelect2();
                    }
                });
            }
        });
        if (login_type == 'center') {
            institue_box.trigger("change");
        }
    }
});
