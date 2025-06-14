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
        { 'data': null },
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
                    targets : -2,
                    render : function(data,type,row){
                        return `
                  
                            <a href="${row.image == '' ? '#' : row.image}" target="_blank" class="btn btn-xs btn-sm btn-primary p-1 my-2" title="Image (परोफ़ील इमेज )"><i class="fa fa-file"></i> Image</i>
                            <a href="${row.educational_doc == '' ? '#' : row.educational_doc}" target="_blank" class="btn btn-xs btn-sm btn-primary p-1" title="Educational Document (एजुकेशनल डाक्यमेन्ट )"><i class="fa fa-file"></i> Edu Doc</i>
                        `;
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
