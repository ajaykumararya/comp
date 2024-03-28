document.addEventListener('DOMContentLoaded', function (e) {
    const form = document.getElementById('upload_study_material');
    const study_table = $('#study-table');
    const institue_box = $('select[name="center_id"]');
    const course_box = $('select[name="course_id"]');
    const validation = MyFormValidation(form);
    select2Student('select[name="student_id"]');
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
        ajax : {
            url : ajax_url + 'student/list-study-material'
        },
        column : [
            // {'data',}
        ]
    });
    form.addEventListener('submit', (r) => {
        r.preventDefault();
        $.AryaAjax({
            url: 'student/upload-study-material',
            data: new FormData(form),
            validation: validation
        }).then((s) => {
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
            log(res);
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
});
