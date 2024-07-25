<div class="row">
    <div class="col-md-12">
        <form id="create-marksheet">
            <div class="{card_class}">
                <div class="card-header collapsible cursor-pointer rotate" data-bs-toggle="collapse"
                    data-bs-target="#kt_docs_card_collapsible">
                    <h3 class="card-title">Create Marksheet</h3>
                    <div class="card-toolbar rotate-180">
                        <i class="ki-duotone ki-down fs-1"></i>
                    </div>
                </div>
                <div id="kt_docs_card_collapsible" class="collapse show">
                    <div class="card-body">
                        <div class="row">
                            <?php
                            $center_id = 0;
                            $boxClass = '';
                            if ($this->center_model->isCenter()) {
                                $center_id = $this->center_model->loginId();
                                $this->db->where('id', $center_id);
                                $boxClass = 'd-none';
                            }

                            ?>
                            <div class="form-group mb-4 col-md-4 col-xs-12 col-sm-12 <?= $boxClass ?>">
                                <label class="form-label required">Center</label>

                                <select class="form-select" name="center_id" data-control="select2"
                                    data-placeholder="Select a Center"
                                    data-allow-clear="<?= $this->center_model->isAdmin() ?>">
                                    <option></option>
                                    <?php
                                    $list = $this->center_model->get_center(0,'center')->result();
                                    foreach ($list as $row) {
                                        $selected = $center_id == $row->id ? 'selected' : '';
                                        echo '<option value="' . $row->id . '" ' . $selected . ' data-kt-rich-content-subcontent="' . $row->institute_name . '"
                                    data-kt-rich-content-icon="' . $row->image . '">' . $row->name . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="form-label required">Select Student</label>
                                <select name="student_id" id="" data-control="select2" data-placeholder="Select Stduent"
                                    class="form-select">
                                    <option></option>
                                    ?>
                                </select>
                                <!-- <input type="text" name="batch_name" class="form-control" placeholder="Enter batch name"> -->
                            </div>
                            <div class="form-group col-md-4">
                                <label for="" class="form-label required">Select Course Duration</label>
                                <input type="hidden" name="course_duration">
                                <input type="hidden" name="course_id">
                                <input type="hidden" name="course_duration_type">
                                <select name="duration" id="" class="form-select" data-control="select2"
                                    data-placeholder="Select Course Duration">
                                    <option></option>
                                </select>
                            </div>

                            <div class="col-md-4 form-group mb-5">
                                <label for="" class="form-label">Issue Date</label>
                                <input type="text" name="date" value="<?=$this->ki_theme->date()?>" class="form-control current-date">
                            </div>

                        </div>
                        <div class="row marks_table"></div>
                    </div>
                    <div class="card-footer">
                        {publish_button}
                    </div>
                </div>
            </div>
        </form>
    </div>
    
</div>