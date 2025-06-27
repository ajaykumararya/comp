document.addEventListener('DOMContentLoaded', function (e) {
    const table = $('#marksheets');
    var dt = table.DataTable({
        ajax: {
            url: ajax_url + 'student/list-marksheets',
            error: function (a, v, c) {
                log(a.responseText);
            }
        },
        columns: [
            { 'data': 'roll_no' },
            { 'data': 'student_name' },
            { 'data': 'course_name' },
            { 'data': 'marksheet_duration' },
            { 'data': 'center_name' },
            { 'data': 'issue_date' },
            { 'data': null }
        ],
        columnDefs: [
            {
                targets: 3,
                render: function (data, type, row) {
                    return `${ordinal_number(data)} ${$.ucfirst(row.duration_type)} 
                        ${row.duration == row.marksheet_duration ? badge('Final Marksheet', 'success text-black') : ''}
                    `;
                }
            },
            {
                targets: -1,
                orderable: false,
                render: function (data, type, row) {
                    //edit-record
                    return `<div class="btn-group">
                            <button class="btn btn-info edit-form-btn" data-id="${row.result_id}"><i class="fa fa-edit"></i>Edit</button>
                            ${generate_link_btn(row.result_id, 'marksheet')}
                            ${deleteBtnRender(1, row.result_id, 'Marksheet')}
                    </div>`;
                }
            }
        ]
    }).on('draw', function () {
        handleDeleteRows('student/delete-marksheet');
        // table.EditForm('student/update-marksheet-issue-date','Update Marksheet');
        table.EditAjax('student/marksheet-edit-form', 'Update Marksheet');
        ki_modal.on('show.bs.modal', function () {
            loadResultFuncations();
        });
        // $('.edit-createdDate').on('click',function(){
        //     var result_id = $(this).data('id');
        //     var date = $(this).data('date');
        //     alert(result_id + date)
        // });
    });

    function loadResultFuncations() {
        const button = $(document).find('.save-btn');
        const cal_marks = () => {

            var ttl = 0;
            var subject_total = $('.subject-ttl-marks').val();
            //var body = $('.marks-body');
            log(subject_total)
            $('.cal-marks').each(function (i, v) {
                if ($(v).val())
                    ttl += parseInt($(v).val());
            });
            $('.total-marks').text(ttl);
            $('.ttl-marks').val(ttl);
            //body.find('.message').remove();
            if (subject_total < ttl) {
                button.prop('disabled', true);
                ///body.append('<div class="alert message alert-danger">Please Enter Valid Subject Numbers</div>')
            }
            else {
                button.prop('disabled', false);
            }

        }
        $(document).on("keyup change", '.cal-marks', function () {
            var td = $(this).closest('td');

            $(td).find(".message").remove();
            var ttl = 0;
            var subject_total = $('.subject-ttl-marks').val();
            //var body = $('.marks-body');
            $('.cal-marks').each(function (i, v) {
                if ($(v).val())
                    ttl += parseInt($(v).val());
            });
            toastr.clear();
            if (!validateAmount(this.value) && this.value != '' || subject_total < ttl || this.value == '') {
                // button.prop('disabled', false);

                toastr.error('Please Enter a valid Subject mark.');
                $(td).append('<div class="text-danger message">Please Enter a valid Subject mark.</div>');
                // return false;
            }
            cal_marks();
        });
        
        cal_marks();
    }
});