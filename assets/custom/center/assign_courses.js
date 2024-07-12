document.addEventListener('DOMContentLoaded', function (e) {
    // alert(4)
    const center_profile_box = $('#profile-box');
    const assign_form_and_display_box = $('#assign_form_and_display_box');
    const center_select_box = $('#select-center');
    // const genral_details = $('#genral-routes-details');
    // Init Select2 --- more info: https://select2.org/
    center_select_box.select2({
        placeholder: "Select a Center",
        templateSelection: optionFormatSecond,
        templateResult: optionFormatSecond,
    }).on('change', function () {
        center_profile_box.html('');
        assign_form_and_display_box.html('');
        // genral_details.html('');
        // alert(this.value);
        var center_id = $(this).val();
        $.AryaAjax({
            url: 'center/get-course-assign-form',
            data: { 'id': center_id }
        }).then(function (rr) {
            // log(rr);
            var center_name = $('#select-center option:selected').data('kt-rich-content-subcontent');
            // genral_details.html(rr.genral_html);
            center_profile_box.html(rr.profile_html);
            assign_form_and_display_box.html(rr.html).find('#list-center-courses').DataTable({
                dom: ''
            });
            scrollToDiv(assign_form_and_display_box);
            assign_form_and_display_box.find(".assign-to-center").change(function () {
                var that = this,
                    course_id = $(this).val(),
                    label = $(this).closest('label'),
                    course_name = $(label).find(".course-name").text(),
                    course_duration = $(label).find('.course-duration').text(),
                    isDeleted = $(this).is(':checked') ? 0 : 1,
                    amount = $(this).data('amount');
                if ($(this).is(':checked')) {
                    SuccessSound();
                    Swal.fire({
                        title: `${course_name} ${course_duration} (Course)`,
                        html: `
                        <div class="separator separator-dashed separator-content border-primary my-5">
                            <span class="fs-3 text-primary">ASSIGN TO</span>
                        </div>
                        <span class="fs-2">${center_name}</span>
                        <div class="input-group mt-5">
                            <span class="input-group-text">${inr}</span>
                            <input type="text" class="form-control" id="course-fee" placeholder="Enter Amount Here." aria-label="Amount (to the nearest dollar)" value="${amount}" autocomplete="off">
                            <span class="input-group-text">.00</span>
                        </div>
                        `,
                        showCancelButton: true,
                        confirmButtonText: 'Assign',
                        cancelButtonText: 'Cancel',
                        allowOutsideClick: false, // Prevent closing by clicking outside the modal
                        didOpen: () => {
                            // document.getElementById('course-fee'),focus();
                            // $('#course-fee').focus();
                            focusOnTextAfter('#course-fee');
                        },
                        preConfirm: () => {
                            var course_fee = $('#course-fee').val();
                            if (validateAmount(course_fee)) {
                                return course_fee;
                            }
                            else {
                                Swal.showValidationMessage('<i class="fa fa-info-circle"></i> Please Enter A Valid Course Fee')
                            }
                        }
                    }).then((result) => {
                        log(result)
                        if (result.isConfirmed) {
                            const course_fee = result.value;
                            $.AryaAjax({
                                data: { center_id, course_id, course_fee, isDeleted },
                                url: 'center/assign-course'
                            }).then(function (res) {
                                // log(res);
                                center_select_box.trigger('change');
                            });
                        }
                        else {
                            $(that).prop('checked', false);
                        }
                    });

                }
                else {
                    Swal.fire({

                        title: 'Notice',
                        icon: 'warning',
                        html: 'Are you sure for remove course from selected center',
                        showCancelButton: true,
                        confirmButtonText: 'ok',
                        cancelButtonText: 'Cancel',
                        allowOutsideClick: false,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // alert(isDeleted);
                            $.AryaAjax({
                                data: { center_id, course_id, isDeleted },
                                url: 'center/assign-course'
                            }).then(function (res) {
                                log(res);
                                center_select_box.trigger('change');
                            });
                        }
                        else {
                            $(that).prop('checked', true);
                        }
                    });
                }
            });
        });
    });
});
