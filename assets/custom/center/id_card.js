document.addEventListener('DOMContentLoaded', function (e) {
    const center_id_card = document.getElementById('center_id_card');
    const institue_box = $('select[name="center_id"]');
    institue_box.select2({
        placeholder: "Select a Center",
        templateSelection: optionFormatSecond,
        templateResult: optionFormatSecond,
    })
    const table = $(document).find('#id_cards').DataTable({
        searching: true,
        'ajax': {
            'url': ajax_url + 'center/id_cards',
            error: function (a, v, c) {
                log(a.responseText)
            }
        },
        'columns': [
            // Specify your column configurations
            { 'data': null },
            { 'data': 'center_number' },
            { 'data': 'institute_name' },
            { 'data': 'name' },
            { 'data': 'id_card_issue_date' },
            { 'data': null }
            // Add more columns as needed
        ],
        'columnDefs': [
            {
                target: 0,
                render: function (data, type, row, meta) {
                    return `${meta.row + 1}.`;
                }
            },
            {
                targets: -1,
                data: null,
                orderable: false,
                printable: false,
                className: 'text-end',
                render: function (data, type, row) {
                    return `<div class="btn-group">
                                ${generate_link_btn(row.id, 'center_id_card')} 
                                <button class="btn btn-sm btn-danger delete-idCard" data-id="${row.id}">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>`;
                }
            }
        ]
    }).on('draw', function () {
        $('.delete-idCard').on('click', function () {
            let center_id = $(this).data('id');
            // alert(center_id)
            SwalWarning('Confirmation!', 'Are you sure for delete it..', true, 'Ok remove it.').then((res) => {
                if (res.isConfirmed) {
                    $.AryaAjax({
                        'url': 'center/generate-id-card',
                        'data' : {
                            center_id: center_id,
                            issue_date: null
                        }
                    }).then(function (e) {
                        SwalSuccess('Success', e.message)
                        $('#id_cards').DataTable().ajax.reload();
                    });
                }
            });
        })
    });
    if (center_id_card) {
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        var validator = FormValidation.formValidation(
            center_id_card,
            {
                fields: {
                    center_id: {
                        validators: {
                            notEmpty: {
                                message: 'Select A center.'
                            }
                        }
                    },
                    issue_date: {
                        validators: {
                            notEmpty: {
                                message: 'Select A Date.'
                            }
                        }
                    }
                },


                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.form-group',
                        eleInvalidClass: '',
                        eleValidClass: ''
                    })
                }
            }
        );
        // Submit button handler
        // const submitButton = document.getElementById('kt_docs_formvalidation_text_submit');
        center_id_card.addEventListener('submit', function (e) {
            // Prevent default button action
            e.preventDefault();
            var submitButton = $(this).find('button');

            // Validate form before submit
            if (validator) {
                // console.log(validator);
                validator.validate().then(function (status) {
                    // console.log(validator);
                    var formData = new FormData(center_id_card);

                    if (status == 'Valid') {
                        $(submitButton).attr('data-kt-indicator', 'on').prop('disabled', true);


                        axios
                            .post(
                                ajax_url + 'center/generate-id-card',
                                new FormData(center_id_card)
                            )
                            .then(function (e) {

                                if (e.data.status) {

                                    $(document).find('#id_cards').DataTable().ajax.reload();
                                    center_id_card.reset(),
                                        Swal.fire({
                                            text: "Center Submited Successfully.",
                                            icon: "success",
                                            buttonsStyling: !1,
                                            confirmButtonText: "Ok, got it!",
                                            customClass: {
                                                confirmButton: "btn btn-primary",
                                            },
                                        })
                                }
                                else {
                                    Swal.fire({
                                        text: 'Please Check It.',
                                        html: e.data.html,
                                        icon: "warning",
                                        buttonsStyling: !1,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton: "btn btn-primary",
                                        },
                                    });
                                }
                            })
                            .catch(function (t) {
                                console.log(t);
                                Swal.fire({
                                    text: "Sorry, looks like there are some errors detected, please try again.",
                                    icon: "error",
                                    buttonsStyling: !1,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: { confirmButton: "btn btn-primary" },
                                });
                            })
                            .then(() => {
                                $(submitButton).removeAttr('data-kt-indicator').prop("disabled", false);
                            });

                    }
                });
            }
        });
    }

});