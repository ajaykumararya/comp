<style>
    .form-label {
        color: black
    }
</style>
<?php
$col = (!CHECK_PERMISSION('NOT_TIMETABLE')) ? 4 : 6;
$col = CHECK_PERMISSION('ADMISSION_WITH_SESSION') ? 4 : $col;
?>
<section class="small_pt gray-bg" data-aos="fade-up">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="text-center animation animated fadeInUp" data-aos="fade-up" data-animation="fadeInUp"
                    data-animation-delay="0.01s" style="animation-delay: 0.01s; opacity: 1;">
                    <div class="heading_s1 text-center">
                        <h2 class="main-heading center-heading"><i class="fab fa-wpforms"></i>
                            <?= $this->ki_theme->get_form_title('student_admission_form_title', 'Student Admission Form') ?>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-4 mt-4">
                <form action="" class="student-admission-form animation animated fadeInLeft">
                    <div class="<?= themeCard('main', 'panel-theme') ?> border-dark">
                        <div class="<?= themeCard('body') ?> ">
                            <div class="row">
                                <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
                                    <label class="form-label required">Admission Date</label>
                                    <input readonly type="text" name="admission_date" class="form-control"
                                        placeholder="Select Admission Date" value="<?= $this->ki_theme->date() ?>">
                                </div>
                                <div class="form-group mb-4 col-lg-4 col-xs-12 col-sm-12">
                                    <label class="form-label required required">Student Name</label>
                                    <input type="text" name="name" class="form-control"
                                        placeholder="Enter Student Name">
                                </div>
                                <div class="form-group mb-4 col-lg-2 col-xs-12 col-sm-12">
                                    <label class="form-label required">Gender</label>
                                    <select name="gender" class="form-control" data-control="select2"
                                        data-placeholder="Select Gender">
                                        <!-- <option></option> -->
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                                <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
                                    <label class="form-label required">Date of birth</label>
                                    <input type="date" name="dob" class="form-control"
                                        placeholder="Select date of birth">
                                </div>
                                <div class="form-group mb-4 col-lg-<?= $col ?> col-xs-12 col-sm-12">
                                    <label class="form-label required">Center</label>
                                    <?php
                                    $center_id = 0;
                                    if ($this->center_model->isCenter()) {
                                        $center_id = $this->center_model->loginId();
                                        $this->db->where('id', $center_id);
                                    }
                                    $this->db->where('show_in_front', 1);
                                    ?>
                                    <select class="form-control admission-center" name="center_id"
                                        data-control="select2" data-placeholder="Select a Center"
                                        data-allow-clear="<?= $this->center_model->isAdmin() ?>">
                                        <option></option>
                                        <?php
                                        $list = $this->db->where('type', 'center')->order_by('institute_name', 'ASC')->get('centers')->result();
                                        foreach ($list as $row) {
                                            $selected = $center_id == $row->id ? 'selected' : '';
                                            echo '<option value="' . $row->id . '" ' . $selected . ' data-kt-rich-content-subcontent="' . $row->institute_name . '"
                                    data-kt-rich-content-icon="' . $row->image . '">' . $row->institute_name . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>

                                <input type="hidden" name="roll_no" class="form-control" placeholder="Enter Roll NO."
                                    readonly>

                                <div class="form-group mb-4 col-lg-<?= $col ?> col-xs-12 col-sm-12">
                                    <label class="form-label required">Course</label>
                                    <select class="form-control" name="course_id" data-control="select2"
                                        data-placeholder="Select a Course">
                                        <option></option>
                                        <?php
                                        // $listCourse = $this->db->get('course');
                                        // foreach ($listCourse->result() as $row) {
                                        //     echo '<option value="' . $row->id . '">' . $row->course_name . '</option>';
                                        // }
                                        ?>
                                    </select>
                                </div>
                                <?php
                                if ($col == 4 && !CHECK_PERMISSION('NOT_TIMETABLE')) {
                                    ?>
                                    <div class="form-group mb-4 col-lg-4 col-xs-12 col-sm-12">
                                        <label class="form-label required">Time Table</label>
                                        <select class="form-control" name="batch_id" data-control="select2"
                                            data-placeholder="Select a TimeTable">
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
                                }
                                ?>
                                <div class="form-group mb-4 col-lg-6 col-xs-12 col-sm-12">
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
                                <div class="form-group mb-4 col-lg-6 col-xs-12 col-sm-12">
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
                                    <input type="email" name="email" class="form-control" placeholder="Enter E-Mail ID">
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
                                <?php
                                if ($isFamilyId):
                                    ?>
                                    <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12 ">
                                        <label class="form-label">Family ID</label>
                                        <input type="email" name="family_id" class="form-control"
                                            placeholder="Enter family ID">
                                    </div>
                                    <?php
                                else:
                                    echo form_hidden('family_id', '');
                                endif;
                                // echo PATH;
                                if (!in_array(PATH, ['abc'])) {
                                    ?>
                                    <!-- Marital Status -->
                                    <div class="form-group mb-4 col-lg-4 col-xs-12 col-sm-12">
                                        <label for="marital_status" class="form-label">Marital Status:</label>
                                        <select name="marital_status" data-control="select2" data-allow-clear="true"
                                            data-placeholder="Select Marital Status" id="marital_status"
                                            class="form-control">
                                            <option value="">Select</option>
                                            <option value="Married">Married</option>
                                            <option value="Unmarried">Unmarried</option>
                                        </select>
                                    </div>

                                    <!-- Category -->
                                    <div class="form-group mb-4 col-lg-4 col-xs-12 col-sm-12">
                                        <label for="category" class="form-label">Category:</label>
                                        <select name="category" data-control="select2" data-allow-clear="true"
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
                                    <?php
                                }
                                ?>
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
                                    <select class="form-control get_city" name="state_id" data-control="select2"
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
                                    <select class="form-control list-cities" name="city_id" data-control="select2"
                                        data-placeholder="Select a District">
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
                                        <input type="text" name="marks" class="form-control"
                                            placeholder="Enter Marks/Grade">
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
                            </div>

                        </div>

                        <?php
                        if (CHECK_PERMISSION('STUDENT_EXAMINATION_FORM')):
                            ?>
                            <div class="<?= themeCard('header') ?> bg-dark rebel">
                                <h3 class="card-title text-white">Examination Passed</h3>
                                <div class="rebel-inner"></div>
                            </div>
                            <div class="<?= themeCard('body') ?> ">
                                <table class="table">
                                    <thead>
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
                                                <td><input type="text" name="examination[name_of_stream][]" class="form-control"
                                                        placeholder="Name of Stream"></td>
                                                <td><input type="text" name="examination[board_or_university][]"
                                                        class="form-control" placeholder="Board/University"></td>
                                                <td><input type="text" name="examination[year_of_passing][]"
                                                        class="form-control" placeholder="Year of Passing"></td>
                                                <td><input type="text" name="examination[marks_obtained][]" class="form-control"
                                                        placeholder="Marks Obtained"></td>
                                                <td><input type="text" name="examination[percentage_marks][]"
                                                        class="form-control" placeholder="% Marks"></td>

                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <?php
                        endif;
                        ?>
                        <div class="<?= themeCard('header') ?>  bg-dark rebel">
                            <h3 class="card-title text-white"><i class="fa fa-file"></i> Upload Documents</h3>
                            <div class="rebel-inner"></div>
                        </div>

                        <div class="<?= themeCard('body') ?> ">
                            <div class="row">
                                <div class="col-md-3 mb-4">
                                    <div class="form-control">
                                        <label for="adhar_card" class="form-label required">Aadhar Card
                                            <?= CHECK_PERMISSION('STUDENT_ADHAR_BACK') ? 'Front' : '' ?>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-5 mb-4">
                                    <div class="form-group">
                                        <input type="file" class="form-control" name="adhar_card" id="adhar_card">
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <div class="form-group">
                                        <input type="number" name="adhar_card_no" <?= THEME == 'nbeat' ? '' : 'required' ?>
                                            placeholder="Enter Aadhar No." class="form-control">
                                    </div>
                                </div>
                                <?php
                                if (CHECK_PERMISSION('STUDENT_ADHAR_BACK')):
                                    ?>
                                    <div class="col-md-3 mb-4">
                                        <div class="form-control">
                                            <label for="adhar_back" class="form-label required">Aadhar Card
                                                Back</label>
                                        </div>
                                    </div>
                                    <div class="col-md-9 mb-4">
                                        <div class="form-group">
                                            <input type="file" class="form-control" required name="adhar_back"
                                                id="adhar_back">
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
                                    $required = '';
                                    if (PATH == 'rivesk') {
                                        $required = in_array($key, ['tenth_plus_marksheet', 'tenth_marksheet']) ? 'required' : '';
                                    }
                                    ?>
                                    <div class="col-md-3 mb-4">
                                        <div class="form-group">
                                            <label for=""
                                                class="form-label form-control <?= $required ?>"><?= $value ?></label>
                                            <input type="hidden" name="upload_docs[title][]" class="form-control"
                                                value="<?= $key ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-9 mb-4">
                                        <div class="form-group">
                                            <input type="file" class="form-control" <?= $required ?>
                                                name="upload_docs[file][]">
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>

                        </div>
                        <div class="<?= themeCard('footer') ?> ">
                            <div class="btn-wrapper btn-wrapper2">
                                <?= $this->ki_theme->set_class('btn btn-outline-success')->button('<span><i class="fa fa-plus"></i> Admission Now</span>', 'submit') ?>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>