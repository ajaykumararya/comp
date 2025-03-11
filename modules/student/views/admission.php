<div class="row">
    <div class="col-md-12">
        <form id="form" action="" method="POST">

            <div class="{card_class}">
                <div class="card-header collapsible cursor-pointer rotate" data-bs-toggle="collapse"
                    data-bs-target="#kt_docs_card_collapsible">
                    <h3 class="card-title">Student Admission Form</h3>
                    <div class="card-toolbar rotate-180">
                        <i class="ki-duotone ki-down fs-1"></i>
                    </div>
                </div>
                <div id="kt_docs_card_collapsible" class="collapse show">
                    <div class="card-body">
                        <?php
                        if (CHECK_PERMISSION('REFERRAL_ADMISSION') && $this->center_model->isAdmin()) {
                            ?>
                            <div class="row">
                                <div class="col-md-6 mb-5">
                                    <label for="liststudent" class="form-label required">Referral
                                        Student By</label>
                                    <select name="referral_id" data-control="select2" data-placeholder="Select Student"
                                        class="form-select first m-h-100px" data-allow-clear="true">
                                        <option></option>

                                    </select>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                        <div class="row">
                            <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
                                <label class="form-label required">Admission Date</label>
                                <input type="text" name="admission_date" class="form-control current-date"
                                    placeholder="Select Admission Date" value="<?= $this->ki_theme->date() ?>">
                            </div>
                            <div class="form-group mb-4 col-lg-4 col-xs-12 col-sm-12">
                                <label class="form-label required required">Student Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter Student Name">
                            </div>
                            <div class="form-group mb-4 col-lg-2 col-xs-12 col-sm-12">
                                <label class="form-label required">Gender</label>
                                <select name="gender" class="form-select" data-control="select2"
                                    data-placeholder="Select Gender">
                                    <option></option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
                                <label class="form-label required">Date of birth</label>
                                <input type="date" name="dob" class="form-control" placeholder="Select date of birth">
                            </div>



                            <div class="form-group mb-4 col-lg-4 col-xs-12 col-sm-12">
                                <label class="form-label required">Center</label>
                                <?php
                                $center_id = 0;
                                if ($this->center_model->isCenter()) {
                                    $center_id = $this->center_model->loginId();
                                    $this->db->where('id', $center_id);
                                }

                                if ($this->center_model->isAdmin()) {
                                    $this->db->where([
                                        'isDeleted' => 0,
                                        'isPending' => 0
                                    ]);
                                }
                                $rolCol = 2;
                                $courseCol = 3;
                                if (CHECK_PERMISSION('NOT_TIMETABLE') && !CHECK_PERMISSION('ADMISSION_WITH_SESSION') && !CHECK_PERMISSION('ADMISSION_WITH_COURSE_CATEGORY')) {
                                    $rolCol = $courseCol = 4;
                                }
                                ?>
                                <select class="form-select" id="centre_id" name="center_id" data-control="select2"
                                    data-placeholder="Select a Center"
                                    data-allow-clear="<?= $this->center_model->isAdmin() ?>">
                                    <option></option>
                                    <?php
                                    $this->db->where('isDeleted', 0);
                                    $list = $this->db->where('type', 'center')->get('centers')->result();
                                    foreach ($list as $row) {
                                        $selected = $center_id == $row->id ? 'selected' : '';
                                        echo '<option value="' . $row->id . '" ' . (isset($row->wallet) ? 'data-wallet="' . $row->wallet . '"' : '') . ' ' . $selected . ' data-kt-rich-content-subcontent="' . $row->institute_name . '"
                                    data-kt-rich-content-icon="' . $row->image . '">' . $row->name . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group mb-4 col-lg-<?= $rolCol ?> col-xs-12 col-sm-12">
                                <label class="form-label required">{rollno_text}.</label>
                                <input type="text" name="roll_no" class="form-control"
                                    placeholder="Enter {rollno_text}.">
                            </div>
                            <?php
                            if (CHECK_PERMISSION('ADMISSION_WITH_COURSE_CATEGORY')) {
                                ?>
                                <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
                                    <label for="course_category_id" class="form-label">Course Category</label>
                                    <select class="form-select" id="course_category_id" data-control="select2"
                                        data-placeholder="Select a Course Category">
                                        <option></option>
                                    </select>
                                </div>
                                <?php
                            }
                            // echo $owner_id;
                            

                            // echo $this->db->last_query();
                            ?>
                            <div class="form-group mb-4 col-lg-<?= $courseCol ?> col-xs-12 col-sm-12">
                                <label class="form-label required">Course</label>
                                <select class="form-select" name="course_id" data-control="select2"
                                    data-placeholder="Select a Course" data-allow-clear="true">
                                    <option></option>

                                </select>
                            </div>


                            <?php
                            if (!CHECK_PERMISSION('NOT_TIMETABLE')) {
                                ?>

                                <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
                                    <label class="form-label required">Time Table</label>
                                    <select class="form-select" name="batch_id" data-control="select2"
                                        data-placeholder="Select a Course">
                                        <option></option>
                                        <?php
                                        $listBatch = $this->db->get('batch');
                                        foreach ($listBatch->result() as $row) {
                                            echo '<option value="' . $row->id . '">' . $row->batch_name . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <?php
                            } else
                                echo form_hidden('batch_id', 0);
                            $col = 6;
                            if (CHECK_PERMISSION('ADMISSION_WITH_SESSION')) {
                                ?>

                                <div class="form-group mb-4 col-lg-4 col-xs-12 col-sm-12">
                                    <label class="form-label required">Session</label>
                                    <select class="form-select" name="session_id" data-control="select2"
                                        data-placeholder="Select a Session" required>
                                        <option></option>
                                        <?php
                                        $listBatch = $this->db->where('status', 1)->get('session');
                                        foreach ($listBatch->result() as $row) {
                                            echo '<option value="' . $row->id . '">' . $row->title . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <?php
                                $col = 4;
                            }
                            ?>



                            <div class="form-group mb-4 col-lg-<?= $col ?> col-xs-12 col-sm-12">
                                <label class="form-label required">Whatsapp Number</label>
                                <div class="input-group">
                                    <input type="text" name="contact_number" class="form-control"
                                        placeholder="Whatsapp Number" autocomplete="off">
                                    <span class="input-group-text" id="basic-addon2"
                                        style="width:100px;padding:0px!important">
                                        <select name="contact_no_type" data-control="select2"
                                            data-placeholder="Whatsapp Mobile Type" class="form-control">
                                            <?php
                                            foreach ($this->ki_theme->project_config('mobile_types') as $key => $value)
                                                echo "<option value='{$key}'>{$value}</option>";
                                            ?>
                                        </select>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group mb-4 col-lg-<?= $col ?> col-xs-12 col-sm-12">
                                <label class="form-label">Alternative Mobile</label>
                                <div class="input-group">
                                    <input type="text" name="alternative_mobile" class="form-control"
                                        placeholder="Mobile" autocomplete="off">
                                    <span class="input-group-text" id="basic-addon2"
                                        style="width:100px;padding:0px!important">
                                        <select name="alt_mobile_type" data-control="select2"
                                            data-placeholder="Alternative Mobile Type" class="form-control">
                                            <?php
                                            foreach ($this->ki_theme->project_config('mobile_types') as $key => $value)
                                                echo "<option value='{$key}'>{$value}</option>";
                                            ?>
                                        </select>
                                    </span>
                                </div>
                            </div>
                            <?php
                            $upload_ducuments = $this->ki_theme->project_config('upload_ducuments');
                            $isFamilyId = isset($upload_ducuments['family_id_document']);
                            $col = $isFamilyId ? 3 : 4;
                            $familyClass = $isFamilyId ? '' : '';
                            ?>
                            <div class="form-group mb-4 col-lg-<?= $col ?> col-xs-12 col-sm-12">
                                <label class="form-label">E-Mail ID</label>
                                <input type="email" name="email_id" class="form-control" placeholder="Enter E-Mail ID">
                            </div>
                            <div class="form-group mb-4 col-lg-<?= $col ?> col-xs-12 col-sm-12">
                                <label class="form-label required">Father Name</label>
                                <input type="text" name="father_name" class="form-control"
                                    placeholder="Enter Father Name">
                            </div>
                            <!-- <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
                                <label class="form-label required">Father Mobile</label>
                                <input type="text" name="father_mobile" class="form-control"
                                    placeholder="Enter Father MObile">
                            </div> -->
                            <div class="form-group mb-4 col-lg-<?= $col ?> col-xs-12 col-sm-12">
                                <label class="form-label required">Mother Name</label>
                                <input type="text" name="mother_name" id="aadhar_number" class="form-control"
                                    placeholder="Enter Mothe Name">
                            </div>
                            <div
                                class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12 <?= ($isFamilyId ? '' : 'hide') ?>">
                                <label class="form-label">Family ID</label>
                                <input type="text" name="family_id" class="form-control" placeholder="Enter family ID">
                            </div>

                            <!-- Marital Status -->
                            <div class="form-group mb-4 col-lg-4 col-xs-12 col-sm-12">
                                <label for="marital_status" class="form-label">Marital Status:</label>
                                <select name="marital_status" data-allow-clear="true" data-control="select2"
                                    data-placeholder="Select Marital Status" id="marital_status" class="form-control">
                                    <option value="">Select</option>
                                    <option value="Married">Married</option>
                                    <option value="Unmarried">Unmarried</option>
                                </select>
                            </div>

                            <!-- Category -->
                            <div class="form-group mb-4 col-lg-4 col-xs-12 col-sm-12">
                                <label for="category" class="form-label">Category:</label>
                                <select name="category" data-allow-clear="true" data-control="select2"
                                    data-placeholder="Select Category" id="category" class="form-control">
                                    <option value="">Select Category</option>
                                    <option value="General">General</option>
                                    <option value="OBC">OBC</option>
                                    <option value="SC">SC</option>
                                    <option value="ST">ST</option>
                                </select>
                            </div>

                            <!-- Medium -->
                            <div class="form-group mb-4 col-lg-4 col-xs-12 col-sm-12">
                                <label for="medium" class="form-label">Medium:</label>
                                <select name="medium" data-control="select2" data-allow-clear="true"
                                    data-placeholder="Select Medium" id="medium" class="form-control">
                                    <option value="">Select</option>
                                    <option value="Hindi">Hindi Medium</option>
                                    <option value="English">English Medium</option>
                                </select>
                            </div>


                            <div class="form-group mb-4 col-lg-12 col-xs-12 col-sm-12">
                                <label class="form-label required">Address</label>
                                <textarea class="form-control" name="address" placeholder="Address"></textarea>
                            </div>
                            <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
                                <label class="form-label required">Upload Photo</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
                                <label class="form-label required">Pincode</label>
                                <input class="form-control" name="pincode" placeholder="Enter Pincode">
                            </div>
                            <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
                                <label class="form-label required">Select State </label>
                                <select class="form-select get_city" name="state_id" data-control="select2"
                                    data-placeholder="Select a State">
                                    <option value="">--Select--</option>
                                    <option></option>
                                    <?php
                                    $state = $this->db->order_by('STATE_NAME', 'ASC')->get('state');
                                    if ($state->num_rows()) {
                                        foreach ($state->result() as $row)
                                            echo '<option value="' . $row->STATE_ID . '">' . $row->STATE_NAME . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12 form-group-city">
                                <label class="form-label required">Select District <span id="load"></span></label>
                                <select class="form-select list-cities" name="city_id" data-control="select2"
                                    data-placeholder="Select a City">
                                    <option></option>
                                </select>
                            </div>
                            <!-- <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
                                <label class="form-label required">Username</label>
                                <input type="text" name="username" class="form-control" placeholder="Enter">
                            </div>
                            <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
                                <label class="form-label required">Password</label>
                                <input type="text" name="password" class="form-control" placeholder="Enter">
                            </div> -->
                            <?php
                            if (!CHECK_PERMISSION('STUDENT_EXAMINATION_FORM')):
                                ?>
                                <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
                                    <label class="form-label"> Passed Exam</label>
                                    <input type="text" name="passed_exam" class="form-control"
                                        placeholder="Enter Passed Exam">
                                </div>
                                <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
                                    <label class="form-label">Marks(%) / Grade</label>
                                    <input type="text" name="marks" class="form-control" placeholder="Enter Marks/Grade">
                                </div>
                                <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
                                    <label class="form-label">Board</label>
                                    <input type="text" name="board" class="form-control" placeholder="Enter Board">
                                </div>
                                <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
                                    <label class="form-label ">Passing Year</label>
                                    <input type="text" name="passing_year" class="form-control single-year"
                                        placeholder="Enter Passing Year">
                                </div>
                                <?php
                            endif;
                            ?>
                            <?php
                            if (CHECK_PERMISSION('STUDENT_EXAMINATION_FORM')):
                                ?>
                                <div class="card mb-2">
                                    <div class="card-header">
                                        <h3 class="card-title">Examination Passed</h3>
                                    </div>
                                    <div class="card-body p-1">
                                        <table class="table table-bordered">
                                            <thead class="bg-primary">
                                                <tr>
                                                    <th class="bg-primary text-white">Examination Passed</th>
                                                    <th class="bg-primary text-white">Name of Stream</th>
                                                    <th class="bg-primary text-white">Board/University</th>
                                                    <th class="bg-primary text-white">Year of Passing</th>
                                                    <th class="bg-primary text-white">Marks Obtained</th>
                                                    <th class="bg-primary text-white">% Marks</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                for ($fieldIndex = 1; $fieldIndex <= 2; $fieldIndex++) {
                                                    ?>
                                                    <tr>
                                                        <td><input type="text" name="examination[passed][]" class="form-control"
                                                                placeholder="Examination Passed"></td>
                                                        <td><input type="text" name="examination[name_of_stream][]"
                                                                class="form-control" placeholder="Name of Stream"></td>
                                                        <td><input type="text" name="examination[board_or_university][]"
                                                                class="form-control" placeholder="Board/University"></td>
                                                        <td><input type="text" name="examination[year_of_passing][]"
                                                                class="form-control" placeholder="Year of Passing"></td>
                                                        <td><input type="text" name="examination[marks_obtained][]"
                                                                class="form-control" placeholder="Marks Obtained"></td>
                                                        <td><input type="text" name="examination[percentage_marks][]"
                                                                class="form-control" placeholder="% Marks"></td>

                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <?php
                            endif;
                            ?>
                            <div class="card card-body">
                                <h4>Upload Documents</h4>
                                <div class="row">
                                    <div class="col-md-3 mb-4">
                                        <div class="form-control">
                                            <label for="adhar_front" class="form-label required">Aadhar Card
                                                <?= CHECK_PERMISSION('STUDENT_ADHAR_BACK') ? 'Front' : '' ?></label>
                                        </div>
                                    </div>
                                    <div class="col-md-9 mb-4">
                                        <div class="form-group">
                                            <input type="file" class="form-control" name="adhar_card" id="adhar_front">
                                        </div>
                                    </div>
                                    <?php
                                    if (CHECK_PERMISSION('STUDENT_ADHAR_BACK')):
                                        ?>
                                        <div class="col-md-3 mb-4">
                                            <div class="form-control">
                                                <label for="adhar_back" class="form-label required">Aadhar Card Back</label>
                                            </div>
                                        </div>
                                        <div class="col-md-9 mb-4">
                                            <div class="form-group">
                                                <input type="file" class="form-control" name="adhar_back" id="adhar_back"
                                                    required>
                                            </div>
                                        </div>
                                        <?php
                                    endif;
                                    ?>

                                </div>
                                <div class="row">
                                    <?php
                                    $uploadDocuments = $this->ki_theme->project_config('upload_ducuments');
                                    foreach ($uploadDocuments as $key => $value) {
                                        ?>
                                        <div class="col-md-3 mb-4">
                                            <div class="form-group">
                                                <label for="<?= $key ?>"
                                                    class="form-label form-control"><?= $value ?></label>
                                                <input type="hidden" name="upload_docs[title][]" class="form-control"
                                                    value="<?= $key ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-9 mb-4">
                                            <div class="form-group">
                                                <input type="file" class="form-control" id="<?= $key ?>"
                                                    name="upload_docs[file][]">
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <?php
                                /*
                            <div class="row">
                                <?php
                                $uploadDocuments = $this->ki_theme->project_config('upload_ducuments');
                                for ($i = 1; $i <= sizeof($uploadDocuments); $i++) {
                                    ?>
                                    <div class="col-md-3 mb-4">
                                        <div class="form-group">
                                            <select name="upload_docs[title][]" class="form-control"
                                                data-placeholder="Select Dcoument Title" data-control="select2">
                                                <option></option>
                                                <?php
                                                foreach ($uploadDocuments as $key => $value)
                                                    echo "<option value'$key'>$value</option>";
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-9 mb-4">
                                        <div class="form-group">
                                            <input type="file" class="form-control" name="upload_docs[file][]">
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                            */
                                ?>
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
</div>