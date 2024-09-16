document.addEventListener('DOMContentLoaded', function () {
    const list = $('#list-history');
    list.DataTable({
        ajax: {
            url: ajax_url + 'center/wallet-history'
        },
        'columns': [
            // Specify your column configurations
            { 'data': null },
            { 'data': 'date' },
            { 'data': 'student_name' },
            { 'data': 'status' },
            { 'data': 'description' },
            { 'data': 'amount' },
            // Add more columns as needed
        ],
        'columnDefs': [
            {
                targets: 0,
                render: function (data, type, row, meta) {
                    return `${meta.row + 1}.`;
                }
            },
            {
                targets: 2,
                render: function (data, type, row, meta) {
                    return `<div class="d-flex flex-stack">      
                    <span>${data} </span>    

                    ${row.url ? '<a href="' + row.url + '" target="_blank" class="btn btn-light btn-sm btn-color-muted fs-7 fw-bold px-5"><i class="fa  fa-eye"></i></a>' : ''}
                </div>`;
                }
            },
            {
                targets: 3,
                render: function (data, type, row, meta) {
                    return (data == 'credit') ? badge('Credit') : badge('Debit', 'danger');
                }
            },
            {
                targets: -1,
                render: function (data, type, row, meta) {
                    return `${inr} ${row.amount} `;
                }
            }
        ]
    });
})