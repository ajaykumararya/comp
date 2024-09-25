document.addEventListener('DOMContentLoaded', async function () {
    const options = $('[data-kt-docs-advanced-forms="interactive"]');
    const inputEl = $('[name="amount"]');
    // log(inputEl)
    options.on('click', e => {
        e.preventDefault();
        inputEl.val($(e.target).html());
    });
    const form = $('.submit-load-request');

    form.submit(function (e) {
        e.preventDefault();
        const amount = inputEl.val();
        if (amount) {
            if (amount >= 100) {
                $.AryaAjax({
                    url: 'center/wallet-load',
                    data: { amount }
                }).then((R) => {
                    showResponseError(R);
                    // log(R);
                    if (R.status) {
                        var options = R.option;
                        options.handler = function (response) {
                            $.AryaAjax({
                                url: 'center/wallet-update',
                                data: {
                                    razorpay_payment_id: response.razorpay_payment_id,
                                    razorpay_order_id: options.order_id,
                                    razorpay_signature: response.razorpay_signature,
                                    merchant_order_id: options.notes.merchant_order_id,
                                    amount: amount
                                }
                            }).then((res) => {
                                showResponseError(res);
                                if (res.status) {
                                    SwalSuccess('Success!', 'Wallet Updated');
                                    location.reload();
                                }
                            });
                        };
                        razorpayPOPUP(options);
                    }
                });
            }
            else {
                SwalWarning('Notice!', 'Payment can be made only for more than Rs 100');
            }
        }
        else {
            SwalWarning('Notice!', 'Please Enter Amount..');
        }
    });
    $(document).on('click', '.try-again-payment', function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        $.AryaAjax({
            url: 'center/old-transaction',
            data: { id }
        }).then((R) => {
            if (typeof R.option === 'undefined') {
                SwalSuccess('Success!', 'This payment has been made and has been updated in your account.', false, 'ok').then((rresult) => {
                    if (rresult.isConfirmed)
                        location.reload();
                });
            }
            else {
                var options = R.option;
                options.handler = function (response) {
                    $.AryaAjax({
                        url: 'center/update-wallet',
                        data: {
                            razorpay_payment_id: response.razorpay_payment_id,
                            razorpay_order_id: options.order_id,
                            razorpay_signature: response.razorpay_signature,
                            merchant_order_id: options.notes.merchant_order_id,
                            amount: R.amount
                        }
                    }).then((res) => {
                        showResponseError(res);
                        if (res.status) {
                            SwalSuccess('Success!', 'Wallet Updated');
                            location.reload();
                        }
                    });
                };
                razorpayPOPUP(options);
            }
        });
    })
    // $.AryaAjax({
    //     url: 'center/wallet-update',
    //     data: {
    //         razorpay_payment_id: 'jhsgdjh273',
    //         razorpay_order_id: 'order_Ox2Pf0s7PibuEo',
    //         razorpay_signature: 'ajkdhja hkjhasjkdhkjahdkjasd',
    //         merchant_order_id: 2,
    //         amount: 1
    //     },
    // }).then((res) => {
    //     log(res);
    //     showResponseError(res);
    //     if (res.status) {
    //         SwalSuccess('Success!', 'Wallet Updated');
    //         location.reload();
    //     }
    // });

})