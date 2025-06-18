document.addEventListener('DOMContentLoaded', function (e) {
    const form = document.getElementById('upload_study_material');
    const study_table = $('#study-table');
    const institue_box = $('select[name="center_id"]');
    const course_box = $('select[name="course_id"]');
    const validation = MyFormValidation(form);
    const file_type = $('select[name="file_type"]');

    file_type.on('change', function () {
        // alert(this.value);
        if (this.value == 'file') {
            $('.file').removeClass('d-none').find('input').attr('required', 'required');
            $('.youtube').addClass('d-none').find('input').removeAttr('required');;
        }
        else {
            $('.youtube').removeClass('d-none').find('input').attr('required', 'required');
            $('.file').addClass('d-none').find('input').removeAttr('required');
        }
    })
    // select2Student('select[name="student_id"]');
    validation.addField('title', {
        validators: {
            notEmpty: { message: 'Please Enter A Name' }
        }
    });
    validation.addField('center_id', {
        validators: {
            notEmpty: { message: 'Please Select Center' }
        }
    });
    validation.addField('course_id', {
        validators: {
            notEmpty: { message: 'Please Select a course' }
        }
    });
    study_table.DataTable({
        ajax: {
            url: ajax_url + 'student/list-study-material'
        },
        column: [
            { 'data': null },
            { 'data': null },
            { 'data': null },
            { 'data': null }
        ],
        columnDefs: [
            {
                targets: 0,
                render: function (data, type, row) {
                    return `${row.course_name} `;
                }
            },
            {
                targets: 1,
                render: function (data, type, row) {
                    return row.title;
                }
            },
            {
                targets: 2,
                render: function (data, type, row) {
                    if (row.file_type == 'youtube') {
                        var url = row.file;
                        const youtubeRegex = /(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:watch\?v=|embed\/|shorts\/)|youtu\.be\/)([a-zA-Z0-9_-]{11})/;

                        const match = url.match(youtubeRegex);

                        // If URL matches the regex, extract the video ID and filter it
                        if (match) {
                            const videoId = match[1];
                            return `<a href="${base_url}assets/youtube/${videoId}" target="_blank" class="btn btn-info btn-xs btn-sm"><i class="fa fa-eye"></i> File</a>`;

                        }
                    }
                    else
                        return `<a href="${base_url}assets/student-study/${row.material_id}/preview" target="_blank" class="btn btn-info btn-xs btn-sm"><i class="fa fa-eye"></i> File</a>`;
                }
            },
            {
                targets: -1,
                render: function (data, type, row) {
                    return `
                            ${deleteBtnRender(1, row.material_id, 'Study Material')}
                            `;
                }
            },
        ]
    }).on('draw', function (r) {
        handleDeleteRows('student/delete-study-material');
        study_table.find('.assign').on('click', function () {
            var rowData = study_table.DataTable().row($(this).closest('tr')).data();
            //    log(rowData);
            //    return false;
            $.AryaAjax({
                url: 'student/list-assign-students',
                data: rowData
            }).then((r) => {
                log(r)
                if (r.status) {
                    var drawer = mydrawer('Study Material');
                    drawer.find('.card-body').html(r.html).css({
                        paddingTop: 0
                    });
                    drawer.find('.table').DataTable({
                        paging: false,
                        dom: small_dom
                    });
                    drawer.find('.form-check-input').on('change', function () {
                        var checkStatus = $(this).is(':checked') ? 1 : 0;
                        // log(checkStatus);
                        $.AryaAjax({
                            url: 'student/study-assign-to-student',
                            data: {
                                student_id: $(this).val(),
                                material_id: rowData.material_id,
                                center_id: $(this).data('center_id'),
                                check_status: checkStatus
                            }
                        }).then((e) => {
                            log(e);
                            toastr.clear();
                            if (e.status)
                                toastr.success(`Study Material ${checkStatus ? 'Assigned' : 'Removed'} Successfully..`);
                            else
                                toastr.error('Something Went Wrong!');
                        });
                    })
                }
                else {
                    // alert(4);
                    SwalWarning('Alert', 'Students are not found on this Institute..');
                }
            })
        })
    });
    form.addEventListener('submit', (r) => {
        r.preventDefault();
        var file = $('#file')[0].files[0];
        file = file_type.val() == 'file' ? file : null;
        $.AryaAjax({
            url: 'student/upload-study-material',
            file: file,
            data: new FormData(form),
            validation: validation,
        }).then((s) => {
            log(s);
            showResponseError(s);
            if (s.status)
                study_table.DataTable().ajax.reload();
        });
    })
    institue_box.change(function () {
        var center_id = $(this).val();
        // alert(center_id);
        course_box.html('');
        $.AryaAjax({
            url: 'student/genrate-a-new-rollno-with-center-courses',
            data: { center_id },
            dataType: 'json'
        }).then(function (res) {
            // log(res);
            if (res.status) {
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
                SwalWarning('This Center have not Courses , Please Assign it.');
            }
        }).catch(function (a) {
            console.log(a);
        });
    }).select2({
        placeholder: "Select a Center",
        templateSelection: optionFormatSecond,
        templateResult: optionFormatSecond,
    });
    if (login_type == 'center') {
        institue_box.trigger("change");
    }
    // study_table.DataTable();


});
