<div class="row">
    <div class="col-md-12">
        <form id="admit_card_form">
            <div class="{card_class}">
                <div class="card-header collapsible cursor-pointer rotate" data-bs-toggle="collapse"
                    data-bs-target="#kt_docs_card_collapsible">
                    <h3 class="card-title">Create Admit Card</h3>
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
                            <div class="form-group mb-4 col-md-4 col-xs-12 col-sm-12 <?=$boxClass?>">
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
                                <select name="student_id" id="" data-control="select2"
                                    data-placeholder="Select Stduent" class="form-select">
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

                            <div class="form-group col-md-4">
                                <input type="hidden" name="duration_type" value="">
                                <label for="" class="form-label required">Select Session</label>
                                <select name="session_id" id="" class="form-select" data-control="select2"
                                    data-placeholder="Select Session ">
                                    <option></option>
                                    <?php
                                    $getSession = $this->db->get('session');
                                    foreach($getSession->result() as $session)
                                        echo '<option value="'.$session->id.'">'.$session->title.'</option>';
                                    ?>
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="" class="form-label required">Enrollment No</label>
                                <input type="text" name="enrollment_no" placeholder="Enter Enrollment No" class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="" class="form-label required">Exam Date & Time</label>
                                <input name="exam_date" class="form-control date-with-time" placeholder="Select Exam Date & Time">
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
    <div class="col-md-12 mt-10">
        <div class="{card_class}">
            <div class="card-header collapsible cursor-pointer rotate" data-bs-toggle="collapse" data-bs-target="#list">
                <h3 class="card-title">List Admit Card(s)</h3>
                <div class="card-toolbar rotate-180">
                    <i class="ki-duotone ki-down fs-1"></i>
                </div>
            </div>
            <div id="list" class="collapse show">
                <div class="card-body">

                    <div class="table-responsive">
                        <!--begin::Datatable-->
                        <table id="list-admit-card" class="table align-middle table-row-dashed fs-6 gy-5">
                            <thead>
                                <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">

                                    <th>Roll No</th>
                                    <th>Student Name</th>
                                    <th>Course</th>
                                    <th>Duration</th>
                                    <th>Session</th>
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