document.addEventListener('DOMContentLoaded', function (e) {
    const form = document.getElementById('upload_study_material');
    const study_table = $('#study-table');
    const institue_box = $('select[name="center_id"]');
    const course_box = $('select[name="course_id"]');
    const validation = MyFormValidation(form);
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
            notEmpty: { message: 'Please Select a course' },
        }
    });
    validation.addField('file', {
        validators: {
            notEmpty: { message: 'Please Select A File' },
            file: {
                extension: 'jpg,jpeg,png,gif,pdf',
                type: 'image/jpeg,image/png,image/gif,application/pdf',
                maxSize: 10485760, // 5 MB
                message: 'The selected file is not valid. Allowed types: jpg, jpeg, png, gif and pdf. Maximum size: 10 MB.'
            }
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
                    return `${row.course_name} ${(login_type == 'admin' ? `<div class="d-flex"><label class="badge badge-info ">${row.institute_name}</label></div>` : ``)} `;
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
                    return `<button class="btn btn-info btn-xs btn-sm btn-action"><i class="fa fa-eye"></i> File</button>`;
                }
            },
            {
                targets: -1,
                render: function (data, type, row) {
                    return `
                            <div class="btn-group">
                                <button class="btn btn-sm btn-xs btn-info assign">
                                    <i class="ki-duotone fs-2 ki-user-tick ">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                    Assign To Students
                                </button>
                            </div>
                            ${deleteBtnRender(1, row.material_id, 'Study Material')}
                            `;
                }
            },
        ]
    }).on('draw', function (r) {
        handleDeleteRows('student/delete-study-material');
        // study_table.find('.btn-action');

        study_table.find('.btn-action').on('click', function () {
            var rowData = study_table.DataTable().row($(this).closest('tr')).data();

            var id = rowData.material_id;//$(this).data('id');
            // alert(id);
            // alert(3);
            $.AryaAjax({
                url: 'website/study_material_link',
                data: { id, 'status': 'ISADMIN' }
            }).then((tt) => {
                // log(tt);
                window.open(`${base_url}student/study-material/${tt.token}`, "_blank");
            });
        })
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
        const regex = /^[a-zA-Z0-9_.-]+$/;
        if(!regex.test(file.name)){
            SwalWarning('Notice','File names cannot contain special characters or spaces.');
            return  // Return true if valid
        }
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
