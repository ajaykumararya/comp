document.addEventListener('DOMContentLoaded',function(){
    $('.table').DataTable();

    $(document).on('click', '.edit-fee-record', function () {
        var fee_id = $(this).data('fee_id');
        $.AryaAjax({
            url: 'website/edit-fee-record',
            data: { fee_id },
        }).then((r) => {
            ki_modal.find('.modal-dialog').addClass('modal-lg');
            myModel('Edit Fee Record', r.html, 'website/update-fee-record').then((r) => {
                if (r.status) {
                    location.reload();
                }
            });
        });
    });
    $(document).on('click', '.delete-fee-record', function () {
        var fee_id = $(this).data('fee_id');
        SwalWarning('Confirmation!', 'Are you sure for delete fee record', true, 'Yes').then((e) => {

            if (e.isConfirmed) {
                $.AryaAjax({
                    url: 'website/delete-fee-record',
                    data: { fee_id },
                    page_reload: true,
                    success_message: 'Fee Record Deleted Successfully..'
                })
            }
        })
    })
    $(document).on('click', '.print-receipt', function () {
        var payment_id = $(this).data('fee_id');
        $.AryaAjax({
            url: 'website/print-fee-record',
            data: { payment_id },
        }).then((res) => {
            var drawerEl = document.querySelector("#kt_drawer_example_advanced");
            drawerEl.setAttribute('data-kt-drawer-width', "{default:'300px', 'md': '900px'}");
            var drawer = KTDrawer.getInstance(drawerEl);
            // drawer.trigger(drawer, "kt.drawer.show"); // trigger show drawer
            drawer.update();
            drawer.show();
            var
                main = $('#kt_drawer_example_advanced'),
                body = main.find('.card-body'),
                title = main.find('.card-title');
            // console.log(title);
            title.html('Fee Receipt');
            body.html(res.html).find('button').on('click', function () {
                // alert(9);
                var content = $(this).closest('.card-body').clone();
                content.find('button').remove();
                content = content.html();

                var newWindow = window.open('', '_blank');
                newWindow.document.open();
                newWindow.document.write(`<html><head><title>Print Receipt</title>`);
                newWindow.document.write(`<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">`);
                // await newWindow.document.write(`<link href="${base_url}assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css">`);
                // await newWindow.document.write(`<link href="${base_url}assets/css/style.bundle.css" rel="stylesheet" type="text/css">`);
                newWindow.document.write(`</head><body style="padding:20px">${content}</body></html>`);

                newWindow.document.close();
                newWindow.print();
                // newWindow.close();
            });
        });
    });
})