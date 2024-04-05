document.addEventListener('DOMContentLoaded', async function () {
    const ready = $('.ready');
    const done = $('.done');
    done.on('click', function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        window.open(`${base_url}exam/online-exam-result/${btoa(id)}`, '_blank');
    })
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
            myModel(e.title, `${e.content} <input type="hidden" class="student_exam_id" value="${id}">`).then((d) => {
                d.form.submit(function (e) {
                    e.preventDefault();
                    submitExam(this);
                });
                var nexT = 0;
                document.addEventListener("visibilitychange", function () {
                    if (document.visibilityState === "hidden") {
                        $('.nextTabs').val(++nexT);
                    }
                    else
                        if (nexT)
                            SwalWarning("Do not go out of this page, everything is under the supervision of the administrator. ");
                    return false;
                });
                $("html,body").on("contextmenu", function (e) {
                    e.preventDefault();
                });
                window.addEventListener('beforeunload', beforeUnloadHandler);
                $(window).on("unload", function () {
                    // This is optional and can be used for additional cleanup or actions before the page is unloaded
                    console.log("Page is being unloaded");
                });
            });
            ki_modal.on('hidden.bs.modal', function () {
                ki_modal.find('.modal-header').find('.btn').show();
                ki_modal.find('form').off('submit');
                ki_modal.find('.modal-dialog').removeClass('modal-fullscreen');
            });
        });
    })
    function submitExam(form) {
        let allQuestions = JSON.parse($(form).find('.questionList').val());
        let ques_count = (Object.keys(allQuestions).length);
        let answers = $(form).find('.answers:checked');
        let rightQuestions = 0;
        let exam_id = $(form).find('.exam_id').val();
        let submitList = new Array();
        let student_exam_id = $(form).find('.student_exam_id').val();
        answers.each(function () {
            let q_id = $(this).data('ques');
            let ans_id = $(this).val();
            if (allQuestions.hasOwnProperty(q_id)) {
                if (ans_id == allQuestions[q_id])
                    rightQuestions++;
            }
            submitList.push({
                'question_id': q_id,
                'answer_id': ans_id,
                'right_answer_id': allQuestions[q_id],
            });
        });
        let percentage = (rightQuestions / ques_count) * 100;
        
       
        $.AryaAjax({
            url: 'website/submit-exam',
            data: {
                exam_id: exam_id,
                submitList: submitList,
                percentage: percentage,
                ttl_right_answers: rightQuestions,
                student_exam_id: student_exam_id
            }
        }).then((res) => {
            window.removeEventListener('beforeunload', beforeUnloadHandler);
            SwalSuccess(``, `You answered ${ques_count} questions, out of which ${rightQuestions} are correct, then your percentage is ${percentage}%.`, true, 'Check Marksheet').then((r) => {
                if (r.isConfirmed) {
                    location.href = base_url + 'exam/online-exam-result/' + btoa(student_exam_id);
                }
                else
                    location.reload();
            });
        });
    }
    $(document).on('change', '.answers', function () {
        var attemptQuestions = $('.answers:checked').length;
        $('.ttl-attempts').text(attemptQuestions);
        var maxQuestions = parseInt($('.ttl-max-questions').text()) ?? 0;
        var submitButton = $('.save-button');
        if (maxQuestions && maxQuestions == attemptQuestions) {
            toastr.success('All Questions Attemped, Now Submit your Paper.');
            submitButton.prop('disabled', false);
        }
    });
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
    function beforeUnloadHandler(event) {
        // You can perform additional checks here if needed
        // For example, ask the user to confirm before canceling the unload event
        if (!confirm('Are you sure you want to leave this page?')) {
            // If the user chooses to stay, return a message to display
            event.returnValue = 'Stay on this page';
        } else {
            // If the user chooses to leave, return null or an empty string
            event.returnValue = null; // or event.returnValue = '';
        }
    }
})
