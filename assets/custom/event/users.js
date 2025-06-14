document.addEventListener('DOMContentLoaded', function (e) {
    const delete_url = 'event/delete-user';
    const list_url = 'event/list-users';
    const table = $('#table');
    const columns = [
        { 'data': null },
        { 'data': 'name' },
        { 'data': 'father_name' },
        { 'data': 'course' },
        { 'data': 'roll_no' },
        { 'data': 'mobile' },
        { 'data': 'email' },
        { 'data': 'dob' },
        { 'data': 'other_information' },
        { 'data': null }
    ];
    // var dt = '';
    if (table.length) {
        const dt = table.DataTable({
            // dom: small_dom,
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
            ajax: {
                url: ajax_url + list_url,
                success: function (d) {
                    // console.log(d);
                    if (d.data && d.data.length) {
                        dt.clear();
                        dt.rows.add(d.data).draw();
                    }
                    else {
                        toastr.error('Table Data Not Found.');
                        DataTableEmptyMessage(table);
                    }
                },
                error: function (a, b, v) {
                    console.warn(a.responseText);
                }
            },
            columns: columns,
            columnDefs: [
                {
                    targets: 0,
                    render : function(data,type,row,meta){
                        return `${meta.row + 1}.`;
                    }
                },
                {
                    targets: -1,
                    data: null,
                    orderable: false,
                    className: 'text-end',
                    render: function (data, type, row) {
                        // console.log(data);
                        return `<div class="btn-group">
                                    ${deleteBtnRender(1, row.id)}
                                </div>
                                `;
                    }
                }
            ]
        });
        dt.on('draw', function (e) {
            const handle = handleDeleteRows(delete_url);
            handle.done(function (e) {
                console.log(e);
                table.DataTable().ajax.reload();
            });
        });


    }
    
});
