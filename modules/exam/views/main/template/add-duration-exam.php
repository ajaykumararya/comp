<?php
$checkExistingPaper = $this->exam_model2->get_exam_papers([
    'course_id' => $course_id,
    'session_id' => $session_id,
    'duration' => $current_duration,
    'duration_type' => $duration_type,
    'paper_type' => $exam_type
]);
?>
<form class="add-duration-exam-form exam-form">
    {hidden_fields}
    <div class="card card-primary border border-primary">
        <?php
        if ($checkExistingPaper->num_rows())
            echo form_hidden('paper_id', $checkExistingPaper->row('id'));
        if (isset($card_header)) {
            echo $card_header;
        }
        $SubjectWhere = [
            'course_id' => $course_id,
            'duration' => $current_duration,
            'isDeleted' => 0
        ];
        $listSubject = $this->student_model->course_subject($SubjectWhere);
        if ($listSubject->num_rows() == 0) {
            ?>
            <div class="card-body">
                <div class="alert alert-warning">
                    No subjects found for <?= humnize_duration_with_ordinal($current_duration, $duration_type) ?>. Please
                    add subjects first.
                </div>
            </div>
            <?php
            return;
        }
        ?>
        <div class="card-body">
            <?php
            if($checkExistingPaper->num_rows()){
                ?>
                <div class="alert alert-dark">
                    You are editing an existing paper for <?= humnize_duration_with_ordinal($current_duration, $duration_type) ?>.
                </div>
                <?php
            }
            ?>
            <div class="row">
                <div class="col-md-12 form-group mb-3">
                    <label for="" class="form-label required">Paper Title</label>
                    <textarea name="paper_title" required placeholder="Enter paper Title.." id=""
                        class="form-control"><?= $checkExistingPaper->row('title') ?></textarea>
                </div>
                <?php
                if ($exam_type == '1') {
                    ?>
                    <div class="col-md-6 form-group mb-3">
                        <label for="" class="form-label required">Exam Start Time</label>
                        <input type="text" placeholder="Choose Start Date & Time" name="start_time" required
                            class="form-control date-and-time-picker" value="<?= $checkExistingPaper->row('start_time') ?>">
                    </div>
                    <div class="col-md-6 form-group mb-3">
                        <label for="" class="form-label required">Exam End Time</label>
                        <input type="text" name="end_time" placeholder="Choose End Date & Time" required
                            class="form-control date-and-time-picker" value="<?= $checkExistingPaper->row('end_time') ?>">
                    </div>
                    <div class="col-md-12 table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Subject</th>
                                    <th>Topic</th>
                                    <th width="200px">Questions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $ttl = 0;
                                $index = 1;
                                foreach ($listSubject->result_array() as $subject) {
                                    $checkSubjectTopic = $this->exam_model2->get_exam_subjects([
                                        'paper_id' => $checkExistingPaper->row('id'),
                                        'subject_id' => $subject['id']
                                    ]);
                                    $ttl = $ttl + ($checkSubjectTopic->num_rows() ? $checkSubjectTopic->row('question') : 0);

                                    if ($checkExistingPaper->num_rows()) {
                                        echo '<input type="hidden" name="subjects[' . $subject['id'] . '][paper_subject_id]"
                                                value="' . ($checkSubjectTopic->num_rows() ? $checkSubjectTopic->row('id') : '') . '">';
                                    }
                                    ?>
                                    <tr>
                                        <td>
                                            <?= $index++ ?>.
                                        </td>
                                        <td>
                                            <?= $subject['subject_name'] ?>
                                            <?= $subject['subject_type'] == 'practical' ? label('Practical') : '' ?>
                                            <input type="hidden" name="subjects[<?= $subject['id'] ?>][subject_id]"
                                                value="<?= $subject['id'] ?>">
                                        </td>
                                        <td class="p-0">
                                            <select class="form-select topic custom_setting_input" data-control="select2"
                                                name="subjects[<?= $subject['id'] ?>][topic_id]" data-placeholder="Select Topic"
                                                data-allow-clear="true" style="font-size: 14px!important;color:white"
                                                required-message="Please Select a Topic" required>
                                                <option value=""></option>
                                                <?php
                                                $this->db->where('status', 1);
                                                $topics = $this->exam_model2->list_topics();

                                                foreach ($topics->result_array() as $topic) {
                                                    $selected = ($checkExistingPaper->num_rows() && $checkSubjectTopic->row('topic_id') == $topic['id']) ? 'selected' : '';
                                                    ?>
                                                    <option <?= $checkSubjectTopic->row('topic_id') ?> value="<?= $topic['id'] ?>"
                                                        <?= $selected ?>><?= $topic['title'] ?></option>
                                                    <?php
                                                }

                                                $this->db->reset_query();
                                                ?>
                                            </select>
                                        </td>
                                        <td class="p-0">
                                            <input type="number" name="subjects[<?= $subject['id'] ?>][questions]"
                                                class="form-control input-marks custom_setting_input"
                                                placeholder="No. Questions" required
                                                value="<?= $checkSubjectTopic->row('question') ?>">
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="3" class="text-end">Total Questions</th>
                                    <th>
                                        <span class="ttl_question"><?= $ttl ?></span>
                                    </th>
                                </tr>
                        </table>
                    </div>
                    <?php
                } else if ($exam_type == '2') {
                    ?>
                        <div class="col-md-12 table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th rowspan="2">Paper No.</th>
                                        <th rowspan="2">Subject</th>
                                        <th colspan="2" class="text-center">Data & Time</th>
                                        <th rowspan="2">Topic</th>
                                        <th rowspan="2" width="200px">Questions</th>
                                    </tr>
                                    <tr>
                                        <th class="text-center">Start</th>
                                        <th class="text-center">End</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $index = 1;
                                    $ttl = 0;
                                    foreach ($listSubject->result_array() as $subject) {
                                        $checkSubjectTopic = $this->exam_model2->get_exam_subjects([
                                            'paper_id' => $checkExistingPaper->row('id'),
                                            'subject_id' => $subject['id']
                                        ]);
                                        $ttl = $ttl + ($checkSubjectTopic->num_rows() ? $checkSubjectTopic->row('question') : 0);

                                        if ($checkExistingPaper->num_rows()) {
                                            echo '<input type="hidden" name="subjects[' . $subject['id'] . '][paper_subject_id]"
                                                    value="' . ($checkSubjectTopic->num_rows() ? $checkSubjectTopic->row('id') : '') . '">';
                                        }
                                        ?>
                                        <tr>
                                            <td>
                                            <?= $index++ ?>.
                                            </td>
                                            <td>
                                            <?= $subject['subject_name'] ?>
                                            <?= $subject['subject_type'] == 'practical' ? label('Practical') : '' ?>
                                                <input type="hidden" name="subjects[<?= $subject['id'] ?>][subject_id]"
                                                    value="<?= $subject['id'] ?>">
                                            </td>
                                            <td>
                                                <input class="date-and-time-picker form-control"
                                                    name="subjects[<?= $subject['id'] ?>][start_datetime]"
                                                    placeholder="Start Date & Time" required
                                                    value="<?= $checkSubjectTopic->row('start_time') ?>">
                                            </td>
                                            <td>
                                                <input class="date-and-time-picker form-control"
                                                    name="subjects[<?= $subject['id'] ?>][end_datetime]"
                                                    placeholder="End Date & Time" required
                                                    value="<?= $checkSubjectTopic->row('end_time') ?>">
                                            </td>
                                            <td class="p-0">
                                                <select class="form-select topic custom_setting_input" data-control="select2"
                                                    name="subjects[<?= $subject['id'] ?>][topic_id]" data-placeholder="Select Topic"
                                                    data-allow-clear="true" style="font-size: 14px!important;color:white"
                                                    required-message="Please Select a Topic" required>
                                                    <option value=""></option>
                                                    <?php
                                                    $this->db->where('status', 1);
                                                    $topics = $this->exam_model2->list_topics();

                                                    foreach ($topics->result_array() as $topic) {
                                                        $selected = ($checkExistingPaper->num_rows() && $checkSubjectTopic->row('topic_id') == $topic['id']) ? 'selected' : '';

                                                        ?>
                                                        <option value="<?= $topic['id'] ?>" <?= $selected ?>><?= $topic['title'] ?>
                                                        </option>
                                                    <?php
                                                    }

                                                    $this->db->reset_query();
                                                    ?>
                                                </select>
                                            </td>
                                            <td class="p-0">
                                                <input type="number" name="subjects[<?= $subject['id'] ?>][questions]"
                                                    class="form-control input-marks custom_setting_input"
                                                    placeholder="No. Questions" required
                                                    value="<?= $checkSubjectTopic->row('question') ?>">
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="5" class="text-end">Total Questions</th>
                                        <th>
                                            <span class="ttl_question"><?= $ttl ?></span>
                                        </th>
                                    </tr>
                            </table>
                        </div>
                    <?php
                }
                ?>
                <div class="col-md-12 form-group mb-3">
                    <label for="" class="form-label required">Instructions</label>
                    <textarea name="instructions" requried placeholder="Enter Instructions.." id=""
                        class="form-control"><?= $checkExistingPaper->row('instructions') ?></textarea>
                </div>

            </div>
        </div>
        <div class="card-footer">
            <?= $checkExistingPaper->num_rows() ? '{update_button}' : '{publish_button}' ?>
        </div>
    </div>

</form>