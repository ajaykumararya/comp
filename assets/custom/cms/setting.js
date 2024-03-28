document.addEventListener('DOMContentLoaded', function (e) {
    const logo_form = document.getElementById("update-logo");
    const view_logo = $('#logo');

    const list_slider = $('#list-slider');
    var validation = MyFormValidation(logo_form);
    validation.addField('image', {
        validators: {
            notEmpty: { message: 'Please Select Image..' }
        }
    })
    // log(validation);
    logo_form.addEventListener('submit', function (e) {
        e.preventDefault();
        // log(formDataToObject(new FormData(this)));
        var fromdata = new FormData();
        const fileInput = $('#image')[0];
        const file = fileInput.files[0];
        fromdata.append('image', file);
        $.AryaAjax({
            validation: validation,
            url: 'cms/update-logo',
            data: (fromdata),
            success_message: 'Logo Uploaded Successfully.',
            formData : true
            // page_reload: true
        }).then((r) => {
            if (r.status) {
                view_logo.attr('src', r.file);
            }
        })
    });
    const setting_form = $('.setting-update');
    setting_form.on('submit', function (r) {
        r.preventDefault();
        var message = $(this).data('message');
        message = message ? message : 'Setting';
        var formData = new FormData(this);
        $.AryaAjax({
            data: formData,
            url: 'cms/update-setting',
            success_message: `${message} Update Successfully.`,
            formData : true
        }).then((rr) => {
            log(rr);
        });
    });

    

});