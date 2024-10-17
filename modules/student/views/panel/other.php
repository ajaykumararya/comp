<div class="row">
    <form action="" class="update-student-batch-and-roll-no">
        <input type="hidden" name="student_id" value="{student_id}">
        <div class="col-md-12">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title"> <?= $this->ki_theme->keen_icon('pencil') ?> Update Details</h3>
                    <div class="card-toolbar">
                        <?php
                        echo $this->ki_theme
                            ->with_icon('pencil')
                            ->with_pulse('success')
                            ->outline_dashed_style('success')
                            ->button('Update', 'submit');
                        ?>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="roll_no" class="form-label required">Roll Number</label>
                                <input type="text" name="roll_no" class="form-control" placeholder="Enter Roll Number"
                                    value="{roll_no}">
                            </div>
                        </div>
                        <?php
                    if (!CHECK_PERMISSION('NOT_TIMETABLE')) {
                        ?>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="roll_no" class="form-label required">Time Table</label>
                                <select class="form-select" name="batch_id" data-control="select2"
                                    data-placeholder="Select a Time Table">
                                    <option></option>
                                    <?php
                                    $listBatch = $this->db->get('batch');
                                    foreach ($listBatch->result() as $row) {
                                        echo '<option value="' . $row->id . '" ' . (@$batch_name == $row->batch_name ? 'selected' : '') . '>' . $row->batch_name . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <?php
                    }

                    if (CHECK_PERMISSION('ADMISSION_WITH_SESSION')) {
                        ?>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="roll_no" class="form-label required">Session</label>
                                <select class="form-select" name="batch_id" data-control="select2"
                                    data-placeholder="Select a Session">
                                    <option></option>
                                    <?php
                                    $listBatch = $this->db->where('status',1)->get('session');
                                    foreach ($listBatch->result() as $row) {
                                        echo '<option value="' . $row->id . '" ' . (@$session_id == $row->id ? 'selected' : '') . '>' . $row->title . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                        <div class="col-md-6 mt-4">
                            <div class="form-group">
                                <label for="" class="foem-label">Course</label>
                                <select name="course_id" data-control="select2" data-placeholder="Select Course"
                                    id="course" class="form-select">
                                    <option></option>
                                    <?php

                                    $list = $this->center_model->get_assign_courses($institute_id);
                                    foreach ($list->result() as $c)
                                        echo "<option value='$c->course_id' ".($c->course_id == $course_id ? 'selected' : '') ." data-kt-rich-content-subcontent='{$c->duration} {$c->duration_type}'>$c->course_name</option>";
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 mt-4">
                            <div class="form-group">
                                <label for="" class="foem-label">Admission Date</label>
                                <input type="text" name="admission_date" class="form-control current-date flatpickr-input" value="{admission_date}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>