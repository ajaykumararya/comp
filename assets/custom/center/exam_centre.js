document.addEventListener('DOMContentLoaded',function(){
    // alert(3);
    const form = document.getElementById('form');

    const validation = MyFormValidation(form);
    validation.addField('centre_name',{        
        validators:{
            notEmpty :{
                message : 'Centre Name is Required.'
            }
        }
    });
    validation.addField('centre_code',{        
        validators:{
            notEmpty :{
                message : 'Centre Code is Required.'
            }
        }
    });
    validation.addField('centre_address',{        
        validators:{
            notEmpty :{
                message : 'Centre Address is Required.'
            }
        }
    });
    $(form).submit(function(r){
        r.preventDefault();
        $.AryaAjax({
            url : 'center/add-exam-centre',
            validation : validation,
            data : new FormData(form)
        }).then((res) => {
            showResponseError(res);
        });
    });
    const exam_center = $('#table');
    exam_center.DataTable({
        ajax : {
            url : `${ajax_url}center/list-exam-centre`
        },
        'columns': [
            {'data':null},
            {'data':'centre_name'},
            {'data':'centre_code'},
            {'data':'centre_address'},
            { 'data': null }
            // Add more columns as needed
        ],
        'columnDefs': [
            {
                targets : 0,
                render : function(data,type,row,meta){
                    return `${meta.row+1}.`;
                }
            },
            {
                targets : -1,
                orderable : false,
                render : function(data,type,row){
                    return `<div class="">
                            <button class="btn btn-primary edit-record btn-sm" data-id="${row.id}"><i class="fa fa-edit"></i> Edit</button>
                            ${deleteBtnRender(1, row.id)}
                        </div>`;
                }
            }
        ]
    }).on('draw',function(){
        exam_center.EditForm('center/update_centre_exam', 'Centre Update');
        handleDeleteRows('center/delete-exam-centre').then((e) => exam_center.DataTable().ajax.reload());
    });
})