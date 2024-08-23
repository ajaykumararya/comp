document.addEventListener('DOMContentLoaded', function (e) {
    const course_form = document.getElementById('add-course-content');
    const course_list = $('#list-content-courses');
    const certificate_form = document.getElementById('add-certificate-content');
    const certificate_list = $('#list-certificates');
    const add_acheivment = document.getElementById('add-acheivment');
    var index = 1;
    var validation;
    if (course_form)
        validation = MyFormValidation(course_form);
    if (certificate_form)
        validation = MyFormValidation(certificate_form);
    if (course_form || certificate_form) {
        validation.addField('title', {
            validators: {
                notEmpty: { message: 'Course name is required' }
            }
        });
        validation.addField('image', {
            validators: {
                notEmpty: { message: 'Please select a Image' },
                file: {
                    extension: 'jpg,jpeg,png,gif',
                    type: 'image/jpeg,image/png,image/gif',
                    maxSize: max_upload_size, // 5 MB
                    message: 'The selected file is not valid. Allowed types: jpg, jpeg, png, gif. Maximum size: 2 MB.'
                }
            }
        })
    }
    if (certificate_form) {
        var ct = certificate_list.DataTable({
            dom: small_dom,
            ajax: {
                url: ajax_url + 'cms/list-content-certificates',
                success: function (d) {
                    // console.log(d);
                    if (d.data && d.data.length) {
                        ct.clear();
                        ct.rows.add(d.data).draw();
                    }
                    else {
                        toastr.error('Table Data Not Found.');
                        DataTableEmptyMessage(certificate_list);
                    }
                },
                error: function (a, b, v) {
                    console.warn(a.responseText);
                }
            },
            columns: [
                { 'data': null },
                { 'data': 'image' },
                { 'data': 'title' },
                { 'data': null }
            ],
            columnDefs: [
                {
                    target: 0,
                    render: function (data, type, row) {
                        return `${index++}.`;
                    }
                },
                {
                    target: 1,
                    render: function (data, type, row) {
                        return `<img class="rounded-1 w-70px" src="${base_url}upload/${data}">`;
                    }
                },
                {
                    target: -1,
                    orderable: false,
                    render: function (data, type, row) {
                        return deleteBtnRender(1, row.id);
                    }
                }
            ]
        });
        ct.on('draw', function (r) {
            handleDeleteRows('cms/delete-content-certificate').then((e) => certificate_list.DataTable().ajax.reload())
        })
        certificate_form.addEventListener('submit', (e) => {
            e.preventDefault();
            var data = new FormData(certificate_form);
            $.AryaAjax({
                data: data,
                validation: validation,
                url: 'cms/add-certificate-for-content'
            }).then((r) => certificate_list.DataTable().ajax.reload());
        });
    }
    if (course_form) {
        var dt = course_list.DataTable({
            dom: small_dom,
            ajax: {
                url: ajax_url + 'cms/list-content-courses',
                success: function (d) {
                    // console.log(d);
                    if (d.data && d.data.length) {
                        dt.clear();
                        dt.rows.add(d.data).draw();
                    }
                    else {
                        toastr.error('Table Data Not Found.');
                        DataTableEmptyMessage(course_list);
                    }
                },
                error: function (a, b, v) {
                    console.warn(a.responseText);
                }
            },
            columns: [
                { 'data': null },
                { 'data': 'image' },
                { 'data': 'title' },
                { 'data': 'button_text' },
                { 'data': null }
            ],
            columnDefs: [
                {
                    target: 0,
                    render: function (data, type, row) {
                        return `${index++}.`;
                    }
                },
                {
                    target: 1,
                    render: function (data, type, row) {
                        return `<img class="rounded-1 w-70px" src="${base_url}upload/${data}">`;
                    }
                },
                {
                    target: 3,
                    render: function (data, type, row) {
                        return data ? `<a href="${row.button_link}" class="btn p-2 w-100 btn-xs border-primary border btn-active-primary">${data}</a>` : `<i class="text-danger">No Button</i>`;
                    }
                },
                {
                    target: -1,
                    orderable: false,
                    render: function (data, type, row) {
                        return deleteBtnRender(1, row.id);
                    }
                }
            ]
        });
        dt.on('draw', function (r) {
            handleDeleteRows('cms/delete-content-course').then((e) => course_list.DataTable().ajax.reload())
        })
        course_form.addEventListener('submit', (e) => {
            e.preventDefault();
            var data = new FormData(course_form);
            $.AryaAjax({
                data: data,
                validation: validation,
                url: 'cms/add-course-for-content'
            }).then((r) => course_list.DataTable().ajax.reload());
        });
    }


    if (add_acheivment) {
        const list_acheivements = $('#list-acheivements');
        var dt = list_acheivements.DataTable({
            dom: small_dom,
            ajax: {
                url: ajax_url + 'cms/list-content-acheivements',
                success: function (d) {
                    // console.log(d);
                    if (d.data && d.data.length) {
                        dt.clear();
                        dt.rows.add(d.data).draw();
                    }
                    else {
                        toastr.error('Table Data Not Found.');
                        DataTableEmptyMessage(course_list);
                    }
                },
                error: function (a, b, v) {
                    console.warn(a.responseText);
                }
            },
            columns: [
                { 'data': null },
                { 'data': 'counter' },
                { 'data': 'description' },
                { 'data': null }
            ],
            columnDefs: [
                {
                    target: 0,
                    render: function (data, type, row) {
                        return `${index++}.`;
                    }
                },
                {
                    target: -1,
                    orderable: false,
                    render: function (data, type, row) {
                        return deleteBtnRender(1, row.id);
                    }
                }
            ]
        });
        dt.on('draw', function (r) {
            handleDeleteRows('cms/delete-our-acheivement').then((e) => list_acheivements.DataTable().ajax.reload())
        })
        add_acheivment.addEventListener('submit', function (r) {
            r.preventDefault();
            $.AryaAjax({
                data: new FormData(add_acheivment),
                url: 'cms/save_acheivement',
                success_message: 'Acheivement Added Successfully'
            }).then((r) => list_acheivements.DataTable().ajax.reload());
        })
    }
    // if($('.edit-faculty').length){
    //     $('[setting-table]').EditForm();
    // }
    $(document).on('click', '.edit-faculty', function () {
        // var id = $(this).data('id');
        var rowData = $('[setting-table]').DataTable().row($(this).closest('tr')).data();
        var id = atob(rowData[6]);
        var title = rowData[3];
        const div = document.createElement("div");
        div.innerHTML = rowData[4];
        var link = div.textContent || div.innerText || "";
        link = link == 'Empty' ? '' : link;
        // log(rowData)
        my_template('formTemplate', {
            id, title, link
        }).then((e) => {
            myModel('Edit Faculty Data', e, 'website/factuly-update').then((d) => {
                // log(d);

                if (d.status) {
                    SwalSuccess('Success', 'Data Updated Successfully..').then((re) => {
                        if (re.isConfirmed)
                            location.reload();
                    });
                }
                else {
                    // alert('hi');
                    if ('errors' in d) {
                        log(d.errors);
                        $.each(d.errors, function (i, v) {
                            toastr.error(v);
                        });
                    }
                    else {
                        mySwal('Something Went Wrong.', 'Record not Update.', 'error')
                    }
                }
            });
        });
    })

});
