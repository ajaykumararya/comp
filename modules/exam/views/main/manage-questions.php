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
                $listTopics = $this->exam_model->list_topics();
                $allQuestions = $this->exam_model->my_question_bank();
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
                                            ?>
                                            <li class="p-1 text-danger fw-bold" type="1">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <!-- Collapse Toggle -->
                                                    <a class="text-primary fw-bold text-decoration-none d-flex align-items-center"
                                                        data-bs-toggle="collapse" href="#demo_q<?= $j ?>" role="button"
                                                        aria-expanded="false" aria-controls="demo_q<?= $j ?>">
                                                        <span><?= $ques['question'] ?></span>
                                                        <i class="fas fa-eye toggle-icon ms-2"></i>
                                                    </a>

                                                    <!-- Edit Button -->
                                                    <button class="btn btn-sm btn-light-warning ms-3">
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
                                                                echo '<li class="text-' . ($option['is_correct'] ? 'success' : 'danger') . '">' . htmlentities($option['text']) . '</li>';
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
        availableTopics: <?= $this->exam_model->json_topic() ?>,
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
</script>