document.addEventListener('DOMContentLoaded', function (e) {
    const list_url = 'course/list';
    const list_box = $('.print-all-course').addClass('p-5');
    const manage_box = $('.manage-fees-box');
    const fetch_course_fees = 'course/fetch-course-fees-form';
    const myBody = $('.my-body');
    var xhr = null;


    const list_course = () => {
        $.AryaAjax({
            url: list_url
        }).then(function (res) {
            // console.log(res);
            if (res.data.length) {
                var ul = $('<div>');
                // console.log(res.data);
                $.each(res.data, function (i, v) {
                    var badgeClass = duration_badge(v.duration_type);
                    var duration = course_duration_humnize(v.duration,v.duration_type);
//                    alert(duration);

                    ul.append(`<div class="card mb-2 border-primary border-2">                                    
                                    <div class="card-header" style="min-height:35px;padding:0 .5rem">
                                        <h3 class="card-title">${v.course_name} </h3>
                                        <div class="card-toolbar">                                        
                                            &nbsp;
                                            <button type="button" class="btn border-info border btn-sm btn-light-info manage-fees" data-course_id="${v.course_id}">
                                                <span class="indicator-label">
                                                    Select
                                                </span>
                                                <span class="indicator-progress" >
                                                    Wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-footer p-2">
                                        <label class="badge badge-dark">${v.category}</label>
                                        <label class="badge badge-${badgeClass}">${duration}</label>
                                    </div>
                                </div>`);
                });

                list_box.append(ul).find('.manage-fees').click(function () {
                    var preBOx = $(this).closest('.card');
                    var btn = this,
                        course_name = $(preBOx).find('.card-title').html(),
                        course_id = $(this).data('course_id');
                    // alert(course_id);
                    if($(btn).hasClass('active'))
                        return false;
                    myBody.html('');
                    $(btn).addClass('active').attr('data-kt-indicator', 'on').prop('disabled',true);
                    $('.course_name').html(course_name);
                    xhr = $.AryaAjax({
                        url : fetch_course_fees,
                        data : { course_id},
                    }).then(function(response){
                        // console.log(response);
                        myBody.html(response.form);
                        $('.manage-fees').removeClass('active').removeAttr('data-kt-indicator').prop('disabled',false).find('span:first').html('Select');
                        $(btn).addClass('active').find('span:first').html('Selected');
                    }).catch(function(a){
                        console.log(a.myerror)
                    });
                    // alert(3);
                });
            }
        }).catch(function (error) {
            // console.warn('Error:', error.status, error.error);
        });
    }

    list_course();
});