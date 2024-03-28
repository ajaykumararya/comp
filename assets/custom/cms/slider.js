document.addEventListener('DOMContentLoaded', function (e) {
    const slider_form = document.getElementById("save-slider");
    const form = $('#save-slider');
    const list_slider = $('#list-slider');
    var validation = MyFormValidation(slider_form);
    validation.addField('image', {
        validators: {
            notEmpty: { message: 'Please Select Image..' }
        }
    })
    // log(validation);
    form.on('submit', function (e) {
        e.preventDefault();
        // log(formDataToObject(new FormData(this)));
        var fromdata = new FormData();
        const fileInput = $('#image')[0];
        const file = fileInput.files[0];
        fromdata.append('image', file);
        $.AryaAjax({
            validation: validation,
            url: 'cms/slider',
            data: (fromdata),
            success_message: 'Slider Image Uploaded Successfully.',
            page_reload: true
        })
    });
    var index = 1;
    var dt = list_slider.DataTable({
        dom: small_dom,
        buttons: [],
        ajax: {
            url: ajax_url + 'cms/list-sliders',
            success: function (d) {
                // console.log(d);
                if (d.data && d.data.length) {
                    dt.clear();
                    dt.rows.add(d.data).draw();
                }
                else {
                    toastr.error('Table Data Not Found.');
                    DataTableEmptyMessage(dt);
                }
            },
            error: function (a, b, v) {
                console.warn(a.responseText);
            }
        },
        columns: [
            { 'data': null },
            { 'data': 'image' },
            { 'data': null }
        ],
        columnDefs: [
            {
                target : 0,
                render : function(a,v,c){
                    return `${index++}.`;
                }
            },
            {
                target : 1,
                render : function(data,type,row){
                    return `<div class="symbol symbol-50px me-3">                                                   
                                <img src="${base_url}upload/${data}" class="" alt="">                                                    
                            </div>`;
                }
            },
            {
                target : 2,
                orderable : false,
                render : function(data,type,row){
                    return deleteBtnRender(1,row.id);
                }
            }
        ]
    });
    dt.on('draw', function (e) {
        const handle = handleDeleteRows('cms/delete-slider');
        handle.done(function (e) {
            // console.log(e);
            list_slider.DataTable().ajax.reload();
        });
    })
});