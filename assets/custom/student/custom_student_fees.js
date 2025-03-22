document.addEventListener('DOMContentLoaded', function () {
    // alert(4);
    const liststudentBox = $('select[name="student_id"]');
    const form = $('.collect-student-fees');
    const fees_structure_box = $('.record-print');
    select2Student(liststudentBox[0]);
    const feeInfo = $('.fee-info');
    const fees_box_footer = $('.footer-box');
    liststudentBox.on('change', function () {
        fees_structure_box.html('');
        var student_id = $(this).val();
        feeInfo.html('');
        if ($(this).val() == '')
            return;
        // alert(this.value);
        $.AryaAjax({
            url: 'student/custom-student-fees',
            data: { student_id }
        }).then((res) => {
            if (res.status == 'setfee') {
                Swal.fire({
                    title: "Set Student Fee",
                    html: `
                        <input type="text" id="fee_amount" class="swal2-input" focus placeholder="Enter Fee Amount">
                    `,
                    confirmButtonText: "Save Fee",
                    showCancelButton: true,
                    allowOutsideClick: false,
                    cancelButtonText: "Cancel",
                    preConfirm: function () {
                        let fee_amount = $("#fee_amount").val();

                        if (!student_id || !fee_amount) {
                            Swal.showValidationMessage("Please Enter Fee");
                            return false;
                        }

                        return { student_id, fee_amount };
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        // console.log(result.value);
                        $.AryaAjax({
                            url: 'student/set-student-custom-fee',
                            data : result.value
                        }).then((res) => {
                            liststudentBox.trigger('change');
                        });
                    }
                    else
                        location.reload();
                });
            }
            else{
                feeInfo.html(res.feeInfo);
                fees_structure_box.html(res.html);
                loadSomeFuncation();
            }
        });
    });
    form.on('submit',function(r){
        r.preventDefault();
        // alert(3333);
        $.AryaAjax({
            url : 'student/submit-student-custom-fee',
            data : new FormData(this),
            success_message : 'Student Fee Submitted Successfully..'
        }).then((rr) => {
            // console.log(rr)
            liststudentBox.trigger('change');
            
        });
    })
})