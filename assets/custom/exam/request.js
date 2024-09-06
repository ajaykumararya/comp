document.addEventListener('DOMContentLoaded',function(e){
    const requestForm = document.getElementById('add_request');
    const requestTable = $('#requestTable');
    const course_box = $('select[name="course_id"]');
    var validation = MyFormValidation(requestForm);
    // log(validation);
    validation.addField('course_id',{
        validators : {
            notEmpty : { message : 'Course is Required.'}
        }
    });
    validation.addField('duration',{
        validators : {
            notEmpty : { message : 'Select Duration'}
        }
    });

    validation.addField('message',{
        validators : {
            notEmpty: {message : 'Write something in Message'}
        }
    })

    requestTable.DataTable({
        dom : small_dom,
        ajax : {
            url :`${ajax_url}exam/list-requests`,
            error : function(d,v,c){
                warn(d.responseText);
            }
        },
        columns : [
            {'data' : null},
            {'data' : null},
            {'data' : null},
        ],
        columnDefs : [
            {
                targets : 0,
                render : function(data,type,row,meta){
                    return `${meta.row + 1}`;
                }
            },
            {
                targets : 1,
                render : function(data,type,row){
                    var badgeClass = duration_badge(row.duration_type, duration_colors);//) ? duration_colors[row.duration_type] : 'danger';
                    return `${row.course_name} <lable class="badge badge-${badgeClass}"> ${course_duration_humnize_without_ordinal(row.duration, row.duration_type)}</lable>`;//row.duration+ ` </>`;
                }
            },
            {
                targets : 2,
                render : function(data,type,row){
                   if(row.status == 0){
                        return `<label class="badge badge-warning">Pending..</label>`;
                   }
                }
            }
        ]
    });


    requestForm.addEventListener('submit',function(e){
        e.preventDefault();
        $.AryaAjax({
            url  : 'exam/submit-request',
            data : new FormData(requestForm),
            validation : validation,
            success_message : 'Requestion Submitted Successfully'
        }).then( (e) => {
            // requestTable.DataTable().ajax.reload();
            log(e);
        });
    });

    course_box.select2({
        placeholder: "Select a Course",
        templateSelection: optionFormatSecond,
        templateResult: optionFormatSecond,
    });
});