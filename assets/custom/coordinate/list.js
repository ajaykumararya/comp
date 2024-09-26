document.addEventListener('DOMContentLoaded', function (e) {
    const table = $(document).find('#list_center').DataTable({
        searching: true,
        'ajax': {
            'url': ajax_url + 'coordinate/list',
            error: function (a, v, c) {
                log(a.responseText)
            }
        },
        'columns': [
            { 'data': 'name' },
            { 'data': 'email' },
            { 'data': 'contact_number' },
            { 'data': 'ttlCommission' },
            { 'data': null }
            // Add more columns as needed
        ],
        'columnDefs': [
            {
                targets: 1,
                printable: false,
                render: function (data, type, row) {
                    return `<a href="mailto:${data}">${data}</a>`;
                }
            },
            {
                targets: 2,
                printable: false,
                render: function (data, type, row) {
                    return `<a href="tel:${data}">${data}</a>`;
                }
            },
            {
                targets: 3,
                render: function (data, type, row) {
                    return `
                    <table class="p-0">
                        <tbody class="p-0">
                            <tr class="text-success">
                                <th class="p-0" style="width:120px">PAID</th><td class="p-0">${data != null ? data : 0} ${inr} </td>
                            </tr>
                            <tr class="text-danger">
                                <th class="p-0" style="width:120px">UNPAID</th><td class="p-0">${row.ttlPendingCommission != null ? row.ttlPendingCommission : 0} ${inr} </td>
                            </tr>
                            ${(data != null)
                                ? `<tr>
                                        <td class="p-1" style="width:120px" colspan="2"><a href="${base_url}co-ordinate/list-commission/${row.id}" class="p-1 btn w-100 btn-sm btn-primary"><i class="fa fa-eye"></i> View</a>
                                    </td>
                                ` : ``}
                            </tr>
                        </tbody>
                    </table> `;
                }
            },
            {
                targets: -1,
                data: null,
                orderable: false,
                printable: false,
                className: 'text-end',
                render: function (data, type, row) {
                    return `<div class="btn-group">
                                <button class="btn btn-sm btn-light-danger delete-btn">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>`;
                }
            }
        ]
    })
    table.on('draw', function () {

        $('#list_center')
            .DeleteEvent('centers', 'Center');
        // .EditAjax('center/edit-form', 'Center');
    });
});
