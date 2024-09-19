document.addEventListener('DOMContentLoaded', function (e) {
    const form = document.getElementById('add-co-ordinator-account');
    // tinymce.init({
    //     selector: "#exam-editor",
    //     // inline: true, // Set inline mode
    //     toolbar: "undo redo", // Customize toolbar as needed
    // });

    var validation = MyFormValidation(form);
    validation.addField('name', {
        validators: {
            notEmpty: { message: 'Please Enter Name.' }
        }
    });
    validation.addField('image', {
        validators: {
            notEmpty: { message: 'Please Select an Image.' }
        }
    });
    validation.addField('contact_number', {
        validators: {
            notEmpty: { message: 'Please Enter Mobile.' }
        }
    });
    validation.addField('email', {
        validators: {
            notEmpty: { message: 'Please Enter Email' }
        }
    });


    validation.addField('password', {
        validators: {
            notEmpty: { message: 'Please Enter Password' }
        }
    });

    form.addEventListener('submit', function (e) {
        e.preventDefault();
        $.AryaAjax({
            url: 'coordinate/create',
            validation: validation,
            data: new FormData(form),
            success_message: 'Co-ordinator Account Created Successfully.',
            page_reload: true
        }).then((e) => {
            showResponseError(e);
        });
    })

})