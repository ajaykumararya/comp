document.addEventListener('DOMContentLoaded' , async function(){
    const coupons = $('#coupons');

    let dt = coupons.DataTable({
        ajax : {
            url : 'student/coupons'
        },
        columns : [
            {'data' : null},
            {'data' : 'student_name'},
            {'data' : 'coupon_code'},
            {'data' : 'isUsed'},
            {'data' : null},
        ]
    });
})