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
                targets: 4,
                render : function(data,type,row){
                   if(data == 0)
                    return `<span class="badge badge-success">Not Used</span>`;
                   else if(data == 3)
                    return `<span class="badge badge-warning">Expired</span>`;
                   else
                    return `<span class="badge badge-danger">Used</span>`;
                }
            },  
            {
                targets : -1,
                render : function(){
                    return '';
                }
            }
        ]
    });
})