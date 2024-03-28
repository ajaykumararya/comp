document.addEventListener('DOMContentLoaded', function (e) {
    const add_form = document.getElementById('create-marksheet');
    const institue_box = $('select[name="center_id"]');
    const student_box = $('select[name="student_id"]');
    const course_id = $('input[type="hidden"][name="course_id"]');
    const course_duration = $('input[type="hidden"][name="course_duration"]');
    const course_duration_type = $('input[type="hidden"][name="course_duration_type"]');
    const duration = $('select[name="duration"]');
    const admit_card_id = $('#admit_card_id');
    const marks_table = $('.marks_table');
    const button = $('#publish_btn');
    /*
    const table = $("#list-admit-card").DataTable({
        dom: small_dom,
        'ajax': {
            'url': ajax_url + 'student/list-marksheets',
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
                target : 2,
                render : function(data,type,row){
                    var badgeClass = duration_badge(row.duration_type, duration_colors);//) ? duration_colors[row.duration_type] : 'danger';
                        var myduration = `<lable class="badge badge-${badgeClass}"> ${course_duration_humnize_without_ordinal(row.duration,row.duration_type)}</lable>`;//row.duration+ ` </>`;
                    return `${data} ${myduration} `;
                }
            },
            {
                target : 3,
                render : function(data,type,row){
                    return `${ordinal_number(data)} ${ $.ucfirst(row.duration_type)} 
                            ${row.duration == row.admit_card_duration ? badge('Final Admit Card','success text-black') : ''}
                        `;
                }
            },
            {
                target: -1,
                orderable : false,
                render: function (data, type, row) {
                    // generateSHA1Hash(row.admit_card_id).then( (admit_card_id) => {
                    return generate_link_btn(row.admit_card_id,'admit_card');
                    // });
                    // return '';
                }
            }
        ]
    });*/
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
                    'marks[][]': {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter Number..'
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

        $(document).on('submit', '#create-marksheet', function (e) {
            // Prevent default button action
            e.preventDefault();
            var that = this;
            // Validate form before submit
            if (validator) {
                // console.log(validator);
                validator.validate().then(function (status) {
                    // console.log(validator);
                    var formData = serializeFormToObject(that); //new FormData('#admit_card_form');
                    var subject_total = parseInt($('.subject-ttl-marks').val());
                    var ttl = parseInt($('.ttl-marks').val());
                    // log(formData);
                    // return false;
                    if (status == 'Valid') {
                        var index = 0;
                        $('.cal-marks').each(function (i, v) {
                            var td = ($(this).closest('td'));
                            $(td).find(".message").remove();
                            if ($(this).val() == '') {
                                // alert('Enter Marks');
                                index++;
                                $(td).append('<div class="text-danger message">Please Enter a valid Subject mark.</div>');

                            }
                        })
                        if (!index && subject_total > ttl) {
                            $.AryaAjax({
                                url : 'student/create-marksheet',
                                data : new FormData(that),
                                success_message : 'Marksheet Created Successfully..',
                                page_reload : true
                            }).then( (r) => log(r));
                        }
                        else
                            toastr.error('Please Enter a valid Subject mark.');
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
            marks_table.html('');
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
            marks_table.html('');

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
                admit_card_id.val('');
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
                    url: 'student/marksheet-validation'
                }).then((rs) => {
                    log(rs);
                    admit_card_id.val(rs.admit_card_id);
                    if (rs.options.length) {
                       
                        $.each(rs.options, (i, d) => {
                            duration.append(`
                                <option
                                 data-admit_card_id="${rs.admit_card_id}"
                                value="${d.id}"
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

        duration.on('change', function () {
            var duration = $(this).val();
            marks_table.html('');
            var admit_card_id =  $(this).find('option:selected').data('admit_card_id');
            $('input[name="admit_card_id"]').val( );
            if (duration) {
                $.AryaAjax({
                    data: {
                        course_id: course_id.val(),
                        duration: duration,
                        duration_type: course_duration_type.val(),
                    },
                    url: 'student/print-mark-table',
                    loading_message: 'Please wait, Loading marks table..'
                }).then((res) => {
                    // log(res);
                    marks_table.html(res.marks_table).find('input[name="admit_card_id"]').val(admit_card_id);
                });
            }
        });

        const cal_marks = () => {

            var ttl = 0;
            var subject_total = $('.subject-ttl-marks').val();
            //var body = $('.marks-body');
            $('.cal-marks').each(function (i, v) {
                if ($(v).val())
                    ttl += parseInt($(v).val());
            });
            $('.total-marks').text(ttl);
            $('.ttl-marks').val(ttl);
            //body.find('.message').remove();
            if (subject_total < ttl) {
                button.prop('disabled', true);
                ///body.append('<div class="alert message alert-danger">Please Enter Valid Subject Numbers</div>')
            }
            else {
                button.prop('disabled', false);
            }

        }
        $(document).on("keyup change", '.cal-marks', function () {
            var td = $(this).closest('td');

            $(td).find(".message").remove();
            var ttl = 0;
            var subject_total = $('.subject-ttl-marks').val();
            //var body = $('.marks-body');
            $('.cal-marks').each(function (i, v) {
                if ($(v).val())
                    ttl += parseInt($(v).val());
            });
            toastr.clear();
            if (!validateAmount(this.value) && this.value != '' || subject_total < ttl) {
                // button.prop('disabled', false);

                toastr.error('Please Enter a valid Subject mark.');
                $(td).append('<div class="text-danger message">Please Enter a valid Subject mark.</div>');
                // return false;
            }
            cal_marks();
        });



        if (login_type == 'center') {
            institue_box.trigger("change");
        }
    }
    button.prop('disabled', true);
});
