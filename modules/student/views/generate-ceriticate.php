<div class="row">
    <div class="col-md-12">
        <form id="certificate_form">
            <input type="hidden" name="course_id">
            <div class="{card_class}">
                <div class="card-header collapsible cursor-pointer rotate" data-bs-toggle="collapse"
                    data-bs-target="#kt_docs_card_collapsible">
                    <h3 class="card-title">Generate Certificate</h3>
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
                            <div class="form-group mb-4 col-md-4 <?=$boxClass?>">
                                <label class="form-label required">Center</label>

                                <select class="form-select" name="center_id" data-control="select2"
                                    data-placeholder="Select a Center"
                                    data-allow-clear="<?= $this->center_model->isAdmin() ?>">
                                    <option></option>
                                    <?php
                                    // $list = $this->db->where('type', 'center')->get('centers')->result();
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
                                <select name="student_id" id="" data-control="select2"
                                    data-placeholder="Select Stduent" class="form-select">
                                    <option></option>
                                    ?>
                                </select>
                                <!-- <input type="text" name="batch_name" class="form-control" placeholder="Enter batch name"> -->
                            </div>
                            <div class="form-group col-md-4">
                                <label class="form-label required">Select Issue Date</label>
                                <input value="<?=date('d-m-Y')?>" name="issue_date" class="form-control current-date">
                                <!-- <input type="text" name="batch_name" class="form-control" placeholder="Enter batch name"> -->
                            </div>
                            <?php
                            if(PATH == 'zcc' || CHECK_PERMISSION('CERTIFICATE_EXAM_CONDUCTED')):
                                ?>
                            <div class="form-group col-md-4">
                                <label for="" class="form-label">Examination Conducted Date</label>
                                <input type="text" placeholder="Examination Conducted Date" name="exam_conduct_date" class="form-control select-date-month-year">
                            </div>
                           <?php
                            endif;
                           ?>
                        </div>
                        <div class="col-md-12 message mt-3"></div>

                    </div>
                    <div class="card-footer">
                        {publish_button}
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-12 mt-10">
        <div class="{card_class}">
            <div class="card-header collapsible cursor-pointer rotate" data-bs-toggle="collapse" data-bs-target="#list">
                <h3 class="card-title">List Certificate(s)</h3>
                <div class="card-toolbar rotate-180">
                    <i class="ki-duotone ki-down fs-1"></i>
                </div>
            </div>
            <div id="list" class="collapse show">
                <div class="card-body">

                    <div class="table-responsive">
                        <!--begin::Datatable-->
                        <table id="list-certificates" class="table align-middle table-row-dashed fs-6 gy-5">
                            <thead>
                                <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">

                                    <th>Roll No</th>
                                    <th>Student Name</th>
                                    <th>Course</th>
                                    <th>Issue Date</th>
                                    <!-- <th>Session</th> -->
                                    <th>Institute</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 fw-semibold">
                            </tbody>
                        </table>
                        <!--end::Datatable-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>