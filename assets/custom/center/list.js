document.addEventListener('DOMContentLoaded', function (e) {
    const table = $(document).find('#list_center').DataTable({
        searching: true,
        'ajax': {
            'url': ajax_url + 'center/list',
            error: function(a,v,c){
                log(a.responseText)
            }
        },
        'columns': [
            // Specify your column configurations
            { 'data': 'rollno_prefix' },
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
                target : 0,
                render : function(data,type,row){
                    return `<a href="javascript:;" class="edit-record">${data}</a>`;
                }
            },
            {
                targets: 3,
                printable : false,
                render: function (data, type, row) {
                    return `<label class="text-dark">${data}</label>`;
                }
            },
            {
                targets: 4,
                printable : false,
                render: function (data, type, row) {
                    return `<a href="mailto:${data}">${data}</a>`;
                }
            },
            {
                targets: 5,
                printable : false,
                render: function (data, type, row) {
                    return `<a href="tel:${data}">${data}</a>`;
                }
            },
            {
                targets: -1,
                data: null,
                orderable: false,
                printable : false,
                className: 'text-end',
                render: function (data, type, row) {
                    // console.log(data);
                    // dDelete unwanted props
                    // delete data.isDeleted;
                    // delete data.password;
                    // delete data.roll_no_suffix;
                    // delete data.is_deleted;
                    // delete data.active_page;
                    // //change file view
                    // data.adhar_front = viewImage(data.adhar_front);
                    // data.adhar_back = viewImage(data.adhar_back);
                    // data.address_proof = viewImage(data.address_proof);
                    // data.agreement = viewImage(data.agreement);
                    // data.signature = viewImage(data.signature);
                    // data.image = viewImage(data.image);
                    // view-details-drawer-btn {tag:view_btn_class}
                    return `<div class="btn-group">
                                <a href="${base_url}center/profile/${btoa(row.id)}" class="btn btn-sm btn-info">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <button class="btn btn-sm btn-light-primary edit-form-btn" data-id="${row.id}">
                                    <i class="fa fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-light-danger delete-btn">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>`;
                }
            }
        ]
    })
    table.on('draw', function () {
        $('#list_center').EditForm('center/edit-rollno_prefix','Update Roll Number Prefix')
                        .DeleteEvent('centers','Center')
                        .EditAjax('center/edit-form','Center');
    });
});
