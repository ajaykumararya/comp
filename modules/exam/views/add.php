<div class="row">
    <div class="col-md-12">
        <form action="" id="add_exam">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">Add New Exam</h3>
                </div>
                <div class="div card-body">
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <div class="form-group">
                                <label for="" class="form-label required">Exam Title</label>
                                <textarea name="exam_title" id="exam-editor" rows="2" placeholder="Enter Title"
                                    class=" exam-editor form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 mb-4">
                            <div class="form-group">
                                <label for="" class="form-label">Description</label>
                                <textarea name="description" id="" rows="2" placeholder="Enter Description"
                                    class="form-control exam-editor "></textarea>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="course" class="form-label required">Course</label>
                                <select name="course_id" data-control="select2" data-placeholder="Select Course"
                                    id="course" class="form-select fetch-duration">
                                    <option></option>
                                    <?php
                                    $list = $this->db->get('course');
                                    foreach ($list->result() as $c)
                                        echo "<option value='$c->id' data-duration='$c->duration' data-durationType='$c->duration_type'>$c->course_name</option>";
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group set-duration">
                                <input type="hidden" name="duration_type">
                                <label for="course_duration" class="form-label required">Select Duration in
                                    <?= $this->ki_theme->course_duration('implode', ' / ') ?>
                                </label>
                                <select name="duration" data-control="select2" data-placeholder="Select duration"
                                    id="course_duration" class="form-select ">
                                    <option></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" class="form-label">Max Questions</label>
                                <input type="" class="form-control" name="max_questions" value="0">
                            </div>
                        </div>

                        <div class="col-md-6 mt-4">
                            <div class="form-group">
                                <label for="" class="form-label">Exam Schedule</label>
                                <div class="input-group mb-5">
                                    <span class="input-group-text" id="basic-addon1">
                                        <div class="form-check form-switch form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexSwitchDefault" name="schedule_status" />

                                        </div>
                                    </span>
                                    <input type="text" class="form-control selectRange-with-time" name="schedule" disabled placeholder="Select Schedule" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mt-4">
                            <div class="form-group">
                                <label for="" class="form-label">Exam Timer</label>
                                <div class="input-group mb-5">
                                    <span class="input-group-text" id="basic-addon1">
                                        <div class="form-check form-switch form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexSwitchDefault" name="timer_status" />

                                        </div>
                                    </span>
                                    <input type="text" class="form-control timer" name="timer" disabled placeholder="Select Timer" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" card-footer">
                    {publish_button}
                </div>
            </div>
        </form>
    </div>
</div>