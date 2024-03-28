<div class="row">
    <div class="col-md-12">
        <form action="" id="add_request">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">Send Request for Exam</h3>
                </div>
                <div class="card-body">
                    <?php

                    ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="course" class="form-label required">Course</label>
                                <select name="course_id" data-control="select2" data-placeholder="Select Course"
                                    id="course" class="form-select">
                                    <option></option>
                                    <?php

                                    $list = $this->center_model->get_assign_courses($this->center_model->loginId());
                                    foreach ($list->result() as $c)
                                        echo "<option value='$c->course_id' data-kt-rich-content-subcontent='{$c->duration} {$c->duration_type}'>$c->course_name</option>";
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 mt-3">
                            <div class="form-group">
                                <label for="" class="form-label required">Message</label>
                                <textarea name="message" class="form-control" placeholder="Enter Your Message" id=""
                                    cols="30" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">{send_button}</div>
            </div>
        </form>
    </div>
    <div class="col-md-12 mt-5">
        <div class="{card_class}">
            <div class="card-header">
                <h3 class="card-title">List Request(s)</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="requestTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Course</th>
                                <th>Exam</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>