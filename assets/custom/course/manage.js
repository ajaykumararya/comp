document.addEventListener('DOMContentLoaded', function (e) {
    const delete_url = 'course/delete';
    const form = document.getElementById('add_course');
    const list_url = 'course/list';
    const delet_list_url = 'course/delete_list';
    const save_url = 'course/add';
    const table = $('#course_list');
    const delete_table= $('#deleted_course_list');
    const columns = [
        { 'data': 'course_name' },
        { 'data': 'category' },
        { 'data': 'duration' },
        { 'data': 'fees' },
        { 'data': null }
    ];
    // var dt = '';
    if (table.length) {
        const dt = table.DataTable({
            dom: small_dom,
            buttons: [],
            ajax: {
                url: ajax_url + list_url,
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
                error: function (a, b, v) {
                    console.warn(a.responseText);
                }
            },
            columns: columns,
            columnDefs: [
                {
                    targets: 1,
                    render: function (data, type, row) {
                        if(row.category)
                            return `<label class="badge badge-dark">${row.category}</label>`;
                        else
                            return  `<label class="badge badge-danger">Category Deleted</label>`;
                    }
                },
                {
                    targets: 2,
                    render: function (data, type, row) {
                        var badgeClass = duration_badge(row.duration_type, duration_colors);//) ? duration_colors[row.duration_type] : 'danger';
                        return `<lable class="badge badge-${badgeClass}"> ${course_duration_humnize_without_ordinal(row.duration, row.duration_type)}</lable>`;//row.duration+ ` </>`;
                    }
                },
                {
                    targets: 3,
                    render: function (data, type, row) {
                        return (data ? data : 0) + ` <i class="fa fa-rupee"></i>`;
                    }
                },
                {
                    targets: -1,
                    data: null,
                    orderable: false,
                    className: 'text-end',
                    render: function (data, type, row) {
                        // console.log(row);
                        return `<div class="btn-group">
                                    <buttons class="btn btn-primary btn-xs btn-sm edit-record"><i class="ki-outline ki-pencil"></i> Edit</buttons>
                                    ${row.hasOwnProperty('parent_id') ? `<button class="btn btn-info btn-xs btn-sm course-setting"><i class="fa fa-cog"></i></button>` : ``
                            }
                                    ${deleteBtnRender(0, row.course_id)}
                                </div>
                                `;
                    }
                }
            ]
        });
        dt.on('draw', function (e) {
            table.EditForm('course/edit', 'Edit Course');
            const handle = handleDeleteRows(delete_url);
            $('.course-setting').on('click', function () {
                var rowData = table.DataTable().row($(this).closest('tr')).data();
                // console.log(rowData.course_id);
                if (rowData.hasOwnProperty('course_id') && rowData.hasOwnProperty('parent_id')) {
                    $.AryaAjax({
                        url: 'course/setting_form',
                        data: { id: rowData.course_id },
                        loading_message: 'Loading Edit Form...'
                    }).then((response) => {
                        // console.log(response);
                        showResponseError(response);
                        if (response.status) {
                            myModel('Change Setting', response.html, true);
                        }
                    });
                }
            });

            handle.done(function (e) {
                // console.log(e);
                table.DataTable().ajax.reload();
                delete_table.DataTable().ajax.reload();
            });
        })
    }
    if(delete_table.length){
        const ddt = delete_table.DataTable({
            dom: small_dom,
            buttons: [],
            ajax: {
                url: ajax_url + delet_list_url
            },
            columns: columns,
            columnDefs: [
                {
                    targets: 1,
                    render: function (data, type, row) {
                        if(row.category)
                            return `<label class="badge badge-dark">${row.category}</label>`;
                        else
                            return  `<label class="badge badge-danger">Category Deleted</label>`;
                    }
                },
                {
                    targets: 2,
                    render: function (data, type, row) {
                        var badgeClass = duration_badge(row.duration_type, duration_colors);//) ? duration_colors[row.duration_type] : 'danger';
                        return `<lable class="badge badge-${badgeClass}"> ${course_duration_humnize_without_ordinal(row.duration, row.duration_type)}</lable>`;//row.duration+ ` </>`;
                    }
                },
                {
                    targets: 3,
                    render: function (data, type, row) {
                        return (data ? data : 0) + ` <i class="fa fa-rupee"></i>`;
                    }
                },
                {
                    targets: -1,
                    data: null,
                    orderable: false,
                    className: 'text-end',
                    render: function (data, type, row) {
                        return `<div class="btn-group">                                
                                <button class="btn btn-sm btn-light-primary undelete-btn">
                                    <i class="fa fa-arrow-left"></i> Move to list
                                </button>
                                <button class="btn btn-sm btn-light-danger delete-btn">
                                    <i class="fa fa-trash"></i> Delete
                                </button>
                            </div>`;
                    }
                }
            ]
        });
        ddt.on('draw',function(e){
            delete_table.unDeleteEvent('course', 'Course','course_id');
            $('.delete-btn').click(function () {
                // log(table.DataTable().data)
                var rowData = delete_table.DataTable().row($(this).closest('tr')).data();
                // log(rowData);
                SwalWarning('Confirmation!', 'Are you sure for permanently delete .', true, 'Delete IT').then((r) => {
                    // log(r);
                    if (r.isConfirmed) {
                        $.AryaAjax({
                            url: 'course/param_delete',
                            data: rowData
                        }).then((e) => {
                            if (e.status) {
                                SwalSuccess('Success', 'Deleted Successfully..').then((e) => {
                                    if(e.isConfirmed){
                                        delete_table.DataTable().ajax.reload();
                                    }
                                });
                            }
                            showResponseError(e);
                        });
                    }
                });
            });
        })
    }
    if (form) {
        var validator = FormValidation.formValidation(
            form,
            {
                fields: {
                    course_name: {
                        validators: {
                            notEmpty: {
                                message: 'Enter A Valid Course Name'
                            }
                        }
                    },
                    category_id: {
                        validators: {
                            notEmpty: {
                                message: 'Select a course category'
                            }
                        }
                    },
                    duration: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter duration'
                            },
                            numeric: {
                                message: 'Please enter a valid Duration.'
                            }
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.form-group',
                        eleInvalidClass: '',
                        eleValidClass: ''
                    })
                }
            }
        );
        form.addEventListener('submit', function (e) {
            // Prevent default button action
            e.preventDefault();
            var test = save_ajax(form, save_url, validator);
            test.done(function (data) {
                // alert('res');
                // console.log(data);
                table.DataTable().ajax.reload();
            })
        });
    }

    $(document).on('change', '.set-course-parent-certi', function () {
        var id = $(this).data('id');
        var parent_id = $(this).val();
        // alert(id)
        $.AryaAjax({
            url: 'course/update_multi_certi',
            data: { id: id, parent_id: parent_id },
            success_message: 'Setting Update Successfully.'
        }).then((er) => {
            // log(er)
            if (er.status)
                ki_modal.modal('hide')
        });
    })
});
