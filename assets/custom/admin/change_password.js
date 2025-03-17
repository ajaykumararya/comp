document.addEventListener('DOMContentLoaded', function () {
    $(document).on('submit', '.change-password', function (f) {
        f.preventDefault();
        $.AryaAjax({
            url: 'change-password',
            data: new FormData(this)
        }).then((r) => {
            if (r.status) {
                SwalSuccess('', 'Password Changed Successfully..',true).then((rrr) => {
                    if(rrr.status){
                        location.href = base_url + 'admin';
                    }
                });                
            }
            showResponseError(r);
        });
    })
})