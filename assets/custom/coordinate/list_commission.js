document.addEventListener('DOMContentLoaded', function (e) {
    const co_Id = $('[name="co_id"]').val();
    // alert(co_Id);
    const table = $(document).find('#list-commission').DataTable({
        searching: true,
        'ajax': {
            type : 'POST',
            'url': ajax_url + 'coordinate/list-commission',
            data: {
                'id': co_Id
            },
            error: function (a, v, c) {
                log(a.responseText)
            }
        },
        'columns': [
            { 'data': 'id' },
            { 'data': 'institute_name' },
            { 'data': 'student_name' },
            { 'data': 'commission' },
            { 'data': null }
            // Add more columns as needed
        ],
        'columnDefs': [
            {
                targets: 1,
                printable: false,
                render: function (data, type, row) {
                    return `<a href="${base_url}center/profile/${btoa(row.center_id)}" target="_blank">${data}</a>`;
                }
            },
            {
                targets: 2,
                printable: false,
                render: function (data, type, row) {
                    return `<a href="${base_url}student/profile/${(row.center_id)}" target="_blank">${data}</a>`;
                }
            },
            {
                targets: 3,
                printable: false,
                render: function (data, type, row) {
                    return `${data} ${inr}`;
                }
            },
            {
                targets: -1,
                data: null,
                className: 'text-end',
                render: function (data, type, row) {
                   
                        return `<div class="btn-group">
                                ${
                                    login_type == 'admin' ? 
                                        (row.status == 0
                                            ? `<button class="btn btn-xs btn-sm btn-primary btn-sm pay-now ${login_type}" data-id="${row.id}">Pay Now</button>`
                                            : badge('Paid','success')
                                        )
                                        : row.status == 1 ? badge('Paid','success') : badge('Unpaid','danger')
                                 }
                            </div>`;
                    
                }
            }
        ]
    })
    table.on('draw', function () {

        $('#list_center')
            .DeleteEvent('centers', 'Center');
        // .EditAjax('center/edit-form', 'Center');
        $(document).find('button.pay-now.admin').click(function(){
            var id = $(this).data('id');
            SwalWarning('Confirmation','Do you want to pay this',true,'Pay Now').then( (r) => {
                if(r.isConfirmed){
                    // alert(id);
                    $.AryaAjax({
                        url : 'coordinate/update-commission',
                        data  : {id},
                        loading_message : 'Updating Commission, Please wait..',
                        success_message : 'Commission Updated..'
                    }).then((rr)=>{
                        $(document).find('#list-commission').DataTable().ajax.reload();
                    });
                }
            })
        });
    });
});
