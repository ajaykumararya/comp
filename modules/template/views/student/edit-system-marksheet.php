<?php
$result_id = $this->input->post('id');
if ($result_id) {
    $marks = $this->student_model->results_marks($result_id);
    $marksheet = $marks->row();
    $subjects = $marks->result_array();
    ?>

    <div class="row">
        <style>
            .custom_setting_input {
                font-size: 18px !important;
                text-align: center;
            }
        </style>
        <div class="col-md-4">
            <input type="hidden" name="id" value="<?= $result_id ?>">
            <div class="form-group mb-4">
                <label class="form-label required">Issue Date</label>
                <input type="text" name="date" value="<?= $marksheet->issue_date ?>" class="form-control selectdate">
            </div>
        </div>
        <div class="col-md-12">
            <div class="card card-body marks-body p-0">
                <div class="table-responsive">
                    <table class="table table-bordered border-primary">
                        <thead class="bg-light-primary text-white">
                            <tr>
                                <th class="text-center fs-4">Subject Code</th>
                                <th class="text-center fs-4">Subject Name</th>
                                <th class="text-center fs-4">Max. Marks</th>
                                <th class="text-center fs-4">Obtain</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $ttl = 0;
                            $totalObtained = 0;
                            $template = '
                                         <td class="text-center fs-4">{max_marks}</td>
                                         <td>
                                            <div class="form-group">
                                                <input type="text" placeholder="Enter {title} Marks" name="marks[{id}][{name}]"  value="{value}" class="form-control custom_setting_input cal-marks">
                                            </div>
                                         </td>';

                            foreach ($subjects as $subject) {
                                $subject['theory_max_marks'] = 100;
                                $rowspan = $subject['subject_type'] == 'both' ? 2 : 1;
                                ?>
                                <tr>
                                    <td class="text-center fs-4" rowspan="<?= $rowspan ?>">
                                        <?= $subject['subject_code'] ?>
                                    </td>
                                    <td class="text-center fs-4" rowspan="<?= $rowspan ?>">
                                        <?= $subject['subject_name'] ?>
                                    </td>
                                    <?php
                                    $ttl += $subject['theory_max_marks'];
                                    $totalObtained += $subject['theory_marks'];
                                    echo $this->parser->parse_string($template, [
                                        'id' => $subject['mark_id'],
                                        'title' => 'Marks',
                                        'name' => 'theory_marks',
                                        'max_marks' => $subject['theory_max_marks'],
                                        'value' => $subject['theory_marks']
                                    ], true);

                                    ?>
                                </tr>
                                <?php
                            }
                            ?>
                            <tr class="bg-light-success text-white">
                                <td class="text-center fs-4" colspan="2">
                                    Total Marks
                                </td>
                                <td class="text-center fs-4">
                                    <?= $ttl ?>
                                </td>
                                <th class="total-marks text-center fs-4"><?=$totalObtained ? $totalObtained : '00'?></th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="ttl_marks" class="ttl-marks">
    <input type="hidden" class="subject-ttl-marks" value="<?= $ttl ?>">
    <input type="hidden" name="admit_card_id">
    <?php
} else
    alert('Something went wrong.', 'danger');
?>