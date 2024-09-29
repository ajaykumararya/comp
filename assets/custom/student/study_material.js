document.addEventListener('DOMContentLoaded',function(){
    // alert('YES');
    const btn = $('.btn-action');

    btn.on('click',function(){
        var id = $(this).data('id');
        // alert(3);
        $.AryaAjax({
            url : 'website/study_material_link',
            data: {id}
        }).then((tt) => {
            // log(tt);
          location.href = `${base_url}student/study-material/${tt.token}`;  
        });
    })
})