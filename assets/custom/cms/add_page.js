document.addEventListener('DOMContentLoaded', function (e) {
    const slugINput = $('.all-div input');
    const page_input = $('input[name="page_name"]');
    const page_form = document.getElementById('page_form');
    const page_type =  $('.page_type');
    // $('.page_setting').addClass('mm-active');
    // $('.add_page').addClass('mm-active');
    var link = '';
   page_type.change(function () {
        $('.all-div').find('.alert').remove();

        var placeholder = (this.value == 'link') ? 'Link' : 'Slug';
        var page_name = page_input.val();
        if (this.value == 'content') {
            link = slugINput.val();
            checkValidSlug(page_name);
        }
        else {
            slugINput.val(link);
        }
        page_input.trigger('blur');
        slugINput.attr('placeholder', 'Enter ' + placeholder).focus();
    });
    $(document).on('blur keyup', 'input[name="page_name"]', function () {
        // console.log($('.page_type:checked').val());
        if ($('.page_type:checked').val() != 'link')
            checkValidSlug(this.value);
    })
    $(document).on('keyup change blur', '.all-div input', function () {
        checkValidSlug(this.value);
    });
    function checkValidSlug(value) {
        var all_methods = $('#all-methods').val();
        all_methods = $.parseJSON(all_methods);
        
        $('.all-div').find('.alert').remove();
        $('.publish-btn').prop('disabled', false);
        // log(page_type.val());
        if ($('.page_type:checked').val() != 'link'){
            var slug = createSlug(value);
            slugINput.val(slug);
            if (all_methods.includes(slug)) {
                $('.all-div').append('<div class="alert alert-danger mt-4">This Slug is Exists in System Change Your Slug.</div>');
                $('.publish-btn').prop('disabled', true);
            }
        }
    }    
    var validation = MyFormValidation(page_form);
    validation.addField('page_name',{
        validators : {
            notEmpty : {
                message : 'Please Enter A Page Name'
            }
        }
    });
    page_form.addEventListener('submit',function(r){
        r.preventDefault();
        validation.addField('link',{
            validators : {
                notEmpty : {
                    message : `Please Enter ${ page_type.val() == 'link' ? 'Link' : 'Slug'} `
                }
            }
        });
        $.AryaAjax({
            validation : validation,
            data : formDataToObject( new FormData(page_form) ),
            url : 'cms/add-page',
            success_message : 'Page Added Successfully..',
            page_reload : true
        });
    })
});
