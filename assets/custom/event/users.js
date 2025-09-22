document.addEventListener('DOMContentLoaded', function (e) {
    const delete_url = 'event/delete_users';
    const list_url = 'event/list-users';
    const table = $('#table');
    const columns = [
        { 'data': null },   // row number
        { 'data': null },   // checkbox
        { 'data': 'name' },
        { 'data': 'father_name' },
        { 'data': 'course' },
        { 'data': 'roll_no' },
        { 'data': 'mobile' },
        { 'data': 'email' },
        { 'data': 'dob' },
        { 'data': 'other_information' },
        { 'data': null },
        // { 'data': null }
    ];

    if (table.length) {
        $.extend(true, $.fn.dataTable.Buttons.defaults, {
        dom: {
                button: {
                    className: 'btn' // ab koi default class nahi lagegi
                }
            }
        });
        const dt = table.DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print',
                {
                    text: 'Delete Selected',
                    className: 'btn btn-danger delete-selected-btn d-none', // hidden by default
                    action: function () {
                        const ids = [];
                        table.find('input.user-select:checked').each(function () {
                            ids.push($(this).val());
                        });

                        if (ids.length === 0) {
                            toastr.warning('Please select at least one user to delete.');
                            return;
                        }

                        if (!confirm("Are you sure to delete selected users?")) {
                            return;
                        }

                        $.ajax({
                            url: ajax_url + delete_url,
                            type: 'POST',
                            data: { ids: ids },
                            success: function (resp) {
                                toastr.success('Selected users deleted successfully.');
                                dt.ajax.reload();
                            },
                            error: function (xhr) {
                                toastr.error('Error deleting users.');
                            }
                        });
                    }
                }
            ],
            ajax: {
                url: ajax_url + list_url,
                success: function (d) {
                    if (d.data && d.data.length) {
                        dt.clear();
                        dt.rows.add(d.data).draw();
                    }
                    else {
                        toastr.error('Table Data Not Found.');
                        DataTableEmptyMessage(table);
                    }
                },
                error: function (a, b, v) {
                    console.warn(a.responseText);
                }
            },
            columns: columns,
            columnDefs: [
                {
                    targets: 0,
                    render: function (data, type, row, meta) {
                        return `${meta.row + 1}.`;
                    }
                },
                {
                    targets: 1,
                    orderable: false,
                    className: 'text-center',
                    title: `<input type="checkbox" id="select-all">`, // header checkbox
                    render: function (data, type, row, meta) {
                        return `<input type="checkbox" class="user-select" value="${row.id}">`;
                    }
                },
                {
                    targets: 4,
                    render: function (data, type, row, meta) {
                        return `${row.course} (${row.duration})`;
                    }
                },
                {
                    targets: -1,
                    render: function (data, type, row) {
                        return `
                            <a href="${row.image == '' ? '#' : base_url + 'upload/' + row.image}" 
                               target="_blank" 
                               class="btn btn-xs btn-sm btn-primary p-1 my-2" 
                               title="Image (परोफ़ील इमेज )">
                               <i class="fa fa-file"></i> Image</a>
                            <a href="${row.educational_doc == '' ? '#' : base_url + 'upload/' + row.educational_doc}" 
                               target="_blank" 
                               class="btn btn-xs btn-sm btn-primary p-1" 
                               title="Educational Document (एजुकेशनल डाक्यमेन्ट )">
                               <i class="fa fa-file"></i> Edu Doc</a>
                        `;
                    }
                },
                // {
                //     targets: -1,
                //     data: null,
                //     orderable: false,
                //     className: 'text-end',
                //     render: function (data, type, row) {
                //         return `<div class="btn-group">
                //                     ${deleteBtnRender(1, row.id)}
                //                 </div>`;
                //     }
                // }
            ]
        });

        // Checkbox change event
        table.on('change', '.user-select', function () {
            toggleDeleteButton();
            updateSelectAllCheckbox();
        });

        // Header select all
        table.on('change', '#select-all', function () {
            const checked = $(this).prop('checked');
            table.find('.user-select').prop('checked', checked);
            toggleDeleteButton();
        });

        function toggleDeleteButton() {
            const anyChecked = table.find('.user-select:checked').length > 0;
            const btn = $('.delete-selected-btn');
            if (anyChecked) {
                btn.removeClass('d-none');
            } else {
                btn.addClass('d-none');
            }
        }

        function updateSelectAllCheckbox() {
            const allCheckboxes = table.find('.user-select');
            const checkedCheckboxes = table.find('.user-select:checked');
            $('#select-all').prop('checked', allCheckboxes.length === checkedCheckboxes.length && allCheckboxes.length > 0);
        }
    }
});
