document.addEventListener('DOMContentLoaded', function (e) {
    const table = $(document).find('#list_center').DataTable({
        searching: true,
        'ajax': {
            'url': ajax_url + 'center/list',
            error: function (a, v, c) {
                log(a.responseText)
            }
        },
        'columns': [
            // Specify your column configurations
            { 'data': 'rollno_prefix' },
            { 'data': 'center_number' },
            { 'data': 'institute_name' },
            { 'data': 'name' },
            { 'data': 'email' },
            { 'data': 'contact_number' },
            { 'data': 'wallet' },
            { 'data': null }
            // Add more columns as needed
        ],
        'columnDefs': [
            {
                target: 0,
                render: function (data, type, row) {
                    return `<a href="javascript:;" class="edit-record">${data}</a>`;
                }
            },
            {
                targets: 3,
                printable: false,
                render: function (data, type, row) {
                    return `<label class="text-dark">${data}</label>`;
                }
            },
            {
                targets: 4,
                printable: false,
                render: function (data, type, row) {
                    return `<a href="mailto:${data}">${data}</a>`;
                }
            },
            {
                targets: 5,
                printable: false,
                render: function (data, type, row) {
                    return `<a href="tel:${data}">${data}</a>`;
                }
            },
            {
                targets: -2,
                render: function (data, type, row) {
                    if (wallet_system && login_type == 'admin')
                        return `<span class="fs-3 text-dark text-center fw-bold">${inr} ${numberFormat(data)} </span><button class="btn btn-sm btn-primary w-100 p-1 load-wallet">&nbsp;<i class="fa fa-plus"></i></button>`;
                    return row.center_full_address;
                }
            },
            {
                targets: -1,
                data: null,
                orderable: false,
                printable: false,
                className: 'text-end',
                render: function (data, type, row) {
                    // console.log(data);
                    // dDelete unwanted props
                    // delete data.isDeleted;
                    // delete data.password;
                    // delete data.roll_no_suffix;
                    // delete data.is_deleted;
                    // delete data.active_page;
                    // //change file view
                    // data.adhar_front = viewImage(data.adhar_front);
                    // data.adhar_back = viewImage(data.adhar_back);
                    // data.address_proof = viewImage(data.address_proof);
                    // data.agreement = viewImage(data.agreement);
                    // data.signature = viewImage(data.signature);
                    // data.image = viewImage(data.image);
                    // view-details-drawer-btn {tag:view_btn_class}
                    return `<div class="btn-group">
                                <a href="${base_url}center/profile/${btoa(row.id)}" class="btn btn-sm btn-info">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <button class="btn btn-sm btn-light-primary edit-form-btn" data-id="${row.id}">
                                    <i class="fa fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-light-danger delete-btn">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>`;
                }
            }
        ]
    })
    table.on('draw', function () {

        $('#list_center').EditForm('center/edit-rollno_prefix', 'Update Roll Number Prefix')
            .DeleteEvent('centers', 'Center')
            .EditAjax('center/edit-form', 'Center');
        if (wallet_system) {
            if(login_type == 'admin')
            $('#list_center thead th').eq(6).text('Wallet');
            table.on('click', '.load-wallet', function () {
                let centre = $('#list_center').DataTable().row($(this).closest('tr')).data();
                myModel(`Load Wallet of <b class="text-success">${centre.name}</b>`, `
                        <!--begin::Input wrapper-->
                        <div class="d-flex flex-column mb-8 fv-row">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">Options</span>
                        
                                <span class="ms-1" data-bs-toggle="tooltip" title="Select an option.">
                                    <i class="ki-duotone ki-information text-gray-500 fs-7"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                </span>
                            </label>
                            <!--end::Label-->
                        
                            <!--begin::Buttons-->
                            <div class="d-flex flex-stack gap-5 mb-3">
                                <button type="button" class="btn btn-light-primary w-100" data-kt-docs-advanced-forms="interactive">100</button>
                                <button type="button" class="btn btn-light-primary w-100" data-kt-docs-advanced-forms="interactive">500</button>
                                <button type="button" class="btn btn-light-primary w-100" data-kt-docs-advanced-forms="interactive">1000</button>
                            </div>
                            <!--begin::Buttons-->
                        
                            <input type="text" class="form-control form-control-solid" placeholder="Enter Amount" name="amount" />
                        </div>
                        <!--end::Input wrapper-->
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label>Description</label>
                            <textarea class="form-control w-100" rows="3" placeholder="Description"></textarea>
                        </div>

            `).then((e) => {

                    const options = $(e.modal).find('[data-kt-docs-advanced-forms="interactive"]');
                    const inputEl = $(e.modal).find('[name="amount"]');
                    // log(inputEl)
                    options.on('click', e => {
                        e.preventDefault();
                        inputEl.val($(e.target).html());
                    });

                    $(e.modal).find('form').submit(r => {
                        r.preventDefault();
                        let amount = inputEl.val();
                        let description = $(e.modal).find('textarea').val();
                        // alert(amount);
                        if (amount) {
                            // amount min value 100
                            if (amount >= 100) {
                                $.AryaAjax({
                                    url: 'ajax/centre-wallet-load',
                                    data: {
                                        name: centre.name,
                                        centre_id: centre.id,
                                        amount: amount,
                                        description: description,
                                        closing_balance: centre.wallet,
                                    }
                                }).then(result => {
                                    SwalSuccess('Wallet Loaded Successfully..').then(ok => {
                                        if (ok.isConfirmed) {
                                            $('#list_center').DataTable().ajax.reload();
                                            ki_modal.modal('hide');
                                        }
                                    });
                                });
                            }
                            else
                                SwalWarning(`Please Enter amount minimum 100 ${inr}`);
                        }
                        else {
                            SwalWarning(`Please Enter Amount ${inr}`);
                        }
                    });


                });
            })
        }
    });
});
