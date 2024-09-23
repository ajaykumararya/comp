document.addEventListener('DOMContentLoaded', function (e) {
    // alert(3)
    const student_Exams = $('#list-student-exams');
    student_Exams.DataTable({
        order: [],
        ajax: {
            url: ajax_url + 'exam/student-exams',
            error : function(xhr,s,d){
                log(xhr.responseText);
            }
        },
        columns: [
            { 'data': null },
            { 'data': 'roll_no' },
            { 'data': 'student_name' },
            { 'data': 'exam_title' },
            { 'data': 'attempt_time' },
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
                targets: 5,
                render: function (data, type, row) {
                    if (row.attempt_time) {
                        var per = formatNumber(row.percentage);
                        var edited = ``;
                        if(typeof row.isEdited !== undefined){
                            edited = row.isEdited == 1 ? badge('Edited','dark') : '';
                        }
                        return `${row.percentage > 33 ? badge('PASS') : badge('FAIL', 'danger')} with ${per}% ${edited}`;
                    }
                    return '';
                }
            },
            {
                targets: 4,
                render: function (data, type, row) {
                    // log(row);
                    if (data != null) {
                        return timeStringToTime(data);
                    }
                    return badge('Exam Not Done.', 'danger');
                }
            },
            {
                targets: -1,
                render: function (data, type, row) {
                    return `
                        <div class="btn-group">
                            ${row.attempt_time != null
                            ?
                            `<a class="btn btn-primary btn-xs btn-sm" target="_blank" href="${base_url}exam/online-exam-result/${btoa(row.id)}"><i class="fa fa-eye"></i></a>`
                            : ``
                        }
                            <button class="btn btn-xs btn-sm btn-info edit-record"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-xs btn-sm btn-danger delete"><i class="fa fa-trash"></i></button>
                        </div>`;
                }
            }
        ]
    }).on('draw', function () {
        student_Exams.EditForm('exam/update-student-exam','Update Student Exam Record');
        student_Exams.find('.delete').click(function (r) {
            r.preventDefault();
            var data = student_Exams.DataTable().row($(r.target).parents('tr')).data();
            SwalWarning('Confirmation','Are you sure for delete it.',true,'Parament Delete').then((btn) => {
                if(btn.isConfirmed){
                    // toastr.success('cliecked');
                    $.AryaAjax({
                        url: 'exam/delete-exam',
                        data : {exam_id : data.assign_exam_id}
                    }).then((res)=>{
                        if(res.status){
                            SwalSuccess('Student Exam','Deleted Successfully...').then((r) => {
                                if(r.isConfirmed)
                                    student_Exams.DataTable().ajax.reload();
                            })
                        }
                    });
                }
            })
        })
    });
})