document.addEventListener('DOMContentLoaded', function (e) {
    const table = $(document).find('#list_center').DataTable({
        searching: true,
        'ajax': {
            'url': ajax_url + 'center/pending-list',
            error: function (a, v, c) {
                log(a.responseText)
            }
        },
        'columns': [
            // Specify your column configurations
            { 'data': 'center_number' },
            { 'data': 'institute_name' },
            { 'data': 'name' },
            { 'data': 'email' },
            { 'data': 'contact_number' },
            { 'data': 'center_full_address' },
            { 'data': null }
            // Add more columns as needed
        ],
        'columnDefs': [
            {
                target: 0,
                render: function (data, type, row) {
                    return `${data}`;
                }
            },
            {
                targets: 3,
                printable: false,
                render: function (data, type, row) {
                    return `<label class="text-dark">${data}</label>`;
                }
            },
            {
                targets: 4,
                printable: false,
                render: function (data, type, row) {
                    return `<a href="mailto:${data}">${data}</a>`;
                }
            },
            {
                targets: 5,
                printable: false,
                render: function (data, type, row) {
                    return `<a href="tel:${data}">${data}</a>`;
                }
            },
            {
                targets: -1,
                data: null,
                orderable: false,
                printable: false,
                className: 'text-end',
                render: function (data, type, row) {
                    // console.log(data);
                    // dDelete unwanted props
                    delete data.isDeleted;
                    delete data.password;
                    delete data.roll_no_suffix;
                    delete data.is_deleted;
                    delete data.active_page;
                    //change file view
                    data.adhar = viewImage(data.adhar);
                    data.address_proof = viewImage(data.address_proof);
                    data.agreement = viewImage(data.agreement);
                    data.signature = viewImage(data.signature);
                    data.image = viewImage(data.image);
                    return `<div class="btn-group">
                                
                                <button data-id="${data.id}" class="btn btn-sm btn-light-primary move_toList-btn">
                                    <i class="fa fa-arrow-left"></i> Move to list
                                </button>
                                <button class="btn btn-sm btn-light-danger delete-btn">
                                    <i class="fa fa-trash"></i>
                                    Delete
                                </button>
                            </div>`;
                }
            }
        ]
    })
    table.on('draw', function () {
        $('#list_center').EditForm('center/edit-rollno_prefix', 'Update Roll Number Prefix')
            .DeleteEvent('centers', 'Center')
            .EditAjax('center/edit-form', 'Center');
            $('#list_center').find('.move_toList-btn').on('click',function(){
                var id = $(this).data('id')
                SwalWarning("Confirmation",'Are you sure for move to main list',true,'YES').then( (res) => {
                    if(res.isConfirmed){
                        $.AryaAjax({
                            url : 'center/update-pending-status',
                            data : {id},
                            success_message : 'Proccess Complete Successfully..',
                            page_reload : true
                        });
                    }
                })
            })
    });
});
