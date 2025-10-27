<style>
    .list-group {
        --bs-list-group-bg: transparent;
    }
</style>
<div class="row">
    <div class="col-md-12" id="examApp">
        <form action="" id="questionForm">
            <div class="{card_class}">
                <div class="card-header justify-content-between ">
                    <h3 class="card-title">Add a Question</h3>
                    <div>
                        <button id="addTopicBtn" type="button"
                            class=" mt-4 btn btn-outline btn-outline-dashed btn-outline-warning btn-active-light-warning  pulse pulse-warning rounded hover-elevate-up">Add
                            Topic</button>

                    </div>
                </div>
                <div class="card-body">
                    <div id="topicsContainer"></div>
                </div>
                <div class="card-footer">
                    {publish_button}
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-12">
        <div class="{card_class}">
            <div class="card-header">
                <h3 class="card-title">List Questions</h3>
            </div>
            <div class="card-body p-0">
                <?php
                $listTopics = $this->exam_model2->list_topics();
                $allQuestions = $this->exam_model2->my_question_bank();
                // $count = getTopicCounts($allQuestions);
                // pre($allQuestions);
                if ($listTopics->num_rows()) {
                    ?>
                    <div class="mb-5 hover-scroll-x pt-5">
                        <div class="d-grid">
                            <ul class="nav nav-tabs flex-nowrap text-nowrap">
                                <?php
                                $i = 1;
                                foreach ($listTopics->result() as $topic) {
                                    $myCount = isset($allQuestions[$topic->id]) ? count($allQuestions[$topic->id]) : 0;
                                    $class = $myCount ? 'info' : 'danger';
                                    ?>
                                    <li class="nav-item ms-3 border-dark">
                                        <a class="nav-link <?= $i == '1' ? 'active' : '' ?> btn btn-active-primary rounded-bottom-0"
                                            data-bs-toggle="tab" href="#kt_tab_pane_<?= $i ?>"><?= $topic->title ?>
                                            <?= label($myCount, $class) ?></a>
                                    </li>
                                    <?php
                                    $i++;
                                }
                                ?>
                            </ul>
                        </div>
                    </div>

                    <div class="tab-content p-2" id="myTabContent">
                        <?php
                        $i = 1;
                        foreach ($listTopics->result() as $topic) {
                            ?>
                            <div class="tab-pane fade <?= $i == '1' ? 'show active' : '' ?>" id="kt_tab_pane_<?= $i ?>"
                                role="tabpanel">
                                <?php
                                if (isset($allQuestions[$topic->id])) {
                                    ?>
                                    <ol class="">
                                        <?php
                                        $j = 0;
                                        foreach ($allQuestions[$topic->id] as $ques_id => $ques):
                                            // pre($ques)
                                            $j++;
                                            $editData = [
                                                'ques_id' => $ques_id,
                                                'question' => $ques['question']
                                            ];
                                            if (isset($ques['options'])) {
                                                foreach ($ques['options'] as $option) {
                                                    $editData['answers'][$option['option_id']] = [
                                                        'answer' => htmlentities($option['text']),
                                                        'is_right' => $option['is_correct'],
                                                        'parent_class' => $option['is_correct'] ? 'active' : '',
                                                        'is_chcked' => $option['is_correct'] ? 'checked' : '',
                                                    ];
                                                }
                                            }
                                            ?>
                                            <li class="p-1 text-danger fw-bold ques-box-<?=$ques_id?>" type="1" data-param='<?= json_encode($editData) ?>'>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <!-- Collapse Toggle -->
                                                    <a class="text-primary fw-bold text-decoration-none d-flex align-items-center"
                                                        data-bs-toggle="collapse" href="#demo_q<?= $j ?>" role="button"
                                                        aria-expanded="false" aria-controls="demo_q<?= $j ?>">
                                                        <span><?= $ques['question'] ?></span>
                                                        <i class="fas fa-eye toggle-icon ms-2"></i>
                                                    </a>

                                                    <!-- Edit Button -->
                                                    <button class="btn btn-sm btn-light-warning ms-3 edit">
                                                        <i class="fas fa-edit me-1"></i> Edit
                                                    </button>
                                                </div>

                                                <!-- Collapse Content -->
                                                <div class="collapse mt-2" id="demo_q<?= $j ?>" data-bs-parent="#kt_tab_pane_<?= $i ?>">
                                                    <div class="text-muted">
                                                        <?php
                                                        // htmlentities()
                                                        if (isset($ques['options'])) {
                                                            echo '<ol type="A">';
                                                            foreach ($ques['options'] as $option):
                                                                // print_r($option);
                                                                echo '<li class="choice-box-'.$option['option_id'].' text-' . ($option['is_correct'] ? 'success' : 'danger') . '">' . htmlentities($option['text']) . '</li>';
                                                            endforeach;
                                                            echo '</ol>';
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </li>
                                            <?php
                                        endforeach;
                                        ?>
                                        </ul>

                                        <?php
                                } else
                                    echo alert('<b>' . $topic->title . '</b> No questions available', 'danger');
                                ?>
                            </div>
                            <?php
                            $i++;
                        }
                        ?>
                    </div>
                    <?php
                } else {
                    echo alert('Data not Found..', 'danger');
                }
                ?>
            </div>
        </div>
    </div>
</div>
<script id="template" type="text/x-handlebars-template">
    <label class="parent-ans btn btn-outline btn-outline-dashed btn-active-light-primary d-flex flex-stack text-start p-2 mb-5 {{parent_class}}">
        <div class="d-flex align-items-center me-2">
            <div class="form-check form-check-custom form-check-solid form-check-primary me-6">
                <input class="form-check-input is-right" type="radio" name="is_right[]" {{is_chcked}}/>
                <input type="hidden" name="ans[]" class="ans" value="{{answer}}">
            </div>
            <div class="flex-grow-1">
                <h2 class="d-flex align-items-center fs-3 fw-bold flex-wrap ans-title">
                    {{answer}}
                </h2>
            </div>
        </div>
        <div class="ms-5">
            <button class="btn btn-primary edit-ans btn-sm" type="button"><span class="fa fa-edit"></span></button>
            <button class="btn btn-danger delete-ans btn-sm" type="button"><span class="fa fa-trash"></span></button>
            <input type="hidden" name="ans_id[]" class="ans_id" value="{{answer_id}}">
        </div>
    </label>
</script>
<script>
    (function ($) {
        $.fn.examBuilder = function (options) {
            const settings = $.extend({
                availableTopics: [],
                saveUrl: '',
                onSaveSuccess: function () { },
                onSaveError: function () { }
            }, options);

            let topicIndex = 0;
            const container = this;

            function topicDropdown(index) {
                let options = `<option value="">Select Topic</option>`;
                settings.availableTopics.forEach(t => {
                    options += `<option value="${t.id}">${t.title}</option>`;
                });
                return `
                <select class="form-select mb-2 w-50" name="topics[${index}][topicId]" required>
                    ${options}
                </select>`;
            }

            function addTopic() {
                const index = topicIndex++;
                const topicHtml = `
            <div class="border p-3 mb-3 topic-block" data-index="${index}">
                <div class="d-flex justify-content-between align-items-center">
                    ${topicDropdown(index)}
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-success addQuestion">Add Question</button>
                        <button type="button" class="btn btn-sm btn-danger removeTopic">Remove Topic</button>
                    </div>
                </div>
                <div class="questionsContainer mt-3"></div>
            </div>
        `;
                container.find('#topicsContainer').append(topicHtml);
            }

            function addQuestion(topicBlock) {
                const topicIdx = topicBlock.data('index');
                const qIndex = topicBlock.find('.question-block').length;

                const questionHtml = `
            <div class="card p-3 mb-3 question-block border border-success">
                <textarea class="form-control mb-2" 
                    name="topics[${topicIdx}][questions][${qIndex}][question]" 
                    placeholder="Enter Question" required></textarea>
                <div class="optionsContainer"></div>
                <div class="mb-2 text-end">
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-info addOption">Add Option</button>
                        <button type="button" class="btn btn-sm btn-danger removeQuestion">Remove Question</button>
                    </div>
                </div>
            </div>
        `;
                topicBlock.find('.questionsContainer').append(questionHtml);
            }

            function addOption(questionBlock, topicIdx, qIndex) {
                const oIndex = questionBlock.find('.option-block').length;
                const optionHtml = `
            <div class="d-flex align-items-center mb-2 option-block">
                <input type="radio" name="topics[${topicIdx}][questions][${qIndex}][correctAnswer]" 
                    value="${oIndex}" class="form-check-input me-2">
                <input type="text" class="form-control me-2" 
                    name="topics[${topicIdx}][questions][${qIndex}][options][]" 
                    placeholder="Option ${oIndex + 1}" required>
                <button type="button" class="btn btn-sm btn-danger removeOption">
                    <i class="fa fa-times"></i>
                </button>
            </div>
        `;
                questionBlock.find('.optionsContainer').append(optionHtml);
            }
            function reindexOptions(questionBlock, topicIdx, qIndex) {
                questionBlock.find('.option-block').each(function (i) {
                    // Update radio
                    $(this).find('input[type="radio"]').attr('value', i);

                    // Update placeholder & name
                    $(this).find('input[type="text"]')
                        .attr('placeholder', 'Option ' + (i + 1));
                });
            }
            // Bind actions
            container.on('click', '#addTopicBtn', function () {
                addTopic();
            });

            container.on('click', '.removeTopic', function () {
                $(this).closest('.topic-block').remove();
            });

            container.on('click', '.addQuestion', function () {
                const topicBlock = $(this).closest('.topic-block');
                addQuestion(topicBlock);
            });

            container.on('click', '.removeQuestion', function () {
                $(this).closest('.question-block').remove();
            });

            container.on('click', '.addOption', function () {
                const questionBlock = $(this).closest('.question-block');
                const topicBlock = questionBlock.closest('.topic-block');
                const topicIdx = topicBlock.data('index');
                const qIndex = topicBlock.find('.question-block').index(questionBlock);
                addOption(questionBlock, topicIdx, qIndex);
                reindexOptions(questionBlock, topicIdx, qIndex);
            });

            container.on('click', '.removeOption', function () {
                const questionBlock = $(this).closest('.question-block');
                const topicBlock = questionBlock.closest('.topic-block');
                const topicIdx = topicBlock.data('index');
                const qIndex = topicBlock.find('.question-block').index(questionBlock);

                $(this).closest('.option-block').remove();

                reindexOptions(questionBlock, topicIdx, qIndex);
            });

            // Submit
            container.on('submit', '#questionForm', function (e) {
                e.preventDefault();
                const formData = $(this).serialize();

                $.post(settings.saveUrl, formData, function (res) {
                    // alert('Saved Successfully!');
                    settings.onSaveSuccess(res);
                }).fail(function () {
                    alert('Failed to save.');
                    settings.onSaveError();
                });
            });

            return this;
        };
    })(jQuery);
    $('#examApp').examBuilder({
        availableTopics: <?= $this->exam_model2->json_topic() ?>,
        saveUrl: '<?= base_url("exam/ajax/add_question") ?>',
        onSaveSuccess: function (res) {
            var d = (JSON.parse(res));
            // location.reload();
            SwalSuccess('Response', d.html, false, 'Reload').then((r) => {
                if (r.isConfimed)
                    location.reload();
            })
        }
    });
    $(document).on('click', '.edit,.delete', function (e) {
        // if($(this).hasClass())
        e.preventDefault();
        var quesData = ($(this).closest('li').data('param'));
        // log(quesData);
        if ($(this).hasClass('edit')) {
            ki_modal.find('.add-answer').remove();
            ki_modal.attr('data-bs-backdrop', "static");
            ki_modal.find('.modal-dialog').addClass('modal-lg');
            ki_modal.find('.modal-footer').prepend(`<button class="btn btn-outline hover-rotate-end btn-outline-dashed btn-outline-warning add-answer" type="button"><i class="fa fa-plus"></i> Add Choices</button>                    
                `);
            $.each(quesData.answers, function (i, v) {
                $.extend(v, {
                    answer_id: i
                });
                my_template('template', v).then((re) => {
                    $('.answer-area').append(re);
                });
            })
            myModel('<i class="fa fa-edit"></i> Edit Question', `
                                <input type="hidden" name="question_id" value="${quesData.ques_id}">
                                <div class="form-group">
                                    <lable class="form-label required">Enter Question</lable>
                                    <textarea class="form-control" placeholder="Enter Question" name="question">${quesData.question}</textarea>
                                </div>
                                <div class="answer-area mt-4" data-kt-buttons="true">
                                </div>
                            `, false).then((res) => {
                res.form.on('submit', function (e) {
                    e.preventDefault();
                    save_question_answer(this);
                })
            });
        }
        else {
            SwalWarning('Confirmation!',
                `Are you sure you want delete <b class="text-success">${quesData.question}</b> Question.`, true, 'Ok, Delete It.').then((e) => {
                    if (e.isConfirmed) {
                        // alert('OK');
                        $.AryaAjax({
                            url: 'exam/delete-question',
                            data: { ques_id: quesData.ques_id },
                        }).then((res) => {
                            if (res.status) {
                                toastr.success('Question Deleted Successfully..');
                                ki_modal.modal('hide');
                                render_data(rowData);
                            }
                            else
                                toastr.error('Something went wrong please try again.');
                        });
                    }
                })
        }
    });


    $(document).on('change', '.is-right', function () {
        ki_modal.find('.parent-ans').removeClass('active');
        $(this).closest('.parent-ans').addClass('active');
    })
    $(document).on('click', '.edit-ans', function () {
        var box = $(this).closest('label');
        var old_answer = $(box).find('.ans').val();
        var ans_Id  = $(box).find('.ans_id').val();
        // alert(ans_Id)
        var ques_id = ($(this).closest('.body').find('[name="question_id"]').val());
        var quesBox = $('.ques-box-'+ques_id);
        var questions = quesBox.data('param');
        
        bootbox.prompt({
            title: "Edit your Choice:",
            value: old_answer,
            centerVertical: true,
            closeButton: false,
            buttons: {
                confirm: {
                    label: 'Update',
                    className: 'btn-success'
                },
                cancel: {
                    label: 'Cancel',
                    className: 'btn-danger'
                }
            },
            callback: function (new_answer) {
                if (new_answer === null) return; // Cancel pressed

                new_answer = new_answer.trim();
                if (new_answer === "") {
                    toastr.warning("Answer cannot be empty!");
                    return;
                }

                // check duplicate (case-insensitive)
                var isDuplicate = false;
                $('.answer-area .ans').each(function () {
                    var val = $(this).val().trim();
                    if (val.toLowerCase() === new_answer.toLowerCase() && val !== old_answer.toLowerCase()) {
                        isDuplicate = true;
                        return false; // break loop
                    }
                });

                if (isDuplicate) {
                    toastr.error(`<b>'${new_answer}' already exists!</b>`);
                    return;
                }

                // update answer text & input value
                box.find('.ans').val(new_answer);
                box.find('.ans-title').text(new_answer);
                if (questions.answers.hasOwnProperty(ans_Id)) {
                    questions.answers[ans_Id].answer = new_answer;
                    questions.answers[ans_Id].parent_class = '';
                    questions.answers[ans_Id].is_chcked = '';
                    questions.answers[ans_Id].answer_id = '';
                    quesBox.attr('data-param', JSON.stringify(questions));
                    $('.choice-box-'+ans_Id).text(new_answer);
                    $.AryaAjax({
                        url: 'update-answer',
                        data: { id: ans_Id, text: new_answer },
                    });               
                }

                toastr.success('Answer updated successfully. Don’t forget to save the form!');
            }
        }).find('.modal-content').addClass('border border-primary');;
    });

    $(document).on('click', '.delete-ans', function () {
        var box = $(this).closest('label'),
            ans_id = $(this).siblings('.ans_id').val();
        var ques_id = ($(this).closest('.body').find('[name="question_id"]').val());
        var quesBox = $('.ques-box-'+ques_id);
        var questions = quesBox.data('param');
        // log(questions)
        SwalWarning('Confirmation!', 'Are you sure you want to delete this Answer.', true, 'Remove').then((e) => {
            if (e.isConfirmed) {
                if (ans_id) {
                    $.AryaAjax({
                        url: 'exam/remove-answer',
                        data: { id: ans_id },
                    }).then((res) => {
                        if (res.status) {
                            toastr.success('Answer Deleted Successfully..');
                            box.remove();
                            if (questions.answers.hasOwnProperty(ans_id)) {
                                delete questions.answers[ans_id];
                                $('.choice-box-'+ans_id).remove();
                                quesBox.data('param', questions);
                            }
                        }
                    });
                }
                else {
                    toastr.success('Answer Removed Successfully..');
                    box.remove();
                }
            }
        });
    })
    $(document).on('click', '.add-answer', function () {
        bootbox.prompt({
            title: "Enter your Choice:",
            placeholder: "Type your answer here...",
            centerVertical: true,
            closeButton: false,
            buttons: {
                confirm: {
                    label: 'Add',
                    className: 'btn-success'
                },
                cancel: {
                    label: 'Cancel',
                    className: 'btn-danger'
                }
            },
            callback: function (answer) {
                if (answer !== null) {
                    answer = answer.trim();
                    if (answer !== "") {
                        var list = $('.answer-area .ans');
                        var i = 0;
                        list.each(function () {
                            if (answer == ($(this).val()) && i == 0) {
                                i = 1;
                                toastr.error(`<b>'${answer}' Answer already exists.</b>`);
                                return;
                            }
                        });
                        if (i == 0) {
                            my_template('template', {
                                answer: answer,
                                parent_class: '',
                                is_chcked: '',
                                answer_id: ''
                            }).then((e) => {
                                $('.answer-area').append(e);
                            });
                        }
                    } else {
                        toastr.warning("Answer cannot be empty!");
                        return false;
                    }
                }
            }
        }).find('.modal-content').addClass('border border-primary');
    });

</script>