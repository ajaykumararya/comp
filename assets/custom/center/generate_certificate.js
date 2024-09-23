document.addEventListener('DOMContentLoaded', function () {
    const list = $('#centre-certificates');
    list.DataTable({
        ajax: {
            url: `${ajax_url}center/list-certificates`
        },
        columns: [
            { 'data': null },
            { 'data': 'center_number' },
            { 'data': 'institute_name' },
            { 'data': 'name' },
            { 'data': 'certificate_issue_date' },
            { 'data': 'valid_upto' },
            { 'data': null }
        ],
        columnDefs: [
            {
                targets: 0,
                render: function (data, type, row, meta) {
                    return `${meta.row + 1}.`;
                }
            },
            {
                targets: -3,
                render: function (data, type, row) {
                    return `${(data && data != null) ? data : badge('Empty', 'danger')}`;
                }
            },
            {
                targets: -1,
                render: function (data, type, row) {
                    return `
                    <div class="btn-group">
                    ${isAdmin() ?
                            `<a class="btn btn-sm btn-light-info edit-record">
                            <i class="fa fa-edit"></i>
                        </a>` : ``}
                        ${generate_link_btn(row.id, 'center_certificate')} 
                    </div>`;
                }
            }
        ]
    }).on('draw', function (r) {
        if (isAdmin())
            $('#centre-certificates').EditForm('center/update-dates', 'Update Date(s)')
    });
})