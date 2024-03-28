document.addEventListener('DOMContentLoaded', function (e) {
    const menu_section = $('.menu-section');
    const save_btn = $('.save-btn');
    const updateOutput = (e) => {
        var list = e.length ? e : $(e.target),
            output = list.data('output');
        if (window.JSON) {
            output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
        } else {
            output.val('JSON browser support required for this demo.');
        }
    };
    $.AryaAjax({
        loading_message: 'Please Wait.. Load Menu Structure..',
        url: 'cms/get-menus'
    }).then((res) => {
        if (res.status) {
            menu_section.html(res.html);
            $('#nestable').nestable({
                group: 1
            }).on('change', updateOutput);
            updateOutput($('#nestable').data('output', $('#nestable-output')));
            /*
            $('#nestable-menu').on('click', function (e) {
                var target = $(e.target),
                    action = target.data('action');
                if (action === 'expand-all') {
                    $('.dd').nestable('expandAll');
                }
                if (action === 'collapse-all') {
                    $('.dd').nestable('collapseAll');
                }
            });
        */
        }
    });

    save_btn.on('click',function(){
        var output = $('#nestable-output');
        if(output.length){
            $.AryaAjax({
                data : { data : output.val() },
                url : 'cms/update-menus',
                loading_message : 'Menus Updating...',
                success_message : 'Menus Updates Successfully..'
            });
        }
        else{
            toastr.error('Something went wrong..');
        }
    })


});
