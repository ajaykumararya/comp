document.addEventListener('DOMContentLoaded', function (e) {
    const table = $(document).find('#list_center').DataTable({

        searching: true,
        'ajax': {
            'url': ajax_url + 'center/deleted-list',
            'type': 'GET',
            success: function (d) {
                // console.log(d);
                if (d.data && d.data.length) {
                    table.clear();
                    table.rows.add(d.data).draw();
                }
                else {
                    toastr.error('Table Data Not Found.');
                }
            },
            'error': function (xhr, error, thrown) {
                // Custom error handling
                console.log('DataTables Error:', xhr.responseText, error, thrown);

                // Show an alert or a custom message
                alert('An error occurred while loading data. Please try again.');
            }
        },
        'columns': [
            // Specify your column configurations
            { 'data': 'rollno_prefix' },
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
                targets: 2,
                printable: false,
                render: function (data, type, row) {
                    return `<label class="text-dark">${data}</label>`;
                }
            },
            {
                targets: 3,
                printable: false,
                render: function (data, type, row) {
                    return `<a href="mailto:${data}">${data}</a>`;
                }
            },

            {
                targets: 4,
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
                    return `<div class="btn-group">                                
                                <button class="btn btn-sm btn-light-primary undelete-btn">
                                    <i class="fa fa-arrow-left"></i> Move to list
                                </button>
                                <button class="btn btn-sm btn-light-danger delete-btn">
                                    <i class="fa fa-trash"></i> Delete
                                </button>
                            </div>`;
                }
            }
        ]
    })
    table.on('draw', function () {
        $('#list_center').EditForm('center/edit-rollno_prefix', 'Update Roll Number Prefix');
        $('#list_center').unDeleteEvent('centers', 'Center');
        $('.delete-btn').click(function () {
            // log(table.DataTable().data)
            var rowData = $(document).find('#list_center').DataTable().row($(this).closest('tr')).data();
            // log(rowData);
            SwalWarning('Confirmation!', 'Are you sure for permanently delete .', true, 'Delete IT').then((r) => {
                log(r);
                if (r.isConfirmed) {
                    $.AryaAjax({
                        url: 'center/param_delete',
                        data: rowData
                    }).then((e) => {
                        if (e.status) {
                            SwalSuccess('Success', 'Deleted Successfully..').then((e) => {
                                if(e.isConfirmed){
                                    location.reload();
                                }
                            });
                        }
                        showResponseError(e);
                    });
                }
            });
        })
    });

});