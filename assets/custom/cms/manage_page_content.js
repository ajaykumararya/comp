document.addEventListener('DOMContentLoaded', function (e) {
    const content = $('.content-form');


    content.on('submit',function(d){
        d.preventDefault();

        var ed = tinyMCE.get('aryaeditor');
        var content = ed.getContent();
        var id = $('#content_id').val();
        // alert(id);
        // log(data);
        $.AryaAjax({
            data : {id,content},
            url : 'cms/update-contnet',
            success_message : 'Page Content Update Successfully..',
            page_reload : true
        })
    })
});