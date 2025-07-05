document.addEventListener('DOMContentLoaded', function () {
    // const addForm = $('#add-form');

    const table = $('#table');
    var dt = table.DataTable({
        ajax: {
            url: `${ajax_url}fetch-city`,
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
            }
        },
        columns: [
            { 'data': null },
            { 'data': 'STATE_NAME' },
            { 'data': 'DISTRICT_NAME' },
            { 'data': null }
        ],
        columnDefs: [
            {
                target: 0,
                render: function (data, type, row, meta) {
                    return meta.row + 1;
                }
            },
            {
                target: -1,
                render: function (data, type, row, meta) {
                    return `
                       <button class="btn btn-primary btn-xs btn-sm edit-record"><i class="ki-outline ki-pencil"></i> Edit</button>
                    `;
                }
            }
        ]
    }).on('draw', function () {
        EditForm(table,'edit-city','Edit City');
    });


    // addForm.submit(function (r) {
    //     r.preventDefault();
    //     const name = $('#name').val();
    //     $.AryaAjax({
    //         url: 'add-state',
    //         data: new FormData(this),
    //         success_message: 'Add State Successfully...'
    //     }).then((res) => {
    //         log(res)
    //         if (res.status)
    //             table.DataTable().ajax.reload();
    //         // this is manage states
    //     });
    // });
})