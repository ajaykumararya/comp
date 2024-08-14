document.addEventListener('DOMContentLoaded',function(e){
    const table = $('#marksheets');

    var dt = table.DataTable({
        ajax : {
            url : ajax_url + 'student/list-marksheets',
            error : function(a,v,c){
                log(a.responseText);
            }
        },
        columns : [
            {'data' : 'roll_no'},
            {'data' : 'student_name'},
            {'data' : 'course_name'},
            {'data' : 'marksheet_duration'},
            {'data' : 'center_name'},
            {'data' : null}
        ],
        columnDefs : [
            {
                targets : 3,
                render:function(data,type,row){
                    return `${ordinal_number(data)} ${$.ucfirst(row.duration_type)} 
                        ${row.duration == row.marksheet_duration ? badge('Final Marksheet', 'success text-black') : ''}
                    `;
                }
            },
            {
                targets : -1,
                orderable : false,
                render : function(data,type,row){
                    // log(row);
                    return `<div class="btn-group">
                            ${generate_link_btn(row.result_id,'marksheet')}
                            ${deleteBtnRender(1,row.result_id,'Marksheet')}
                    </div>`;
                }
            }
        ]
    }).on('draw',function(){
        handleDeleteRows('student/delete-marksheet');
    });
});