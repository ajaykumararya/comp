document.addEventListener('DOMContentLoaded', function () {
    let urlParams = new URLSearchParams(window.location.search);
    let cat = urlParams.get('cat');
    // console.log('cat= ' + cat);
    if ($('#ebook-pagination').length)
        getProject(1, '', cat);
    function getProject(page, search, cat) {
        var box = $('#print-projects');
        $('[project-property]').prop('disabled', true);
        $('.loader').show();
        box.html('');
        $('#ebook-pagination').html('');
        $.AryaAjax({
            url: 'ebook/fetch-projects',
            data: { page: page, search: search, cat: cat, CURRENT_URL: CURRENT_URL },
            loading_message: false
        }).then((res) => {
            $('.loader').hide();
            $('.project-count').text(res.recordsTotal);
            $('[project-property]').prop('disabled', false);
            console.log(res);
            generatePagination(res.totalPages, page);
            box.html(res.html);
            scrollToDiv('#ebook-section');
        });
    }
    $(document).on('submit', '#search-project-form', function (r) {
        r.preventDefault();
        var search = $(this).find('input[name="search"]').val();
        // alert(search)
        removeQueryParam('cat');
        getProject(1, search, 0);
    });
    $(document).on('click', '.action-cat', function (e) {
        e.preventDefault();
        var cat = $(this).data('slug');
        if ($(this).hasClass('active'))
            return;
        setQueryParam('cat', cat);
        $('.list-project-category').find('a').removeClass('active');
        $(this).addClass('active');
        $('#search-project-form').find('input[name="search"]').val('');
        getProject(1, '', cat);
    })
    function generatePagination(totalPages, currentPage) {
        let paginationHtml = '';

        if (currentPage > 1) {
            paginationHtml += `<li><a href="#" class="ebook-page-link" data-page="${currentPage - 1}">«</a></li>`;
        }

        for (let i = 1; i <= totalPages; i++) {
            paginationHtml += i === currentPage
                ? `<li class="active"><a href="javascript:void(0)">${i}</a></li>`
                : `<li><a href="#" class="ebook-page-link" data-page="${i}">${i}</a></li>`;
        }

        if (currentPage < totalPages) {
            paginationHtml += `<li><a href="#" class="ebook-page-link" data-page="${currentPage + 1}">»</a></li>`;
        }
        $('#ebook-pagination').html(paginationHtml);
    }

    // Handle Pagination Click
    $(document).on('click', '.ebook-page-link', function (e) {
        e.preventDefault();

        var search = $(this).find('input[name="search"]').val();
        let page = $(this).data('page');
        // alert(cat);
        getProject(page, search, cat);
    });
    // alert(CURRENT_URL);
    $(document).on('click', '.btn-addtocart', function (ee) {
        ee.preventDefault();
        var slug = $(this).data('slug');
        var btn = $(this);
        var buttonHtml = btn.html();
        btn.html('<i class="fa fa-spin fa-spinner"></i> Loading..').prop('disabled', true);
        $.AryaAjax({
            url: 'ebook/add-to-cart',
            data: { slug: slug },
            loading_message: false
        }).then((res) => {
            $(document).find('.cart-count').text(res.count);
            if (res.status) {
                toastr.success('Added To cart successfully..');
                btn.replaceWith(res.button);
            }
            else {
                btn.html(buttonHtml).prop('disabled', false);
            }
            showResponseError(res);
        });
    })
    $(document).on('click', '.remove-cart-item', function (er) {
        er.preventDefault();
        var slug = $(this).closest('tr').data('slug');
        // alert(slug)
        SwalWarning('Confirmation!', 'Are you sure for remove this item from cart?', true, 'Remove it').then((result) => {
            if (result.isConfirmed) {
                $.AryaAjax({
                    url: 'ebook/remove-to-cart',
                    data: { slug: slug }
                }).then((res) => {
                    // console.log(res);
                    toastr.success('Item remove from cart successfully..');
                    location.reload();
                });
            }
        });
    })

    $(document).on('submit', '#ebook_userogin', function (r) {
        r.preventDefault();
        // alert(33);?
        var form = $(this);
        $.AryaAjax({
            url: 'ebook/user-login',
            data: new FormData(this)
        }).then((res) => {
            // console.log(res);
            showResponseError(res);
            if (form.find('[name="paynow"]').length) {
                $('#loginModel').modal('hide');
                $('.ebook-cart .paynow').trigger('click');
            }
            else if (res.status) {
                location.reload();
            }
        });
    })
    $('#loginModel,#registerModel').on('hidden.bs.modal', function () {
        $(this).find('[name="paynow"]').remove();
    });
    $(document).on('submit', '#ebook_userregisteration', function (r) {
        r.preventDefault();
        // alert(33);?
        $.AryaAjax({
            url: 'ebook/user-registration',
            data: new FormData(this)
        }).then((res) => {
            // console.log(res);
            showResponseError(res);
            if (res.status) {
                location.reload();
            }
        });
    });

    $(document).on('click', '.ebook-cart .paynow', function () {
        var token = $(this).data('token') ?? false;
        if (token == '' || !token) {
            SwalWarning('Error', 'Something went wrong.')
            return;
        }
        $.AryaAjax({
            url: 'ebook/cart-payment',
        }).then((res) => {

            if (res.status == 'login') {
                $('#loginModel').modal('show').find('#ebook_userogin').append('<input type="hidden" name="paynow" value="1">');
            }
            else if (res.status) {
                var options = res.option;
                options.handler = function (response) {
                    $.AryaAjax({
                        url: 'ebook/update-cart-payment',
                        data: {
                            razorpay_payment_id: response.razorpay_payment_id,
                            razorpay_order_id: options.order_id,
                            razorpay_signature: response.razorpay_signature,
                            merchant_order_id: options.notes.merchant_order_id,
                            amount: options.amount,
                            token: token
                        }
                    }).then((res) => {
                        showResponseError(res);
                        if (res.status) {
                            SwalSuccess('Success!', 'Payment Done..');
                            // location.reload();
                            location.href = res.url;
                        }
                    });
                };
                razorpayPOPUP(options);
            }
        });
    })
    $(document).on('submit', '.update-ebbok-user-profile', function (e) {
        e.preventDefault();
        // alert(4);
        $.AryaAjax({
            url: 'ebook/update-user-profile',
            data: new FormData(this)
        }).then((res) => {
            if (res.status) {
                SwalSuccess('Success','Profile Updated Sucessfully..')
            }
            showResponseError(res);
        });
    })
    $(document).on('submit', '.update-ebbok-user-password', function (e) {
        e.preventDefault();
        // alert(4);
        $.AryaAjax({
            url: 'ebook/update-user-password',
            data: new FormData(this)
        }).then((res) => {
            console.log(res)
            if (res.status) {
                SwalSuccess('Success','Profile Updated Sucessfully..')
            }
            showResponseError(res);
        });
    })
})