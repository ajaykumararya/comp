document.addEventListener('DOMContentLoaded', async function () {

    $(document).on('change', '[name="center_avatar"]', function (e) {
        // alert('Yes');
        e.preventDefault();
        var selectedFile = this.files[0];
        if (selectedFile) {
            var id = $(this).data('id');
            var formData = new FormData();
            formData.append('id', id);
            formData.append("file", selectedFile);
            $.AryaAjax({
                url: 'website/update-center-profile-image',
                data: formData
            }).then((res) => {
                // log(res);
                if (res.status) {
                    $('.owner-image').attr('src', `${res.file}`);
                    mySwal('Successful', 'Profile Image Uploaded Successfully..');
                }
                showResponseError(res);
            });
        }
        else {
            SwalWarning('Please Select A Valid Image.');
        }
    });
    $(document).on('submit', '#kt_account_profile_details_form', function (e) {
        e.preventDefault();
        // log($(this).serialize());
        $.AryaAjax({
            url: 'website/update-center-profile',
            data: new FormData(this)
        }).then((res) => {
            log(res)
            if (res.status) {
                mySwal('Successful', 'Profile Updated Successfully..');
            }
            showResponseError(res);
        });
    })
})