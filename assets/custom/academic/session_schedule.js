document.addEventListener('DOMContentLoaded', function () {

    const institue_box = $('select[name="center_id"]');
    const course_box = $('select[name="course_id"]');
    const form = document.getElementById('form');
    var validation = MyFormValidation(form);
    validation.addField('center_id',{
        validators: {
            notEmpty: {
                message: 'Select a Center'
            }
        }
    });
    validation.addField('session_id',{
        validators: {
            notEmpty: {
                message: 'Select a Session'
            }
        }
    });
    validation.addField('course_id',{
        validators: {
            notEmpty: {
                message: 'Select a course'
            }
        }
    });
    validation.addField('duration',{
        validators: {
            notEmpty: {
                message: 'Select course duration'
            }
        }
    });
    validation.addField('exam_centre_id',{
        validators: {
            notEmpty: {
                message: 'Select an exam-centre'
            }
        }
    });
    $(form).submit(function(e){
        e.preventDefault();
        $.AryaAjax({
            validation : validation,
            url : 'academic/save-session-schedule',
            data : new FormData(this)
        }).then((res) => {
            SwalSuccess('Success','Schedule Updated Successully..');
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
                        options += `<option value="${course.course_id}" data-duration="${course.duration}" data-durationType="${course.duration_type}" data-kt-rich-content-subcontent="${course.duration} ${course.duration_type}">${course.course_name}</option>`;
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
    var listSubjects = $('.list-subjects');

    $(document).on('change', '.get-report', function (r) {
        r.preventDefault();

        // alert(2);
        var course_id = $('[name="course_id"]').val();
        var center_id = $('[name="center_id"]').val();
        var exam_centre_id = $('[name="exam_centre_id"]').val();
        var session_id = $('[name="session_id"]').val();
        var duration = $('[name="duration"]').val();
        var duration_type = $('[name="duration_type"]').val();
        log({
            course_id,
            center_id,
            exam_centre_id,
            session_id,
            duration,
            duration_type
        });
        listSubjects.html('');
        $(this).closest('form').find('.publish-btn').remove();

        if (course_id && center_id && session_id && duration && duration_type) {
            // alert('YES');
            $.AryaAjax({
                url: 'academic/get-course-session-schedule-form',
                data: {
                    course_id,
                    center_id,
                    exam_centre_id,
                    session_id,
                    duration,
                    duration_type
                }
            }).then((res) => {
                // log(res);
                listSubjects.html(res.html);
                $(this).closest('form').find('.card-footer').html(res.button);

                loadSomeFuncation();
            });
        }
    })
    $(document).on('change', '.check-for-empty,.get-report', function () {
        listSubjects.html('');
        $(this).closest('form').find('.publish-btn').remove();
    })
})