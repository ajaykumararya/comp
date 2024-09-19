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
