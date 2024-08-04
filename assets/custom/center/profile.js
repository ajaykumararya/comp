document.addEventListener('DOMContentLoaded', function () {
    $(document).on('submit', '.change-center-password', function (re) {
        re.preventDefault();
        $.AryaAjax({
            url: 'center/update-password',
            data: new FormData(this),
            success_message: 'Password Updated Successfully.',
            page_reload: true
        }).then((r) => showResponseError(r));
    });

    $(document).on('change', '.upload-center-docs', function () {
        var id = $(this).closest('table').data('id');
        var fileInput = this;
        var file = fileInput.files[0];

        if (!file) {
            SwalWarning('Please Choose a valid file.');
            return;
        }

        var formData = new FormData();

        formData.append('file', file);
        formData.append('center_id', id);
        formData.append('name',$(fileInput).attr('name'));

        Swal.fire({
            title: 'Uploading...',
            html: '0%',
            allowOutsideClick: false,
            showConfirmButton: false,
            willOpen: () => {
                $.ajax({
                    url: ajax_url+'website/update-center-docs', // Change this to your upload endpoint
                    type: 'POST',
                    data: formData,
                    dataType : 'json',
                    processData: false,
                    contentType: false,
                    xhr: function () {
                        var xhr = new window.XMLHttpRequest();
                        xhr.upload.addEventListener("progress", function (evt) {
                            if (evt.lengthComputable) {
                                var percentComplete = evt.loaded / evt.total * 100;
                                Swal.getContent().querySelector('p').innerHTML = percentComplete.toFixed(2) + '%';
                            }
                        }, false);
                        return xhr;
                    },
                    success: function (response) {
                        console.log(response);
                        if(response.status){
                            // SwalSuccess('Uploaded','File Uploaded Successfully').then( (r) => {
                            //     if(r.isConfirmed){
                                    location.reload();
                            //     }
                            // })
                        }
                        Swal.close();
                    },
                    error: function (xhr, status, error) {
                        Swal.close();
                        // Handle error
                        console.error(xhr.responseText);
                    }
                });
            }
        });
    });
    $(document).on("click",'.delete-center-doc',function(){
        var field = $(this).data('field'),
            file = $(this).data('file'),
            id = $(this).data('id');
        SwalWarning('Confirmation!','Are you delete this file',true,'Delete').then((e) => {
            if(e.isConfirmed){
                $.AryaAjax({
                    url : 'center/delete-docs',
                    data : {field,file,id},
                    success_message : 'Document Removed Successfully.',
                    page_reload : true
                });
            }
        })
    })
    const set_fees = $('#set-fees');
    if(set_fees.length){

        set_fees.on('submit',function(r) {
            r.preventDefault();
            $.AryaAjax({
                url: 'center/set-centre-wise-fees',
                data: $(this).serialize()
            }).then((r) => {
                if(r.status){
                    SwalSuccess('Success','Fees Set Successfully');
                }
                showResponseError(r);
            });
        })
        // alert(3);
        set_fees.find('.select-amount').on('change',function(){
            $(this).closest('.box').find('.amount-box').prop('disabled', !$(this).is(':checked')).focus().val('');
        })
    }
})