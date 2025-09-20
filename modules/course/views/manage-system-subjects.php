<div class="row">
    <div class="col-md-12">
        <form action="" id="subject_add">
            <div class="{card_class}">
                <div class="card-header collapsible cursor-pointer rotate" data-bs-toggle="collapse"
                    data-bs-target="#kt_docs_card_collapsible">
                    <h3 class="card-title"><i class="fa fa-plus text-dark fw-bold fs-1"></i> &nbsp;Add Subject</h3>
                    <div class="card-toolbar rotate-180">
                        <i class="ki-duotone ki-down fs-1"></i>
                    </div>
                </div>
                <div id="kt_docs_card_collapsible" class="collapse show">
                    <div class="card-body">
                        <div class="row">
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
                                    <label for="" class="form-label required">Subject Code</label>
                                    <input type="text" class="form-control" placeholder="Enter Subject Code"
                                        name="subject_code">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="subject_name" class="form-label required">Subject Name</label>
                                    <textarea type="text" class="form-control" name="subject_name"
                                        placeholder="Enter Subject Name" data-kt-autosize="true"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        {publish_button}
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-12 mt-4">
        <div class="{card_class}">
            <div class="card-header">
                <h3 class="card-title"><i class="fa fa-list text-dark fw-bold fs-1"></i> &nbsp; List All Subjects</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="list-subjects">
                        <thead>
                            <tr>
                                <th >#</th>
                                <th >Code</th>
                                <th >Name</th>
                                <th >Course</th>
                                <th >Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12 mt-4">
        <div class="{card_class}">
            <div class="card-header">
                <h3 class="card-title"><i class="fa fa-list text-dark fw-bold fs-1"></i> &nbsp; List All Deleted Subjects</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="deleted-list-subjects">
                        <thead>
                            <tr>
                                <th >#</th>
                                <th >Code</th>
                                <th >Name</th>
                                <th >Course</th>
                                <th >Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script id="formTemplate" type="text/x-handlebars-template">
    <input type="hidden" name="id" value="{{id}}">
    
    <div class="form-group mb-4">
        <label class="form-label">Enter Subject Code</label>
        <input type="text" name="subject_code" class="form-control" placeholder="Enter Subject Code" value="{{subject_code}}">
    </div>
    <div class="form-group mb-4">
        <label class="form-label required">Enter Subject Name</label>
        <input type="text" name="subject_name" class="form-control" placeholder="Enter Subject name" value="{{subject_name}}">
    </div>
</script>