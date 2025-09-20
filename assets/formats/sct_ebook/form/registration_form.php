<form action="website/student-registration-certificate"
    class="student-registration-certificate-form animation animated fadeInLeft">
    <div class="<?= themeCard('main', 'panel-theme') ?> card">
        <div class="<?= themeCard('body') ?> card-body">
            <div class="row">
                <div class="form-group mb-4 col-md-4">
                    <label for="" class="form-label required">Name</label>
                    <input type="text" name="name" required placeholder="Enter Name" class="form-control">
                </div>
                <div class="form-group mb-4 col-md-4">
                    <label for="" class="form-label required">Date of birth</label>
                    <input type="date" name="dob" required placeholder="Date of Birth" class="form-control">
                </div>
                <div class="form-group mb-4 col-md-4">
                    <label for="" class="form-label required">Father's Name</label>
                    <input type="text" class="form-control" placeholder="Enter Father's Name" name="father_name"
                        required>
                </div>
                <div class="col-md-6 form-group mb-4">
                    <label for="" class="form-label required">Email</label>
                    <input type="text" name="email" placeholder="Enter Email." class="form-control" required>
                </div>
                <div class="col-md-6 form-group mb-4">
                    <label for="" class="form-label required">Mobile No.</label>
                    <input type="text" name="mobile" placeholder="Enter Mobile" class="form-control" required>
                </div>

                <div class="col-md-6 form-group mb-4">
                    <label for="" class="form-label required">Exam / Course</label>

                    <input type="text" name="exam_or_course" placeholder="Enter Exam / Course" class="form-control"
                        required>
                </div>
                <div class="col-md-6 form-group mb-4">
                    <label for="" class="form-label required">College / Institute Name</label>
                    <input type="text" name="institute_name" placeholder="Enter College / Institute Name" required
                        class="form-control">
                </div>
                <div class="col-md-6 form-group mb-4">
                    <label for="" class="form-label required">Exam Centre Name</label>
                    <input name="exam_centre" class="form-control" required placeholder="Exam Centre Name">
                </div>
                <div class="col-md-3 form-group mb-4">
                    <label for="" class="form-label required">Year of Passing</label>
                    <input required type="text" name="year_of_passing" placeholder="Enter Year of Passing"
                        class="form-control">
                </div>
                <div class="col-md-3 form-group mb-4">
                    <label for="" class="form-label required">Pass / Fail</label>
                    <input required type="text" name="pass_or_fail" placeholder="Enter Pass / Fail"
                        class="form-control">
                </div>
                <div class="col-md-12 form-group">
                    <label for="" class="form-label required">Address</label>
                    <textarea name="address" placeholder="Enter  Address" id="" class="form-control"></textarea>
                </div>
            </div>
        </div>
        <div class="<?= themeCard('header') ?> bg-dark card-header" style="border-radius:0">
            <h3 class="card-title text-white">Upload Document(S)</h3>
        </div>
        <div class="<?= themeCard('body') ?> card-body">
            <table class="table table-bordered">
                <tr>
                    <th><label class="form-label required" for="file_photo">Photo</label></th>
                    <td>
                        <input type="file" name="file_photo" id="file_photo" class="form-control">
                    </td>
                </tr>
                <tr>
                    <th><label class="form-label required" for="sign">Signauture</label></th>
                    <td>
                        <input type="file" name="file_sign" id="sign" class="form-control">
                    </td>
                </tr>
                <tr>
                    <th><label class="form-label required" for="file_aadhar">Aadhar Card</label></th>
                    <td>
                        <input type="file" name="file_aadhar" id="file_aadhar" class="form-control">
                    </td>
                </tr>
                <tr>
                    <th><label class="form-label required" for="file_diploma">Diploma /
                            Certificate</label></th>
                    <td>
                        <input type="file" name="file_diploma" id="file_diploma" class="form-control">
                    </td>
                </tr>


            </table>
        </div>
        <div class="<?= themeCard('footer') ?> card-footer">
            <div class="btn-wrapper btn-wrapper2">
                <?= $this->ki_theme->set_class('btn btn-outline-success')->save_button('<span><i class="fa fa-save"></i> Submit</span>', false) ?>
            </div>
        </div>
    </div>
</form>