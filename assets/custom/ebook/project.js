document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('project-add');
    const delete_url = 'ebook/delete-project';
    $(document).on('keyup blur', '[name="project_name"]', function () {
        var title = $(this).val();
        var slug = createSlug(title);
        $(this).siblings("input[name='slug']").val(slug);
    });
    const file_type = $('select[name="file_type"]');

    file_type.on('change', function () {
        // alert(this.value);
        if (this.value == 'file') {
            $('.file').removeClass('d-none').find('input').attr('required', 'required');
            $('.link').addClass('d-none').find('input').removeAttr('required');;
        }
        else {
            $('.link').removeClass('d-none').find('input').attr('required', 'required').focus();
            $('.file').addClass('d-none').find('input').removeAttr('required');
        }
    })
    if (form) {
        var validation = MyFormValidation(form);
        validation.addField('category_id', {
            validators: {
                notEmpty: {
                    message: 'Select A Valid Category'
                }
            }
        });
        validation.addField('project_name', {
            validators: {
                notEmpty: {
                    message: 'Project name is required'
                }
            }
        });
        validation.addField('project_value', {
            validators: {
                notEmpty: {
                    message: 'Enter Valid Value'
                }
            }
        });
        validation.addField('price', {
            validators: {
                notEmpty: {
                    message: 'Enter Price'
                }
            }
        });
        validation.addField('description', {
            validators: {
                notEmpty: {
                    message: 'Enter Description'
                }
            }
        });
        validation.addField('image', {
            validators: {
                notEmpty: {
                    message: 'Please choose a file.'
                },
                file: {
                    extension: 'jpg,jpeg,png,gif',
                    type: 'image/jpeg,image/png,image/gif',
                    maxSize: max_upload_size, // 5 MB
                    message: 'The selected file is not valid. Allowed types: jpg, jpeg, png, gif. Maximum size: 2 MB.'
                }
            }
        });

        form.addEventListener('submit', function (e) {
            // Prevent default button action
            e.preventDefault();
            var file = $('#file')[0].files[0];
            file = file_type.val() == 'file' ? file : null;

            $.AryaAjax({
                url: 'ebook/add-project',
                file: file,
                validation: validation,
                data: new FormData(form),
            }).then((res) => {
                // log(res);
                if (res.status) {
                    toastr.success(
                        'Project Added Successfully',
                    );
                    location.reload();
                }
                showResponseError(res)
            });
        });

        $(document).on('keyup blur', '[name="category_name"]', function () {
            var title = $(this).val();
            var slug = createSlug(title);
            $(this).siblings("input[name='slug']").val(slug);
        });
    }
    const table = $('#table');
    const columns = [
        { 'data': null },
        { 'data': 'image' },
        { 'data': 'category_name' },
        { 'data': 'project_name' },
        { 'data': 'project_value' },
        { 'data': 'price' },
        { 'data': 'file' },
        { 'data': 'status' },
        { 'data': null },
    ];
    // var dt = '';
    if (table.length) {
        const dt = table.DataTable({
            dom: small_dom,
            buttons: [],
            ajax: {
                url: ajax_url + 'ebook/list_projects',
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
                    orderable: false,
                    render: function (data, type, row, meta) {
                        return `${meta.row + 1}.`;
                    }
                },
                {
                    targets: 1,
                    orderable: false,
                    render: function (data, type, row, meta) {
                        return `<img style="width:50px" src="${base_url}upload/${row.image}">`;
                    }
                },
                {
                    targets: 5,
                    render: function (data, type, row, meta) {
                        return `${data} ${inr}`;
                    }
                },
                {
                    targets: 6,
                    render: function (data, type, row) {
                        log(row)
                        var link = (row.file_type === 'file') ? base_url + 'upload/project/' + data : `${data}`;
                        return `<a href="${link}" target="_blank" class="btn btn-sm btn-info btn-xs btn-sm">View</a>`;
                    }
                },
                {
                    targets: 7,
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
                                   ${deleteBtnRender(0, row.id)}
                                </div>
                                `;
                    }
                }
            ]
        });
        dt.on('draw', function (e) {
            const handle = handleDeleteRows(delete_url);
            handle.done(function (e) {
                // console.log(e);
                table.DataTable().ajax.reload();
            });
            table.find('.check-status').on('change', function () {
                // alert(this.value);
                const id = $(this).val();
                const status = $(this).is(':checked') ? 1 : 0;
                $.AryaAjax({
                    url: 'ebook/update-project-status',
                    data: { id, status },
                    success_message: 'Status Changed Successfully..'
                });
            })
        })
    }
})