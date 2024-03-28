<div class="row">
    <div class="col-md-12">
        <form action="" id="arrange_subjects">
            <div class="{card_class}">
                <div class="card-body">
                    <div class="form-group">
                        <label for="" class="form-label">Select Course</label>
                        <select name="course_id" id="" class="form-select"  data-control="select2" data-placeholder="Select Course">
                            <option></option>
                            <?php
                            $systemCourses = $this->student_model->list_system_course();
                            foreach($systemCourses->result() as $c){
                                echo '<option value="'.$c->id.'">'.$c->course_name.'</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <div class="list-subjects-box mt-5">

                    </div>
                </div>
            </div>
        </form>   
    </div>
</div>