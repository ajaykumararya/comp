<?php
$index = 1;
foreach ($questions as $ques) {
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
            'is_chcked' =>  $ans->is_right ? 'checked' : '',
        ];
        $new = [
            $key => $ans->answer,
            "{$key}_is_right" => $ans->is_right
        ];
        if (isset ($data[$i]))
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
    // pre($data);
    ?>
    <table class="w-100 table table-striped table-bordered border-primary bg-light-primary" data-param='<?=json_encode($editData)?>'>
        <tbody>
            <tr>
                <th colspan="2" class="pe-4 fs-2">
                    <div class="d-flex flex-stack">
                        <div class=""><i class="fs-4 text-warning">QUE
                                <?= $index++ ?>.
                            </i>
                            <b class="text-dark">
                                <?= $ques['question'] ?>
                            </b>
                        </div>
                        <div class="">
                            <a class="btn btn-xs btn-sm btn-info edit"><i class="fa fa-pencil"></i></a>
                            <a class="btn btn-xs btn-sm btn-danger delete"><i class="fa fa-trash"></i></a>
                        </div>
                    </div>
                </th>
            </tr>
            <?php
            if (count($data)) {
                $i = 1;
                foreach ($data as $ans) {
                    echo '<tr><td>';
                    echo isset ($ans['first']) ? ($i++) . '.<span class="p-4 fs-3 fw-bold">' . $ans['first'] . '</span>' . ($ans['first_is_right'] ? $this->ki_theme->keen_icon('double-check-circle text-success mt-3', 3, 1, 'solid') : '') : '';
                    echo '</td><td>';
                    echo isset ($ans['second']) ? ($i++) . '.<span class="p-4 fs-3 fw-bold">' . $ans['second'] . '</span>' . ($ans['second_is_right'] ? $this->ki_theme->keen_icon('double-check-circle text-success mt-3', 3, 1, 'solid') : '') : '';
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
