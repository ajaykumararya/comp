<div class="row">
    <div class="col-md-12 mb-2">
        <form action="">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">Add NOC</h3>
                </div>
                <div class="card-body row">
                    <div class="col-md-4 form-group mb-3">
                        <label for="" class="form-label">Student</label>
                        <select name="student_id" required id="" class="form-control" data-control="select2">
                            <option></option>
                            <?php
                            $students = $this->student_model->get_passout_student();
                            echo $this->db->last_query();
                            // if ($students->num_rows()) {
                            //     foreach ($students->result() as $student)
                            //         echo '<option value="' . $student->id . '">' . $student->student_name . '</option>';
                            // }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="" class="form-label">Sr No.</label>
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="" class="form-label">Date</label>
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="" class="form-label">Attained To</label>
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="" class="form-label">Attained From</label>
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="" class="form-label">Passing Year</label>
                    </div>
                </div>
                <div class="card-footer">
                    {publish_button}
                </div>
            </div>
        </form>
    </div>
</div>