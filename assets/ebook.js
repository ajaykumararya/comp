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
        $.AryaAjax({
            url: 'ebook/user-login',
            data: new FormData(this)
        }).then((res) => {
            // console.log(res);
            showResponseError(res);
            if (res.status) {
                location.reload();
            }
        });
    })
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
    })
})