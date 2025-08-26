<div class="row">
    <div class="col-md-12">
        <div class="{card_class}">
            <div class="card-header">
                <h3 class="card-title">Add Paper</h3>
            </div>
            <div class="card-body row">
                <div class="col-md-4 form-group">
                    <label for="" class="form-label required">Select Course</label>
                    <select name="course_id" data-control="select2" class="form-select" data-placeholder="Select Course">
                        <option value=""></option>
                        <?php
                        $list = $this->exam_model->list_setting_courses();
                        if(count($list)){
                            foreach($list as $course){
                                echo '<option value="'.$course['course_id'].'" data-subcontent="'.$course['course_duration'].'" data-type="'.$course['type'].'">'.$course['course_name'].'</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="card-footer"></div>
        </div>
    </div>
</div>