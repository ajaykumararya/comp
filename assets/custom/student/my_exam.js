document.addEventListener('DOMContentLoaded', async function () {
    const ready = $('.ready');
    const done = $('.done');
    ready.on('click', function (e) {
        e.preventDefault();
        var doc = window.document;
        var docEl = doc.documentElement;

        var requestFullScreen = docEl.requestFullscreen || docEl.mozRequestFullScreen || docEl.webkitRequestFullScreen || docEl.msRequestFullscreen;

        if (requestFullScreen) {
            requestFullScreen.call(docEl);
        }
        var id = $(this).data('id');
        myModel('Exam Note', `
                        1.) Exam देते समय New Tab Open ना करे। <br>
                        2.) Exam देते समय Screen को बंद या Minimize ना करे। <br> 
                        3.) पेज को Reload ना करे। <br>
                        4.) Internet Dis-Connect होने पर Exam Cut कर के Exam दोबारा Start करें!`).then((e) => {
            ki_modal.find('.modal-footer').html(`
                <button data-id="${id}" type="button" class="ok-btn pulse pulse-success btn btn-outline hover-rotate-end btn-outline-dashed btn-outline-success btn-active-light-success">
                    <span class="pulse-ring"></span>
                    <i class="ki-duotone ki-save-2 fs-1"><span class="path1"></span><span class="path2"></span></i> Ok
                </button>
            `);
        });




        return false;
    });
    $(document).on('click', '.ok-btn', function () {
        var id = $(this).data('id');
        // ki_modal.modal('hide');

        $.AryaAjax({
            url: 'website/list-paper',
            data: {
                id
            }

        }).then((e) => {
            ki_modal.attr('data-bs-backdrop', "static");
            ki_modal.find('.modal-dialog').addClass('modal-fullscreen');
            ki_modal.find('.modal-footer').html('');
            ki_modal.find('.modal-header').find('.btn').hide();
            myModel(e.title, e.content);
            ki_modal.on('hidden.bs.modal', function () {
            ki_modal.find('.modal-header').find('.btn').show();
            ki_modal.find('form').off('submit');
                ki_modal.find('.modal-dialog').removeClass('modal-fullscreen');
            });
        });


    })
    $(document).keydown(function (event) {
        // Check if the Ctrl key is pressed
        if (event.ctrlKey) {
            // Prevent the default behavior
            event.preventDefault();
        }

        if (event.key.startsWith('F')) {
            event.preventDefault();
            // Optionally, you can provide a message or perform another action
            console.log('Function key ' + event.key + ' is disabled.');
        }
    });

    $(document).on('contextmenu', function () {
        return false;
    });

    // Disable text selection
    $('#exam-content').on('selectstart dragstart', function (event) {
        event.preventDefault();
        return false;
    });

    // Disable keyboard shortcuts
    $(document).on('keydown', function (event) {
        // Check if the Ctrl key or Command key (for Mac) is pressed
        if (event.ctrlKey || event.metaKey) {
            // Prevent the default behavior
            event.preventDefault();
            // Optionally, you can provide a message or perform another action
            console.log('Keyboard shortcuts are disabled.');
        }
    });
})