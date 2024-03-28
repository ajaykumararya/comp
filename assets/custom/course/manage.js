document.addEventListener('DOMContentLoaded', function (e) {
    const delete_url = 'course/delete';
    const form = document.getElementById('add_course');
    const list_url = 'course/list';
    const save_url = 'course/add';
    const table = $('#course_list');
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
                error : function(a,b,v){
                    console.warn(a.responseText);
                }
            },
            columns: columns,
            columnDefs: [
                {
                    targets : 1,
                    render : function(data,type,row){
                        return `<label class="badge badge-dark">${row.category}</label>`;
                    }
                },
                {
                    targets : 2,
                    render : function(data,type,row){
                        var badgeClass = duration_badge(row.duration_type, duration_colors);//) ? duration_colors[row.duration_type] : 'danger';
                        return `<lable class="badge badge-${badgeClass}"> ${course_duration_humnize_without_ordinal(row.duration,row.duration_type)}</lable>`;//row.duration+ ` </>`;
                    }
                },
                {
                    targets : 3,
                    render : function(data,type,row){
                        return ( data ? data : 0 ) + ` <i class="fa fa-rupee"></i>`;
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
                                    ${deleteBtnRender(0, row.course_id)}
                                </div>
                                `;
                    }
                }
            ]
        });
        dt.on('draw', function (e) {
            table.EditForm('course/edit','Edit Course');
            const handle = handleDeleteRows(delete_url);
            handle.done(function (e) {
                // console.log(e);
                table.DataTable().ajax.reload();
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
                    category_id : {
                        validators :{
                            notEmpty: {
                                message : 'Select a course category'
                            }
                        }
                    },
                    duration : {
                        validators:{
                            notEmpty : {
                                message : 'Please Enter duration'
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
});
