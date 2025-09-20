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
    validation.addField("sr_no", {
        validators: {
            notEmpty: {
                message: 'Sr.No field is required'
            }
        }
    });
    validation.addField("date", {
        validators: {
            notEmpty: {
                message: 'Date field is required'
            }
        }
    });
    validation.addField("attained_to", {
        validators: {
            notEmpty: {
                message: 'Attained To field is required'
            }
        }
    });
    validation.addField("attained_from", {
        validators: {
            notEmpty: {
                message: 'Attained From field is required'
            }
        }
    });
    validation.addField("passing_year", {
        validators: {
            notEmpty: {
                message: 'Passing Year field is required'
            }
        }
    });
    $(form).submit(function (r) {
        r.preventDefault();
        $.AryaAjax({
            url: 'other/submit-non-objection-certificate',
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
            'url': ajax_url + 'other/list_non_objection_certificate',
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
            { 'data': 'attained_to' },
            { 'data': 'attained_from' },
            { 'data': 'passing_year' },
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
                targets: -1,
                render: function (data, type, row) {
                    return `<div class="btn-group">
                    ${generate_link_btn(row.id, 'no_objection_certificate')}
                    ${deleteBtnRender(1, row.id)}
                            </div>`;
                }
            }
        ]
    }).on('draw',function(){
        handleDeleteRows('other/delete-non-objection-certificate').then((r) => {
            table.DataTable().ajax.reload();
        });
    });
})