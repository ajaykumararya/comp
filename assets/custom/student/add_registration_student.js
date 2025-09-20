document.addEventListener('DOMContentLoaded',function(){
    $(document).on('submit', '.student-registration-certificate-form', function (e) {
        e.preventDefault();
        var that = this;
        $.AryaAjax({
            url: 'website/student-registration-certificate',
            data: new FormData(that),
        }).then((res) => {
            // log(res);
            if (res.status) {
                SwalSuccess(`Registration No. is ${res.registration_no}`, 'Your data submitted Successfully');
                that.reset();
            }
            showResponseError(res);
        });
    })
})