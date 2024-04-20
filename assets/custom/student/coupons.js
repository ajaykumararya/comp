document.addEventListener('DOMContentLoaded', async function () {
    const coupons = $('#coupons');

    let dt = coupons.DataTable({
        ajax: {
            url: ajax_url + 'student/coupons'
        },
        columns: [
            { 'data': null },
            { 'data': 'referral_student' },
            { 'data': 'student_name' },
            { 'data': 'coupon_code' },
            { 'data': 'isUsed' },
            { 'data': null },
        ],
        columnDefs: [
            {
                targets: 0,
                render: function (data, type, row, meta) {
                    return `${meta.row + 1}.`;
                }
            },
            {
                targets : 1,
                render : function(data,type,row){
                    return `<a target="_blank" class="text-dark fs-3" href="${base_url}student/profile/${row.coupon_by}">${data} &nbsp;&nbsp;<i class="fa fa-eye text-success"></i></a>`;
                }
            },            
            {
                targets : 2,
                render : function(data,type,row){
                    return `<a target="_blank" class="text-dark fs-3" href="${base_url}student/profile/${row.student_id}">${data} &nbsp;&nbsp;<i class="fa fa-eye text-success"></i></a>`;
                }
            },
            {
                targets: 4,
                render : function(data,type,row){
                   if(data == 0)
                    return `<span class="badge badge-warning">Pending</span>`;
                   else if(data == 2)
                    return `<span class="badge badge-danger">Expired</span>`;
                   else if(data == 3)
                    return `<span class="badge badge-danger">Rejected</span>`;
                   else
                    return `<span class="badge badge-success">Used</span>`;
                }
            },  
            {
                targets : -1,
                render : function(data,type,row){
                    return `<button class="btn btn-primary btn-xs btn-sm edit-form-btn" data-id="${row.id}">Update</button>`;
                }
            }
        ]
    }).on('draw',function(){
        $(this).EditAjax('student/coupon-update-form','Coupon Status','small');
    });
})