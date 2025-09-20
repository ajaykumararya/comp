<div class="row">
    <div class="col-md-12">
        <form action="" class="session-schedule" id="form">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">Add Schedule</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-4">
                                <label class="form-label required">Center</label>
                                <?php
                                $center_id = 0;
                                if ($this->center_model->isCenter()) {
                                    $center_id = $this->center_model->loginId();
                                    $this->db->where('id', $center_id);
                                }
                                ?>
                                <select class="form-select check-for-empty" name="center_id" data-control="select2"
                                    data-placeholder="Select a Center"
                                    data-allow-clear="<?= $this->center_model->isAdmin() ?>">
                                    <option></option>
                                    <?php
                                    $list = $this->center_model->get_center(0, 'center')->result();

                                    // $list = $this->db->where('type', 'center')->get('centers')->result();
                                    foreach ($list as $row) {
                                        $selected = $center_id == $row->id ? 'selected' : '';
                                        echo '<option value="' . $row->id . '" ' . $selected . ' data-kt-rich-content-subcontent="' . $row->institute_name . '"
                                    data-kt-rich-content-icon="' . $row->image . '">' . $row->name . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label required">Course</label>
                                <select class="form-select fetch-duration check-for-empty" name="course_id" data-control="select2"
                                    data-placeholder="Select a Course" data-allow-clear="true">
                                   
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group set-duration">
                                <input type="hidden" name="duration_type">
                                <label for="course_duration" class="form-label required">Duration in
                                    <?= $this->ki_theme->course_duration('implode', ' / ') ?>
                                </label>
                                <select name="duration" data-control="select2" data-placeholder="Select duration"
                                    id="course_duration" class="form-select get-report" data-allow-clear="true">
                                    <option></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="form-label required">Exam Centre</label>
                                <select name="exam_centre_id" id="" data-allow-clear="true" data-placeholder="Select Exam Centre" class="form-control" data-control="select2">
                                    <option></option>
                                    <?php
                                    $centres = $this->db->order_by('centre_name','ASC')->get('exam_centres');
                                    if($centres->num_rows()){
                                        foreach($centres->result() as $row){
                                            echo '<option value="'.$row->id.'">'.$row->centre_name.'</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <!-- <input type="hidden" name="duration_type"> -->
                                <label for="" class="form-label required">Select Session</label>
                                <select name="session_id" id="" class="form-select get-report" data-control="select2"
                                    data-placeholder="Select Session " data-allow-clear="true">
                                    <option></option>
                                    <?php
                                    $getSession = $this->db->get('session');
                                    foreach ($getSession->result() as $session)
                                        echo '<option value="' . $session->id . '">' . $session->title . '</option>';
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body list-subjects">

                </div>
                <div class="card-footer">

                </div>
            </div>
        </form>
    </div>
</div>