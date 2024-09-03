document.addEventListener('DOMContentLoaded', function (e) {
    const table = $('#student-payment-setting');
    const form = document.getElementById('set-fees');
    const save_url = 'payment/save-student-payment-setting';
    // table.DataTable();
    if (form) {
        var validator = MyFormValidation(form);
        console.log(validator);
        const dt = table.DataTable({
            dom: '',
            searching: false,
            'ajax': {
                'url': ajax_url + 'payment/student-payment-setting',
                'type': 'POST',
                data: { type: 'student' },
                success: function (d) {
                    console.log(d);
                    if (d.data && d.data.length) {
                        dt.clear();
                        dt.rows.add(d.data).draw();
                        for (var k = 0; k < d.data.length; k++) {

                            validator.addField(`amount[${d.data[k]['id']}]`, {
                                validators: {
                                    notEmpty: {
                                        message: 'Enter Amount.'
                                    },
                                    integer: {
                                        message: 'The value is not a valid Amount'
                                    }
                                }
                            });
                        }

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
            columns: [
                { 'data': null },
                { 'data': 'title' },
                { 'data': 'amount' },
                { 'data': 'status' },
            ],
            'columnDefs': [
                {
                    targets: 0,
                    render: function (data, type, row, meta) {
                        return `${meta.row + 1}.`;
                    }
                },
                {
                    targets: 1,
                    render: function (data, type, row) {
                        return `<b>${data}</b> ` + (row.description ? ` ${badge(row.description)}` : ``);
                    }
                },
                {
                    orderable: false,
                    targets: 2,
                    render: function (data, type, row) {
                        return `<div class="form-group">
                                <input type="text" value="${data}" name="amount[${row.id}]"  placeholder="Enter ${row.title} Fee" class="border border-primary border-2 form-control">
                            </div>`;
                    }
                },
                {
                    targets: 3,
                    orderable: false,
                    render: function (data, type, row) {
                        return `<div class="form-check form-switch mt-1 form-check-custom form-check-success form-check-solid" data-id="${row.id}">
                                <input class="form-check-input payment-status" type="checkbox" name="status[${row.id}]" ${row.status == 1 ? 'checked' : ''} id="kt_flexSwitchCustomDefault_${row.id}"/>
                                <label class="form-check-label" for="kt_flexSwitchCustomDefault_${row.id}">
                                    Show / Hide
                                </label>
                            </div>`;
                    }
                }
            ]
        });




        // console.log(validator);
        form.addEventListener('submit', function (e) {
            // Prevent default button action
            e.preventDefault();

            var test = save_ajax(form, save_url, validator);
            test.done(function (data) {
                toastr.success('Student Fix Payment update successfully..');
                // console.log(data);sss
                table.DataTable().ajax.reload();
            })
        });
    }

    $(document).on('click', '.sync-fee-data', function () {
        // toastr.success('HELLO');
        $.AryaAjax({
            url: 'fees/sync-fee-data'
        }).then((re) => {
            if (re.status) {
                toastr.success('Fee Syncing Successfully...');
                table.DataTable().ajax.reload();
            }
            else {
                toastr.warning('Fees Already Synced.');
            }
        });
    })


});