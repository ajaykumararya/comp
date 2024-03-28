document.addEventListener('DOMContentLoaded', function (e) {
    const table = $("#list-admit-card").DataTable({
        dom: small_dom,
        'ajax': {
            'url': ajax_url + 'student/list-admint-cards',
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
            { 'data': 'admit_card_duration' },
            { 'data': 'session' },
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
                target: 3,
                render: function (data, type, row) {
                    return `${ordinal_number(data)} ${$.ucfirst(row.duration_type)} 
                        ${row.duration == row.admit_card_duration ? badge('Final Admit Card', 'success text-black') : ''}
                    `;
                }
            },
            {
                target: -1,
                orderable: false,
                render: function (data, type, row) {
                    // generateSHA1Hash(row.admit_card_id).then( (admit_card_id) => {
                    return `<div class="btn-group">
                
                        ${generate_link_btn(row.admit_card_id, 'admit_card')}
                        ${deleteBtnRender(1, row.admit_card_id, 'Admit Card')}
                        </div>`;
                    // });
                    // return '';
                }
            }
        ]
    }).on('draw',function(){
        handleDeleteRows('student/delete-admit-card')
    });
});
/*
document.addEventListener('DOMContentLoaded', function (e) {
    const list_admin_cards = $('.list-admit-cards');

    var dt = list_admin_cards.DataTable({
        dom: small_dom,
        ajax: {
            url: ajax_url + 'student/list-admit-cards',
            type: 'GET',
            success: function (d) {
             log(d);
                if (d.data && d.data.length) {
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
            {'data' : null},
            { 'data': 'roll_no' },
            { 'data': 'student_name' },
            { 'data': 'course_name' },
            { 'data': 'session' },
            { 'data': null }
            // Add more columns as needed
        ],
        columnDefs : [
            {
                target : 0,
                render : function(data,type,row){
                    return `${row.createdOn}`;
                }
            },
            {
                target : 3,
                render : function(data,type,row){
                    var badgeClass = duration_badge(row.duration_type, duration_colors);//) ? duration_colors[row.duration_type] : 'danger';
                    return `<lable class="badge fs-4 badge-${badgeClass}"> ${course_duration_humnize(row.admit_card_duration,row.duration_type)} Admit Card of  ${data}</lable>`;//row.duration+ ` </>`;
                        
                    // return `${data} ${row.admit_card_duration} ${row.duration_type}`;
                }
            },
            {
                target : -1,
                orderable : false,
                render  : function (data,type,row){
                    return `<div class="btn-group">
                                <a href="${base_url}admit-card/${row.admit_card_id}" target="_blank" class="btn btn-light-info btn-sm"><i class="fa fa-eye"></i> View</a>
                            </div>`;
                }
            }
        ]
    });
})
*/