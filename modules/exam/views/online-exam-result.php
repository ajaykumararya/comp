<section class="gray-bg pb-5 pt-5" data-aos="fade-right">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8">
                <div class="text-center animation animated fadeInUp" data-aos="fade-up" data-animation="fadeInUp"
                    data-animation-delay="0.01s" style="animation-delay: 0.01s; opacity: 1;">
                    <div class="heading_s1 text-center">
                        <h1 class="main-heading center-heading"><i class="fa fa-wpforms"></i> Online Exam Result</h1>
                    </div>
                </div>
            </div>
            <style>
                .ans-icon {
                    padding: 3px;
                    border-radius: 50%;
                    color: white;
                    width: 23px;
                    text-align: center;
                    margin-left: 10px;
                }

                .ans-icon.wrong {
                    background: red;
                }

                .ans-icon.right {
                    background: green
                }
            </style>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header ">
                        <div class="row">


                            <div class="col-md-10">
                                <h3 class="card-title mb-0">{student_name}



                                </h3>
                                <strong class="text-success">{course_name}</strong>
                                <div class="toolbar">
                                    {roll_no}
                                </div>
                            </div>
                            <div class="col-md-2">
                                <?php
                                if ($this->student_model->isStudent()) {
                                    echo '<a href="' . base_url('student') . '" class="btn formSend_btn btn-sm btn-primary">Dashboard</a>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h3>Overview</h3>
                        <table class="table table-bordered mb-4">
                            <tr>
                                <th>Total Questions</th>
                                <td>{max_questions}</td>
                                <th>Total Attemped</th>
                                <td>{max_questions}</td>
                            </tr>
                            <tr>
                                <th>Total Right Answers</th>
                                <td>{ttl_right_answers}</td>
                                <th>Total Percentage</th>
                                <td>{percentage} %</td>
                            </tr>
                        </table>
                        <?php
                        if (!$this->student_model->isStudent()) {
                            ?>
                            <h3>Answer-Sheet of <b class="text-primary">{exam_title}</b></h3>
                            <?php
                            $index = 1;
                            if ($attempt_questions) {
                                foreach ($exam_questions as $myRow) {
                                    $ques_id = $myRow['question_id'];
                                    $question = $this->exam_model->fetch_question($ques_id);
                                    $list = $this->exam_model->list_question_answers($ques_id);
                                    if ($list->num_rows() && $question->num_rows()) {
                                        $ques = $question->row();
                                        $list = $list->result();
                                        shuffle($list);
                                        ?>
                                        <table class="w-100 table table-striped table-bordered border-warning " data-question="">
                                            <tbody>
                                                <tr>
                                                    <th colspan="2" class="pe-4 fs-3">
                                                        <div class="d-flex flex-stack">
                                                            <div class=""><i class="fs-4 text-warning">QUE
                                                                    <?= $index++ ?>.
                                                                </i>
                                                                <b class="text-dark">
                                                                    <?= $ques->question ?>
                                                                </b>
                                                            </div>
                                                            <div class="">
                                                            </div>
                                                        </div>
                                                    </th>
                                                </tr>
                                                <?php
                                                if (count($list)) {
                                                    $i = 0;
                                                    echo '<tr>';
                                                    foreach ($list as $ans) {                                                    // pre($ans);
                                                        $icon = '';
                                                        if ($myRow['answer_id'] == $ans->answer_id) {
                                                            $icon = '<i class="fa fa-times ans-icon wrong"></i>';
                                                        }
                                                        if ($ans->is_right) {
                                                            $icon = '<i class="fa fa-check ans-icon right"></i>';
                                                        }
                                                        echo '<td>' . ($i++ + 1) . '. ' . $ans->answer . ' ' . $icon . ' </td>';
                                                        if ($i % 2 == 0)
                                                            echo '</tr><tr>';
                                                    }
                                                    echo '</tr>';
                                                } else {
                                                    echo '<tr><td colspan="2">' . alert('No Answers found.', 'danger') . '</td></tr>';
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                        <?php
                                    }
                                }
                            }
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    document.title = '{page_name}';
</script>