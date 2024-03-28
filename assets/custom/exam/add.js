document.addEventListener('DOMContentLoaded',function(e){
    const form = document.getElementById('add_exam');
    // tinymce.init({
    //     selector: "#exam-editor",
    //     // inline: true, // Set inline mode
    //     toolbar: "undo redo", // Customize toolbar as needed
    // });

    var validation = MyFormValidation(form);
    validation.addField('exam_title',{
        validators : {
            notEmpty : {message : 'Please Enter An Exam Title.'}
        }
    });
    validation.addField('course_id',{
        validators : {
            notEmpty : {message : 'Please Select a course.'}
        }
    });
    validation.addField('duration',{
        validators : {
            notEmpty : {message : 'Please Select Duration.'}
        }
    });
    validation.addField('duration_type',{
        validators : {
            notEmpty : {message : ' '}
        }
    });

    form.addEventListener('submit',function(e){
        e.preventDefault();
        $.AryaAjax({
            url : 'exam/create',
            validation : validation,
            data : new FormData(form),
            success_message : 'Exam Created Successfully.',
            page_reload : true
        }).then((e) => log(e));
    })

})