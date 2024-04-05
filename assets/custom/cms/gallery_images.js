document.addEventListener('DOMContentLoaded', function (e) {

    const list = $('#list-images');
    var index = 1;
    list.DataTable({
        searching : false,
        dom : small_dom,
        ajax : {
            url : `${ajax_url}cms/list-gallery-images`,
            
        },
        columns : [
            {'data':null},
            {'data':'image'},
            {'data':'title'},
            {'data' : null}
        ],
        columnDefs : [
            {
                targets : 0,
                render : function(data,type,row,meta){
                    return `${ meta.row + 1 } .`;
                }
            },
            {
                targets : 1,
                render : function(data,type,row){
                    return `
                                <img
                                    src="${base_url}assets/media/misc/spinner.gif"
                                    data-src="${base_url}upload/${data}"
                                    class="lozad rounded w-100px h-100px"
                                    alt=""
                                />
                                ${row.title ?? ''}
                            `;
                }
            },
            {
                targets : 2,
                render : function(d,type,row){
                    return `${d || '<i class="text-danger">..EMPTY..</i>'} <a href="javascript:void()" class="edit-record"><i class="fa fa-pencil"></i></a>`;
                }
            },
            {
                targets : -1,
                render : function(d,v,row){
                    return deleteBtnRender(1,row.id);
                }
            }
        ]
    }).on('draw',function(e){
        const observer = lozad('.lozad', {
            rootMargin: '10px 0px', // syntax similar to that of CSS Margin
            threshold: 0.1, // ratio of element convergence
            enableAutoReload: true // it will reload the new image when validating attributes changes
        });
        observer.observe();
        index = 1;
        handleDeleteRows('cms/delete-gallery-image').then( (y) => {
            list.DataTable().ajax.reload() ;
            toastr.success('Image Deleted Successfully');
        });
        list.EditForm('cms/update-gallery-image-title','Edit Image Title');
    });
    // set the dropzone container id
    const id = "#kt_dropzonejs_example_3";
    const dropzone = document.querySelector(id);
    // set the preview element template
    var previewNode = dropzone.querySelector(".dropzone-item");
    previewNode.id = "";
    var previewTemplate = previewNode.parentNode.innerHTML;
    previewNode.parentNode.removeChild(previewNode);
    var myDropzone = new Dropzone(id, { // Make the whole body a dropzone
        url: ajax_url + 'cms/upload-gallery-image', // Set the url for your upload script location
        parallelUploads: 20,
        maxFilesize: 2, // Max filesize in MB
        dataType: 'json',
        previewTemplate: previewTemplate,
        previewsContainer: id + " .dropzone-items", // Define the container to display the previews
        clickable: id + " .dropzone-select", // Define the element that should be used as click trigger to select files.
        success: function (file, response) {
            log(file);
            log(response);
        },
        error: function (file, response) {
            var previewElement = file.previewElement;
            var errorMessageContainer = previewElement.querySelector('.dropzone-error');
            try {
                response = JSON.parse(response);
                errorMessageContainer.innerHTML = response.error;
            }
            catch (e) {
                errorMessageContainer.innerHTML = response;
            }
            errorMessageContainer.style.display = 'block';
        },
    });
    // myDropzone.
    myDropzone.on("addedfile", function (file) {
        // Hookup the start button
        const dropzoneItems = dropzone.querySelectorAll('.dropzone-item');
        dropzoneItems.forEach(dropzoneItem => {
            dropzoneItem.style.display = '';
        });
    });
    // Update the total progress bar
    myDropzone.on("totaluploadprogress", function (progress) {
        const progressBars = dropzone.querySelectorAll('.progress-bar');
        progressBars.forEach(progressBar => {
            progressBar.style.width = progress + "%";
        });
    });
    myDropzone.on("sending", function (file) {
        // Show the total progress bar when upload starts
        const progressBars = dropzone.querySelectorAll('.progress-bar');
        progressBars.forEach(progressBar => {
            progressBar.style.opacity = "1";
        });
    });
    // Hide the total progress bar when nothing"s uploading anymore
    myDropzone.on("complete", function (progress) {
        // log('complete');
        // log(progress);
        const progressBars = dropzone.querySelectorAll('.dz-complete');
        setTimeout(function () {
            progressBars.forEach(progressBar => {
                progressBar.querySelector('.progress-bar').style.opacity = "0";
                progressBar.querySelector('.progress').style.opacity = "0";
            });
        }, 300);
    });
    myDropzone.on('queuecomplete', function(){
        toastr.success('Process Complete Successfull');
        list.DataTable().ajax.reload();
    })
})
