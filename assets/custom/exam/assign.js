document.addEventListener('DOMContentLoaded', function (r) {
    const exam_table = $('#list-exams');
    var count = 1;
    var rowData = [];
    const exam_type = exam_table.data('type') ?? 'center';
    exam_table.DataTable({
        dom: small_dom,
        ajax: {
            url: ajax_url + 'exam/list',
            error: function (a, v, c) {
                console.log(a.responseText);
            }
        },
        columns: [
            { 'data': null },
            { 'data': 'exam_title' },
            { 'data': 'course_name' },
            { 'data': null },
            { 'data': null },
            { 'data': null }
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
                render: function (data, type, row) {
                    var badgeClass = duration_badge(row.duration_type, duration_colors);//) ? duration_colors[row.duration_type] : 'danger';
                    return `${row.course_name} <lable class="badge badge-${badgeClass}"> ${course_duration_humnize_without_ordinal(row.duration, row.duration_type)}</lable>`;//row.duration+ ` </>`;
                }
            },
            {
                targets: 3,
                orderable: false,
                render: function (data, type, row) {
                    if (row.schedule_status == 1 && row.schedule) {
                        var sc = row.schedule;
                        var fillterSc = sc.split(' - ');
                        return `
                            <lable class="badge badge-dark">Form : ${fillterSc[0]}</lable>
                            <label class="badge badge-dark mt-1">To : ${fillterSc[1]}</label>
                        `;
                    }
                    else
                        return `<label class="badge badge-danger">No Schedule</label>`;
                }
            },
            {
                targets: 4,
                orderable: false,
                render: function (data, type, row) {
                    if (row.timer_status == 1 && row.timer != null)
                        return `${hourConvert(row.timer)}`;
                    else
                        return `<label class="badge badge-danger">No Timer</label>`;
                }
            },
            {
                targets: -1,
                orderable: false,
                render: function (data, type, row) {
                    log(row)
                    return `
                        <div class="btn-group">
                            <button class="btn btn-sm btn-info">
                                <i class="ki-duotone fs-1 ki-user-tick ">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                                Assign To ${exam_type == 'student' ? 'Student' : 'Center'}
                            </button>
                        </div>
                    `;
                }
            }
        ]
    }).on('draw', function (e) {
        exam_table.find('button').on('click', function () {
            var rowData = exam_table.DataTable().row($(this).closest('tr')).data();
            //    log(rowData);
            $.AryaAjax({
                url: 'exam/list-assign-students',
                data: rowData
            }).then((r) => {
                if (r.status) {
                    var drawer = mydrawer('Exam');
                    drawer.find('.card-body').html(r.html).css({
                        paddingTop: 0
                    });
                    drawer.find('.table').DataTable({
                        paging: false,
                        dom: small_dom
                    });
                    drawer.find('.form-check-input').on('change', function () {
                        var checkStatus = $(this).is(':checked');
                        $.AryaAjax({
                            url: 'exam/assign-to-student',
                            data: {
                                student_id: $(this).val(),
                                exam_id: rowData.exam_id,
                                center_id: $(this).data('center_id'),
                                check_status : checkStatus
                            }
                        }).then((e) => {
                            toastr.clear();
                            if(e.status)
                                toastr.success(`Student ${checkStatus ? 'Added' : 'Removed'} Successfully..`);
                            else
                                toastr.error('Something Went Wrong!');
                        });
                    })
                }
            })
        })
    });
}
);
