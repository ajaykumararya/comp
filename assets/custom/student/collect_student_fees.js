document.addEventListener('DOMContentLoaded', async function (r) {
    const liststudentBox = $('select[name="student_id"]');
    const form = $('.collect-student-fees');
    select2Student(liststudentBox[0]);
    const searching_inputs_box = $('.searching-types-box');
    const fees_structure_box = $('.fees-structure-box');
    const fees_box_footer = $('.footer-box');
    liststudentBox.on('change', function () {
        fees_structure_box.html('');
        searching_inputs_box.html('');
        fees_box_footer.html('');
        if ($(this).val() == '')
            return;
        $.AryaAjax({
            url: 'fees/get-fees-types',
            data: { id: $(this).val() }
        }).then((r) => {
            if (r.status)
                searching_inputs_box.html(`<div class="form-group"><label class="mb-5">Select Criteria</label>${r.html}</div>`);
            else
                searching_inputs_box.html('');
            loadSomeFuncation();
        });
    });
    $(document).on('change', 'select.select-search-type', function (r) {
        var type = $(this).val();
        var student_id = liststudentBox.val();
        fees_box_footer.html('');
        fees_structure_box.html('');
        var course_id = $('input[name="course_id"]').val(),
            center_id = $('input[name="center_id"]').val(),
            roll_no = $('input[name="roll_no"]').val(),
            fee_emi = $('input[name="fee_emi"]').val(),
            fee_emi_type = $('input[name="fee_emi_type"]').val();
        fee_emi = fee_emi == '' ? null : fee_emi;
        // log( { student_id, type, course_id, center_id, roll_no, fee_emi, fee_emi_type });
        $.AryaAjax({
            url: 'fees/get-fees-structure',
            data: { student_id, type, course_id, center_id, roll_no, fee_emi, fee_emi_type }
        }).then((r) => {
            // log(r);
            fees_structure_box.html(r.html);
            if (typeof r.empty_footer && r.empty_footer)
                fees_box_footer.html('');
            else
                fees_box_footer.html(r.footer);
            calculate_fees();
            loadSomeFuncation();
        });
    })
    $(document).on('click','.setting-refresh',function(){
        $('.select-search-type').trigger('change');
    })
    $(document).on("keyup blur", '.amount,.discount', function () {
        var value = $(this).val();
        if (value.length > 1 && value.startsWith('0')) {
            // Remove the leading zero
            $(this).val(value.replace(/^0+/, ''));
        }
        if ($(this).val() === '') {
            $(this).val('0');
        }
        calculate_fees();
    });
    $(document).on('change', '.check-input,.penalty-input', calculate_fees);
    function calculate_fees() {
        var total = 0,
            ttl_discount = 0,
            ttl_penalty = 0;

        $('.my-fee-box').find('.card').removeClass('border-success').addClass('border-hover-primary');
        var flag = 0;
        $('.check-input:checked').each(function (r) {
            flag++;
            var box = $(this).closest('.my-fee-box');
            box.find('.card').addClass('border-success').removeClass('border-hover-primary');
            var amount = parseFloat(box.find('.amount').val());
            var discount_amount = parseFloat(box.find('.discount').val());
            var penalty = box.find('.penalty-input:checked').length ? 100 : 0;
            ttl_penalty += penalty;
            total += amount;
            ttl_discount += discount_amount;
        });
        // log(flag);   
        var total_amount = ( total - ttl_discount ) + ttl_penalty;
        // alert(total_amount);
        $('.ttl-discount').html(ttl_discount);
        $('.payable-amount').html(total);
        $('.penalty-amount').html(ttl_penalty);
        $('.paid-amount').html(total_amount );
        $('.pay-now').prop('disabled', ( (!(total_amount >= 0) || !flag)));
        if($('.check-input:checked').hasClass('d-none') && !total){
            $('.pay-now').prop('disabled', true);
        }

    }
    form.submit(function (d) {
        d.preventDefault();
        var form_data = new FormData(this);
        // log($(this).serializeArray());
        // return false;
        $.AryaAjax({
            url: 'fees/submit-fees',
            data: form_data
        }).then((e) => {
            if (e.status) {
                toastr.success('Fee Submitted Successfully...');
                $('.select-search-type').trigger('change');
            }
            showResponseError(e);
        });
    });
    $(document).on('change', '.check-emi-setup', function () {
        var box = $(this).closest('.card-body');
        box.find('.setup').toggleClass('d-none');
        $('.price-container').toggleClass('d-none');
    })
    $(document).on('change', '.cal-emis', function () {
        var emi = $(this).val();
        var box = $(this).closest('.card-body');
        var course_fees = box.find('input[name="course_fees"]').val();
        $('.emi-amount').text(Math.round(course_fees / emi));
    })
    $(document).on('click', '.next-button', function (e) {
        e.preventDefault();
        var box = $(this).closest('.card');
        var student_id = liststudentBox.val();

        var emi = 0;
        if (box.find('.check-emi-setup').is(':checked')) {
            emi = box.find('.cal-emis').val();
            if (emi.trim() == '') {
                SwalWarning('Alert!', 'Please Select EMIs Criteria');
                return;
            }
        }
        $.AryaAjax({
            url: 'fees/setup-student-emis',
            data: {
                student_id, emi
            }
        }).then((re) => {
            if (re.status) {
                SwalSuccess('', 'Proccess Complete Successfully..', false, 'Next').then((r) => {
                    if (r.isConfirmed) {
                        $('.select-search-type').trigger('change');
                    }
                })
            }
            showResponseError(re);
        });
    })
    $(document).on('click', '.undo-setting', function () {
        // var box=$(this).closest('.card-body');
        // box.toggleClass('animation animation-slide-in-up')
        // toastr.success('HII');
        var id = liststudentBox.val();
        $.AryaAjax({
            url: 'fees/setup_student_emis',
            data: { student_id: id, emi: null }
        }).then((r) => {
            toastr.success('Fee Setting Reset Successfully...');
            $('.select-search-type').trigger('change');
        });
    })
});