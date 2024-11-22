document.addEventListener('DOMContentLoaded',function(){
    passoutStudentSelect2('select[name="student_id"]');
    var add_form = document.getElementById('add-placement')
    var validator = FormValidation.formValidation(
        add_form,
        {
            fields: {
                student_id: {
                    validators: {
                        notEmpty: {
                            message: 'Student is required'
                        }
                    }
                },
                designation: {
                    validators: {
                        notEmpty: {
                            message: 'Designation is required'
                        }
                    }
                },
                company_name: {
                    validators: {
                        notEmpty: { message: 'Company Name is required' }
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
    $('#add-placement').on('submit',function(e){
        e.preventDefault();
        $.AryaAjax({
            url : 'student/add_palcement_student',
            validation : validator,
            data : new FormData(this),
            success_message : 'Student Assigned Successfully..',
            page_reload : true
        }).then((res) => {
            if(!res.status){
                showResponseError(res);
            }
        });
    })
    const table = $('#listplacements')
    table.DataTable({
        dom:small_dom,
        ajax : {
            url : ajax_url + 'student/list-placement-students',
            error : function(a,v,c){
                log(a.responseText);
            }
        },
        columns : [
            {'data' : null},
            {'data' : 'student_name'},
            {'data' : 'designation'},
            {'data' : 'company_name'},
            {'data' : null}
        ],
        columnDefs : [
            {
                targets : 0,
                render:function(data,type,row,meta){
                    return `${meta.row + 1}.`;
                }
            },
            {
                targets : 1,
                render:function(data,type,row,meta){
                    return `<a class="d-flex" target="_blank" href="${base_url}student/profile/${row.student_id}">${data}</a>
                    
                    ${badge(row.course_name)}
                    ${badge(row.roll_no,'dark')}
                    
                    `;
                }
            },
            {
                targets : -1,
                orderable : false,
                render : function(data,type,row){
                    return deleteBtnRender(1,row.id);
                }
            }
        ]
    }).on('draw',function(){
        handleDeleteRows('student/delete-placement-student');
    });
})