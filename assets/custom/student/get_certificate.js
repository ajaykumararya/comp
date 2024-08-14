document.addEventListener('DOMContentLoaded',function(){
    const table = $("#list-certificates").DataTable({
        dom: small_dom,
        'ajax': {
            'url': ajax_url + 'student/list-certificate',
            'type': 'GET',
            success: function (d) {
                // console.log(d);
                if (d.data && d.data.length) {
                    table.clear();
                    table.rows.add(d.data).draw();
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
            { 'data': 'course_name' },
            { 'data': 'createdOn' },
            // { 'data': 'session' },
            { 'data': 'center_name' },
            { 'data': null }
            // Add more columns as needed
        ],
        'columnDefs': [
            {
                target: 2,
                render: function (data, type, row) {
                    var badgeClass = duration_badge(row.duration_type, duration_colors);//) ? duration_colors[row.duration_type] : 'danger';
                    var myduration = `<lable class="badge badge-${badgeClass}"> ${course_duration_humnize_without_ordinal(row.duration, row.duration_type)}</lable>`;//row.duration+ ` </>`;
                    return `${data} ${myduration} `;
                }
            },
            {
                target: -1,
                orderable: false,
                render: function (data, type, row) {
                    // generateSHA1Hash(row.admit_card_id).then( (admit_card_id) => {
                    return `<div class="btn-group">
                    
                            ${ generate_link_btn(row.certiticate_id, 'certificate') } 
                            ${deleteBtnRender(1,row.certiticate_id,'Certificate')}
                            `;
                    // });
                    // return '';
                }
            }
        ]
    }).on('draw',function(){
        handleDeleteRows('student/delete-certificate').then( (r) => log(r));
    });
})