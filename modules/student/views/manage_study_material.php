<div class="row">
    <div class="col-md-12">
        <form action="" id="upload_study_material">
            <input type="hidden" name="material_id" value="<?= time() ?>">
            <input type="hidden" name="upload_by" value="<?= $this->student_model->loginId() ?>">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">
                        <?= $this->ki_theme->keen_icon('cloud-add') ?> Upload Study Material
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-4 ">
                                <label class="form-label required">Center</label>
                                <?php
                                $center_id = 0;
                                if ($this->center_model->isCenter()) {
                                    $center_id = $this->center_model->loginId();
                                    $this->db->where('id', $center_id);
                                }
                                ?>
                                <select class="form-select" name="center_id" data-control="select2"
                                    data-placeholder="Select a Center"
                                    data-allow-clear="<?= $this->center_model->isAdmin() ?>">
                                    <option></option>
                                    <?php
                                    $list = $this->db->where('type', 'center')->get('centers')->result();
                                    foreach ($list as $row) {
                                        $selected = $center_id == $row->id ? 'selected' : '';
                                        echo '<option value="' . $row->id . '" ' . $selected . ' data-kt-rich-content-subcontent="' . $row->institute_name . '"
                                    data-kt-rich-content-icon="' . $row->image . '">' . $row->name . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label required">Course</label>
                                <select class="form-select" name="course_id" data-control="select2"
                                    data-placeholder="Select a Course">
                                    <option></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title" class="form-label required mt-4">Title</label>
                                <input type="text" class="form-control" name="title" placeholder="Enter Title">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="file" class="form-label required mt-4">File</label>
                                <input type="file" class="form-control" name="file">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description" class="form-label mt-4">Description</label>
                                <textarea class="form-control" name="description" cols="4"
                                    placeholder="Enter Description"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    {publish_button}
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-12 mt-5">
        <div class="{card_class}">
            <div class="card-header">
                <h3 class="card-title">List Study Material</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Course</th>
                                <th>Title</th>
                                <th>File</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>