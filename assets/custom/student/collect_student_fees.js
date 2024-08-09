document.addEventListener('DOMContentLoaded', async function (r) {
    const liststudentBox = $('select[name="student_id"]');
    select2Student(liststudentBox[0]);
    const searching_inputs_box = $('.searching-types-box');
    const fees_structure_box = $('.fees-structure-box');
    const fees_box_footer = $('.footer-box');
    liststudentBox.on('change', function () {
        fees_structure_box.html('');
        searching_inputs_box.html('');
        $.AryaAjax({
            url: 'fees/get-fees-types',
            data: { id: $(this).val() }
        }).then((r) => {
            searching_inputs_box.html(`<div class="form-group"><label class="mb-5">Select Criteria</label>${r.html}</div>`);

        });
    });
    $(document).on('change', '.select-search-type', function (r) {
        var type = $(this).val();
        var student_id = liststudentBox.val();
        // alert(type)
        $.AryaAjax({
            url: 'fees/get-fees-structure',
            data: { id: student_id, type: type }
        }).then((r) => {
            fees_structure_box.html(r.html);
            fees_box_footer.html(r.footer);
            calculate_fees();
        });
    })
    //89619
    $(document).on("keyup blur",'.amount,.discount',function(){
        calculate_fees();
    });
    $(document).on('change','.check-input',calculate_fees);
    function calculate_fees(){
        var total = 0,
            ttl_discount = 0;
        $('.check-input:checked').each(function(r){
            var box = $(this).closest('.my-fee-box');
            var amount = parseFloat(box.find('.amount').val());
            var discount_amount = parseFloat(box.find('.discount').val());
            total += amount;
            ttl_discount += discount_amount;
        });
        var total_amount = total - ttl_discount;
        // alert(total_amount);
        $('.ttl-discount').html(ttl_discount);
        $('.payable-amount').html(total_amount);
        $('.paid-amount').html(total_amount);
        $('.pay-now').prop('disabled',!(total_amount >= 0));
        
    }
});