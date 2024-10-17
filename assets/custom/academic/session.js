document.addEventListener('DOMContentLoaded', function (e) {
    const delete_url = 'academic/delete-session';
    const form = document.getElementById('session_add');
    const list_url = 'academic/list-session';
    const save_url = 'academic/add-session';
    const table = $('#session_list');
    const columns = [
        { 'data': 'status' },
        { 'data': 'title' },
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
                }
            },
            columns: columns,
            columnDefs: [
                {
                    targets: 0,
                    orderable : false,
                    render: function (data, type, row) {
                        return `<div class="form-check form-switch form-check-custom form-check-solid me-10">
                                    <input class="form-check-input check-status" ${data == 1 ? 'checked' : ''} type="checkbox" value="${row.id}"/>                                    
                                </div>`;
                    }
                },
                {
                    targets: -1,
                    data: null,
                    orderable: false,
                    className: 'text-end',
                    render: function (data, type, row) {
                        // console.log(data);
                        return `<div class="btn-group">
                                    <buttons class="btn btn-primary btn-xs btn-sm edit-record"><i class="ki-outline ki-pencil"></i> Edit</buttons>
                                    ${deleteBtnRender(0, row.id)}
                                </div>
                                `;
                    }
                }
            ]
        });
        dt.on('draw', function (e) {
            EditForm(table,'academic/edit-session','Edit Session');
            const handle = handleDeleteRows(delete_url);
            handle.done(function (e) {
                // console.log(e);
                table.DataTable().ajax.reload();
            });
            table.find('.check-status').on('change',function(){
                // alert(this.value);
                const id = $(this).val();
                const status = $(this).is(':checked') ? 1 : 0;
                $.AryaAjax({
                    url : 'academic/update-session-status',
                    data : {id,status},
                    success_message : 'Status Changed Successfully..'
                });
            })
        })
    }
    if (form) {
        var validator = FormValidation.formValidation(
            form,
            {
                fields: {
                    title: {
                        validators: {
                            notEmpty: {
                                message: 'Enter A Valid Session Name'
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
                // console.log(data);
                table.DataTable().ajax.reload();
            })
        });
    }
});
