document.addEventListener('DOMContentLoaded', function () {
    passoutStudentSelect2('[name="student_id"]');
    const form = document.getElementById('form');
    var validation = MyFormValidation(form);
    validation.addField("student_id", {
        validators: {
            notEmpty: {
                message: 'Student field is required'
            }
        }
    });
    if ($('[name="sr_no"]').length) {
        validation.addField("sr_no", {
            validators: {
                notEmpty: {
                    message: 'Serial No field is required'
                }
            }
        });
    }
    validation.addField("date", {
        validators: {
            notEmpty: {
                message: 'Date field is required'
            }
        }
    });
    $(form).submit(function (r) {
        r.preventDefault();
        $.AryaAjax({
            url: 'other/submit-migration-certificate',
            data: new FormData(this),
            validation: validation,
            success_message: 'Details Submitted Successfully..'
        }).then((res) => {
            // log(res);
            if (res.status) {
                location.reload();
            }
            showResponseError(res);
        });
    })

    const table = $(document).find('#table');

    var dt = table.DataTable({

        searching: false,
        'ajax': {
            'url': ajax_url + 'other/list_migration_certificate',
            'type': 'GET',
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
            'error': function (xhr, error, thrown) {
                // Custom error handling
                console.log('DataTables Error:', xhr, error, thrown);

                // Show an alert or a custom message
                alert('An error occurred while loading data. Please try again.');
            }
        },
        'columns': [
            // Specify your column configurations
            { 'data': null },
            { 'data': 'name' },
            { 'data': 'sr_no' },
            { 'data': 'date' },
            { 'data': null }
            // Add more columns as needed
        ],
        columnDefs: [
            {
                targets: 0,
                render: function (data, type, row, meta) {
                    return `${meta.row + 1}.`;
                }
            },
            {
                targets: 2,
                render : function(data,type,row){
                    if (!$('[name="sr_no"]').length) 
                        return '';//1020200 + parseInt(row.id);
                    return data;
                }
            },
            {
                targets: -1,
                render: function (data, type, row) {
                    return `<div class="btn-group">
                    ${generate_link_btn(row.id, 'migration_certificate')}
                    ${deleteBtnRender(1, row.id)}
                            </div>`;
                }
            }
        ]
    }).on('draw', function () {
        handleDeleteRows('other/delete-migration-certificate').then((r) => {
            table.DataTable().ajax.reload();
        });
    });
})