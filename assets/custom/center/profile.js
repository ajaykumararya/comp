document.addEventListener('DOMContentLoaded',function(){
    $(document).on('submit', '.change-center-password', function (re) {
        re.preventDefault();
        $.AryaAjax({
            url: 'center/update-password',
            data: new FormData(this),
            success_message: 'Password Updated Successfully.',
            page_reload: true
        }).then((r) => showResponseError(r));
    });
})