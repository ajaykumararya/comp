<style>
    #basic-addon2 {
        width: 210px !important;
    }
</style>
<?php
$id = $this->uri->segment(3, 0);
if ($id) {
    $id = base64_decode($id);
    // echo $id;
    $get = $this->db->get_where('students_registeration_data', [
        'id' => $id
    ]);
    if ($get->num_rows()) {
        $row = ($get->row());
        ?>
        <form method="POST" class="animation animated fadeInLeft">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><i class="fa fa-edit text-dark me-2 fs-2"></i> Edit Record</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <?php
                        if (PATH == 'sct_ebook') {
                            //cert_no
                            ?>
                            <div class="col-md-12 form-group mb-4">
                                <label for="" class="form-label required">Certioficate No</label>
                                <input type="text" value="<?= $row->cert_no ?>" name="cert_no" required
                                    placeholder="Enter Certificate No." class="form-control">
                            </div>
                            <?php
                        }
                        ?>
                        <div class="col-md-6 form-group mb-4">
                            <label for="" class="form-label required">Registration No</label>
                            <input type="text" value="<?= $row->registration_no ?>" name="registration_no" required
                                placeholder="Enter Registration No." class="form-control">
                        </div>
                        <div class="col-md-6 form-group mb-4">
                            <label for="" class="form-label required">Date</label>
                            <input type="date" value="<?= $row->date ?>" name="date" required placeholder="Enter Date"
                                class="form-control">
                        </div>
                        <div class="col-md-6 form-group mb-4">
                            <label for="" class="form-label required">Email</label>
                            <input type="email" value="<?= $row->email ?>" name="email" required placeholder="Enter Email"
                                class="form-control">
                        </div>
                        <div class="col-md-6 form-group mb-4">
                            <label for="" class="form-label required">Mobile</label>
                            <input type="number" value="<?= $row->mobile ?>" name="mobile" required placeholder="Enter Mobile"
                                class="form-control">
                        </div>
                        <div class="form-group mb-4 col-md-3">
                            <label for="" class="form-label required">Name</label>
                            <input type="text" value="<?= $row->name ?>" name="name" required placeholder="Enter Name"
                                class="form-control">
                        </div>
                        <div class="form-group mb-4 col-md-3">
                            <label for="" class="form-label required">Date of birth</label>
                            <input name="dob" value="<?= date('d-m-Y', strtotime($row->dob)) ?>" required
                                placeholder="Date of Birth" class="form-control">
                        </div>
                        <div class="form-group mb-4 col-md-3">
                            <label for="" class="form-label required">Father's Name</label>
                            <input type="text" value="<?= $row->father_name ?>" class="form-control"
                                placeholder="Enter Father's Name" name="father_name" required>
                        </div>
                        <?php
                        if (PATH == 'upstate'):
                            ?>
                            <div class="form-group mb-4 col-md-3">
                                <label for="" class="form-label required">Mother's Name</label>
                                <input type="text" value="<?= $row->mother_name ?>" class="form-control"
                                    placeholder="Enter Mother's Name" name="mother_name" required>
                            </div>
                            <div class="col-md-6 form-group mb-4">
                                <label for="" class="form-label required">Exam Roll No.</label>
                                <input type="text" name="exam_roll_no" value="<?= $row->exam_roll_no ?>"
                                    placeholder="Enter Exam Roll No." class="form-control" required>
                            </div>
                            <div class="col-md-6 form-group mb-4">
                                <label for="" class="form-label required">Enrollment No.</label>
                                <input type="text" name="enrollment_no" value="<?= $row->enrollment_no ?>"
                                    placeholder="Enter Enrollment No." class="form-control" required>
                            </div>
                            <?php
                        else:
                            ?>
                            <div class="form-group mb-4 col-md-3">
                                <label for="" class="form-label required">Expiry Date</label>
                                <input type="date" value="<?= $row->expiry_date ?>" class="form-control" name="expiry_date"
                                    required>
                            </div>
                            <?php
                        endif;
                        ?>
                        <div class="col-md-6 form-group mb-4">
                            <label for="" class="form-label required">Exam / Course</label>
                            <div class="input-group">
                                <input type="text" name="exam_or_course" value="<?= $row->exam_or_course ?>"
                                    placeholder="Enter Exam / Course" class="form-control" required>
                                <?php
                                if (PATH == 'upstate'):
                                    ?>
                                    <span class="input-group-text" id="basic-addon2" style="width:350px;padding:0px!important">
                                        <input type="text" name="training_period" value="<?= $row->training_period ?>"
                                            placeholder="Training Peroid, Ex- 2 Year" class="form-control">
                                    </span>
                                    <?php
                                endif;
                                ?>
                            </div>
                        </div>
                        <div class="col-md-6 form-group mb-4">
                            <label for="" class="form-label required">College / Institute Name</label>
                            <input type="text" name="institute_name" value="<?= $row->institute_name ?>"
                                placeholder="Enter College / Institute Name" required class="form-control">
                        </div>
                        <div class="col-md-6 form-group mb-4">
                            <label for="" class="form-label required">Exam Centre Name</label>
                            <input name="exam_centre" value="<?= $row->exam_centre_name ?>" class="form-control" required
                                placeholder="Exam Centre Name">
                        </div>
                        <div class="col-md-3 form-group mb-4">
                            <label for="" class="form-label required">Year of Passing</label>
                            <input required type="text" name="year_of_passing" value="<?= $row->year ?>"
                                placeholder="Enter Year of Passing" class="form-control">
                        </div>
                        <div class="col-md-3 form-group mb-4">
                            <label for="" class="form-label required">Pass / Fail</label>
                            <input required type="text" name="pass_or_fail" value="<?= $row->pass_or_fail ?>"
                                placeholder="Enter Pass / Fail" class="form-control">
                        </div>
                        <div class="col-md-12 form-group mb-4">
                            <label for="" class="form-label required">Address</label>
                            <textarea name="address" placeholder="Enter  Address" id=""
                                class="form-control"><?= $row->address ?></textarea>
                        </div>

                        <div class="col-md-12 form-group">
                            <label for=""
                                class="form-label required"><?= (PATH == 'upstate') ? 'Examination Body' : 'Medical Field' ?></label>
                            <textarea name="examination_body"
                                placeholder="Enter  <?= (PATH == 'upstate') ? 'Examination Body' : 'Medical Field' ?>" id=""
                                class="form-control"><?= $row->examination_body ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="btn-wrapper btn-wrapper2">
                        <?= $this->ki_theme->set_class('btn btn-outline-success')->save_button('<span><i class="fa fa-save"></i> Update</span>', false) ?>
                    </div>
                </div>
            </div>
        </form>
        <?php
    } else
        echo alert('Record Not Found..', 'danger');
} else
    echo alert('Record Not Found..', 'danger');
