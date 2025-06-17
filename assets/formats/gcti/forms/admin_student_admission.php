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

                            <div class="form-group mb-4 col-lg-4 col-xs-12 col-sm-12">
                                <label class="form-label required">{rollno_text}.</label>
                                <input type="text" name="roll_no" class="form-control"
                                    placeholder="Enter {rollno_text}.">
                            </div>
                            <div class="form-group mb-4 col-lg-4 col-xs-12 col-sm-12">
                                <label class="form-label required">Course</label>
                                <select class="form-select" name="course_id" data-control="select2"
                                    data-placeholder="Select a Course" data-allow-clear="true">
                                    <option></option>

                                </select>
                            </div>


                            <?php
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



                            <div class="form-group mb-4 col-lg-4 col-xs-12 col-sm-12">
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
                            <div class="form-group mb-4 col-lg-4 col-xs-12 col-sm-12">
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
                            <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
                                <label class="form-label">E-Mail ID</label>
                                <input type="email" name="email_id" class="form-control" placeholder="Enter E-Mail ID">
                            </div>
                            <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
                                <label class="form-label required">Father Name</label>
                                <input type="text" name="father_name" class="form-control"
                                    placeholder="Enter Father Name">
                            </div>
                            <!-- <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
                                <label class="form-label required">Father Mobile</label>
                                <input type="text" name="father_mobile" class="form-control"
                                    placeholder="Enter Father MObile">
                            </div> -->
                            <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
                                <label class="form-label required">Mother Name</label>
                                <input type="text" name="mother_name" id="aadhar_number" class="form-control"
                                    placeholder="Enter Mothe Name">
                            </div>

                            <!-- Medium -->
                            <!-- <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
                                <label for="medium" class="form-label">Medium:</label>
                                <select name="medium" data-control="select2" data-allow-clear="true"
                                    data-placeholder="Select Medium" id="medium" class="form-control">
                                    <option value="">Select</option>
                                    <option value="Hindi">Hindi Medium</option>
                                    <option value="English">English Medium</option>
                                </select>
                            </div> -->


                            <!-- <div class="form-group mb-4 col-lg-12 col-xs-12 col-sm-12">
                                <label class="form-label required">Address</label>
                                <textarea class="form-control" name="address" placeholder="Address"></textarea>
                            </div> -->
                            <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
                                <label class="form-label required">Upload Photo</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
                                <label for="adhar_card" class="form-label">Aadhar Card

                                </label>
                                <input type="file" class="form-control" name="adhar_card" id="adhar_card"
                                    style="margin-bottom:15px">
                            </div>
                            <?php
                            $uploadDocuments = $this->ki_theme->project_config('upload_ducuments');
                            foreach ($uploadDocuments as $key => $value) {
                                ?>
                                <div class="col-md-3 mb-4">
                                    <div class="form-group">
                                        <label for="<?= $key ?>" class="form-label"><?= $value ?></label>
                                        <input type="hidden" name="upload_docs[title][]" class="form-control"
                                            value="<?= $key ?>">

                                        <input type="file" class="form-control" id="<?= $key ?>" name="upload_docs[file][]">
                                    </div>
                                </div>
                                <?php
                            }
                            echo form_hidden([
                                'pincode' => 'Pincode',
                                'state_id' => 0,
                                'city_id' => 0,
                                'address' => ' Address'
                            ]);
                            /*
                            ?>
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
                            <?ph
                            */
                            ?>
                            <!-- <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
                                <label class="form-label required">Username</label>
                                <input type="text" name="username" class="form-control" placeholder="Enter">
                            </div>
                            <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
                                <label class="form-label required">Password</label>
                                <input type="text" name="password" class="form-control" placeholder="Enter">
                            </div> -->


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