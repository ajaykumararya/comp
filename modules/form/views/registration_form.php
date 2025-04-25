<section class="small_pt gray-bg" data-aos="fade-left">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="text-center animation animated fadeInUp" data-aos="fade-up" data-animation="fadeInUp"
                    data-animation-delay="0.01s" style="animation-delay: 0.01s; opacity: 1;">
                    <div class="heading_s1 text-center">
                        <h2 class="main-heading center-heading"><i class="fa fa-list-alt"></i> Registration Form</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-4 mt-4">
                <?php
                if (file_exists(DOCUMENT_PATH . '/form/registration_form.php'))
                    require DOCUMENT_PATH . '/form/registration_form.php';
                else {
                    ?>
                    ?>
                    <form action="website/student-registration-certificate"
                        class="student-registration-certificate-form animation animated fadeInLeft">
                        <div class="<?= themeCard('main', 'panel-primary') ?>">
                            <div class="<?= themeCard('body') ?>">
                                <div class="row">
                                    <div class="form-group mb-4 col-md-3">
                                        <label for="" class="form-label required">Name</label>
                                        <input type="text" name="name" required placeholder="Enter Name"
                                            class="form-control">
                                    </div>
                                    <div class="form-group mb-4 col-md-3">
                                        <label for="" class="form-label required">Date of birth</label>
                                        <input type="date" name="dob" required placeholder="Date of Birth"
                                            class="form-control">
                                    </div>
                                    <div class="form-group mb-4 col-md-3">
                                        <label for="" class="form-label required">Father's Name</label>
                                        <input type="text" class="form-control" placeholder="Enter Father's Name"
                                            name="father_name" required>
                                    </div>
                                    <div class="form-group mb-4 col-md-3">
                                        <label for="" class="form-label required">Mother's Name</label>
                                        <input type="text" class="form-control" placeholder="Enter Mother's Name"
                                            name="mother_name" required>
                                    </div>
                                    <div class="col-md-6 form-group mb-4">
                                        <label for="" class="form-label required">Email</label>
                                        <input type="text" name="email" placeholder="Enter Email." class="form-control"
                                            required>
                                    </div>
                                    <div class="col-md-6 form-group mb-4">
                                        <label for="" class="form-label required">Mobile No.</label>
                                        <input type="text" name="mobile" placeholder="Enter Mobile" class="form-control"
                                            required>
                                    </div>
                                    <div class="col-md-6 form-group mb-4">
                                        <label for="" class="form-label required">Exam Roll No.</label>
                                        <input type="text" name="exam_roll_no" placeholder="Enter Exam Roll No."
                                            class="form-control" required>
                                    </div>
                                    <div class="col-md-6 form-group mb-4">
                                        <label for="" class="form-label required">Enrollment No.</label>
                                        <input type="text" name="enrollment_no" placeholder="Enter Enrollment No."
                                            class="form-control" required>
                                    </div>

                                    <div class="col-md-6 form-group mb-4">
                                        <label for="" class="form-label required">Exam / Course</label>
                                        <div class="input-group">
                                            <input type="text" name="exam_or_course" placeholder="Enter Exam / Course"
                                                class="form-control" required>
                                            <span class="input-group-text" id="basic-addon2"
                                                style="width:350px;padding:0px!important">
                                                <input type="text" name="training_period"
                                                    placeholder="Training Peroid, Ex- 2 Year" class="form-control">
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 form-group mb-4">
                                        <label for="" class="form-label required">College / Institute Name</label>
                                        <input type="text" name="institute_name"
                                            placeholder="Enter College / Institute Name" required class="form-control">
                                    </div>
                                    <div class="col-md-6 form-group mb-4">
                                        <label for="" class="form-label required">Exam Centre Name</label>
                                        <input name="exam_centre" class="form-control" required
                                            placeholder="Exam Centre Name">
                                    </div>
                                    <div class="col-md-3 form-group mb-4">
                                        <label for="" class="form-label required">Year of Passing</label>
                                        <input required type="text" name="year_of_passing"
                                            placeholder="Enter Year of Passing" class="form-control">
                                    </div>
                                    <div class="col-md-3 form-group mb-4">
                                        <label for="" class="form-label required">Pass / Fail</label>
                                        <input required type="text" name="pass_or_fail" placeholder="Enter Pass / Fail"
                                            class="form-control">
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label for="" class="form-label required">Address</label>
                                        <textarea name="address" placeholder="Enter  Address" id=""
                                            class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="<?= themeCard('header') ?> bg-dark">
                                <h3 class="card-title text-white">Upload Document(S)</h3>
                            </div>
                            <div class="<?= themeCard('body') ?>">
                                <table class="table table-bordered">
                                    <tr>
                                        <th><label class="form-label required" for="file_10th">10<sup>th</sup>
                                                Marksheet</label></th>
                                        <td>
                                            <input type="file" name="file_10th" id="file_10th" class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><label class="form-label required" for="file_12th">12<sup>th</sup>
                                                Marksheet</label></th>
                                        <td>
                                            <input type="file" name="file_12th" id="file_12th" class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><label class="form-label required" for="file_1st_year">1<sup>st</sup> Year
                                                Marksheet</label></th>
                                        <td>
                                            <input type="file" name="file_1st_year" id="file_1st_year" class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><label class="form-label required" for="file_2nd_year">2<sup>nd</sup> Year
                                                Marksheet</label></th>
                                        <td>
                                            <input type="file" name="file_2nd_year" id="file_2nd_year" class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><label class="form-label required" for="file_diploma">Diploma /
                                                Certificate</label></th>
                                        <td>
                                            <input type="file" name="file_diploma" id="file_diploma" class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><label class="form-label required" for="file_no_due_slip">College No Due
                                                Slip</label></th>
                                        <td>
                                            <input type="file" name="file_no_due_slip" id="file_no_due_slip"
                                                class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><label class="form-label required" for="file_aadhar">Aadhar Card</label></th>
                                        <td>
                                            <input type="file" name="file_aadhar" id="file_aadhar" class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><label class="form-label required" for="file_photo">Photo</label></th>
                                        <td>
                                            <input type="file" name="file_photo" id="file_photo" class="form-control">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="<?= themeCard('footer') ?>">
                                <div class="btn-wrapper btn-wrapper2">
                                    <?= $this->ki_theme->set_class('btn btn-outline-success')->save_button('<span><i class="fa fa-save"></i> Submit</span>', false) ?>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</section>