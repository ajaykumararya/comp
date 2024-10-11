document.addEventListener('DOMContentLoaded', function (e) {
    const table = $(document).find('#passout_student');
    
        var dt = table.DataTable({

        searching: true,
        'ajax': {
            'url': ajax_url + 'student/passout',
            'type': 'GET',
            success: function (d) {
                // console.log(d);
                if (d.data && d.data.length) { // this is data response
                    dt.clear();
                    dt.rows.add(d.data).draw();
                }
                else {
                    toastr.error('Table Data Not Found.');
                    DataTableEmptyMessage(table);
                }
            },
            'error': function (xhr, error, thrown) {
                // Custom error handling
                console.log('DataTables Error:', xhr, error, thrown);

                // Show an alert or a custom message
                alert('An error occurred while loading data. Please try again.');
            }
        },
        'columns': [
            // Specify your column configurations
            { 'data': 'roll_no' },
            { 'data': 'student_name' },
            { 'data': 'contact_number' },
            { 'data': 'email' },
            { 'data': 'course_name' },
            { 'data': null }
            // Add more columns as needed
        ],
        'columnDefs': [
            {
                targets: 2,
                render: function (data, type, row) {
                    return `<label class="badge badge-info">${data}</label>`;
                }
            },
            {
                targets: 4,
                render: function (data, type, v) {
                    var badgeClass = duration_badge(v.duration_type);
                    var duration = course_duration_humnize_without_ordinal(v.duration,v.duration_type);
                    return `<label class="badge badge-dark">${data}</label>
                            <label class="badge badge-${badgeClass}">${duration}</label>`;
                }
            },
            {
                targets: -1,
                // data: null,
                orderable: false,
                className: 'text-end',
                render: function (data, type, row) {
                    console.log(row);
                    var student_id = row.student_id;

                    return `<a href="${base_url}student/profile/${student_id}" target="_blank" class="btn btn-light-primary btn-sm">
                                        <i class="fa fa-eye"></i> Profile
                                    </a>`;
                }
            }
        ]
    });
// alert(4);
});