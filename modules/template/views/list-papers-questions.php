<div class="row p-0">
    <div class="col-md-8">
        <?php
        $index = 1;
        foreach ($questions as $ques) {
            $ques_id = $ques['id'];
            $list = $this->exam_model->list_question_answers($ques['id']);
            $data = [];
            $key = 'first';
            $i = 0;
            $editData = [
                'ques_id' => $ques['id'],
                'question' => $ques['question']
            ];

            foreach ($list->result() as $ans) {
                $editData['answers'][$ans->answer_id] = [
                    'answer' => $ans->answer,
                    'is_right' => $ans->is_right,
                    'parent_class' => $ans->is_right ? 'active' : '',
                    'is_chcked' => $ans->is_right ? 'checked' : '',
                ];
                $new = [
                    $key => $ans->answer,
                    "{$key}_is_right" => $ans->is_right
                ];
                if (isset($data[$i]))
                    $data[$i] = array_merge($data[$i], $new);
                else
                    $data[$i] = $new;
                if ($key == 'second') {
                    $key = 'first';
                    $i++;
                } else {
                    if ($key == 'first') {
                        $key = 'second';
                    }
                }
            }
            ?>
            <table class="w-100 table table-striped table-bordered border-primary bg-light-primary">
                <tbody>
                    <tr>
                        <th colspan="2" class="pe-4 fs-3">
                            <div class="d-flex flex-stack">
                                <div class=""><i class="fs-4 text-warning">QUE
                                        <?= $index++ ?>.
                                    </i>
                                    <b class="text-dark">
                                        <?= $ques['question'] ?>
                                    </b>
                                </div>
                                <div class="">
                                    </div>
                            </div>
                        </th>
                    </tr>
                    <?php
                    if (count($data)) {
                        $i = 1;
                        foreach ($data as $ans) {
                            echo '<tr><td>';
                            echo isset($ans['first']) ? '<span class="fs-4 fw-bold">' . $this->ki_theme->html($ans['first'])->radio('answer'.$ques_id,0,'','text-dark') .' </span>' : '';
                            echo '</td><td>';
                            echo isset($ans['second']) ? '<span class="fs-4 fw-bold">' . $this->ki_theme->html($ans['second'])->radio('answer'.$ques_id,0,'','text-dark') .'</span>' : '';
                            echo '</></tr>';
                        }
                    } else {
                        echo '<tr><td colspan="2">' . alert('No Answers found.', 'danger') . '</td></tr>';
                    }
                    ?>
                </tbody>
            </table>

            <?php
        }

        ?>

    </div>
    <div class="col-md-4">
        <div class="{card_class}">
            <div class="card-body">
                <div class="d-flex fw-semibold align-items-center">
                    <div class="bullet w-8px h-3px rounded-2 bg-success me-3"></div>
                    <div class="text-gray-500 flex-grow-1 me-4">Total Attempts</div>
                    <div class="fw-bolder text-gray-700 text-xxl-end">0</div>
                </div>
                <div class="d-flex fw-semibold align-items-center">
                    <div class="bullet w-8px h-3px rounded-2 bg-success me-3"></div>
                    <div class="text-gray-500 flex-grow-1 me-4">Total Questions</div>
                    <div class="fw-bolder text-gray-700 text-xxl-end">{max_questions}</div>
                </div>
            </div>
            <div class="card-body">
                <h3 class="card-title">Exam Note :</h3>
                1.) Exam देते समय New Tab Open ना करे। <br>
                2.) Exam देते समय Screen को बंद या Minimize ना करे। <br>
                3.) पेज को Reload ना करे। <br>
                4.) Internet Dis-Connect होने पर Exam Cut कर के Exam दोबारा Start करें!
            </div>
        </div>
    </div>
</div>