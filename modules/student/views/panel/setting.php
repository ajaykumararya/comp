<div class="row">
    <form action="" class="save-student-data" id="save-student-data">
        <input type="hidden" name="student_id" value="{student_id}">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Account Setting</h3>
                    <div class="card-toolbar">
                        {publish_button}
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group mb-4 col-lg-4 col-xs-12 col-sm-12">
                            <label class="form-label required required">Student Name</label>
                            <input type="text" name="name" value="{student_name}" class="form-control"
                                placeholder="Enter Student Name">
                        </div>
                        <div class="form-group mb-4 col-lg-2 col-xs-12 col-sm-12">
                            <label class="form-label required">Gender</label>
                            <select name="gender" class="form-select" data-control="select2"
                                data-placeholder="Select Gender">
                                <option></option>
                                <option value="male" <?= $gender == 'male' ? 'selected' : '' ?>>Male</option>
                                <option value="female" <?= $gender == 'female' ? 'selected' : '' ?>>Female</option>
                                <option value="other" <?= $gender == 'other' ? 'selected' : '' ?>>Other</option>
                            </select>
                        </div>
                        <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
                            <label class="form-label required">Date of birth</label>
                            <input type="date" name="dob" data-value="{dob}" class="form-control"
                                placeholder="Select date of birth">
                        </div>

                        <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
                            <label class="form-label required">Profile Status</label>
                            <select name="status" id="" class="form-control" data-control="select2">
                                <option value="1" <?= ($student_profile_status == 1) ? 'selected' : '' ?>>Verified</option>
                                <option value="0" <?= ($student_profile_status == 0) ? 'selected' : '' ?>>Un-Verified
                                </option>
                            </select>
                            <!-- <input type="date" name="dob" data-value="05-02-2004" class="form-control" placeholder="Select date of birth"> -->
                        </div>

                        <div class="form-group mb-4 col-lg-6 col-xs-12 col-sm-12">
                            <label class="form-label required">Whatsapp Number</label>
                            <div class="input-group">
                                <input type="text" name="contact_number" class="form-control"
                                    placeholder="Whatsapp Number" autocomplete="off" value="{contact_number}">
                                <span class="input-group-text" id="basic-addon2"
                                    style="width:100px;padding:0px!important">
                                    <select name="contact_no_type" data-control="select2"
                                        data-placeholder="Whatsapp Mobile Type" class="form-control">
                                        <?php
                                        foreach ($this->ki_theme->project_config('mobile_types') as $key => $value) {
                                            $selected = $key == $contact_no_type ? 'selected' : '';
                                            echo "<option value='{$key}' {$selected}>{$value}</option>";
                                        }
                                        ?>
                                    </select>
                                </span>
                            </div>
                        </div>
                        <div class="form-group mb-4 col-lg-6 col-xs-12 col-sm-12">
                            <label class="form-label">Alternative Mobile</label>
                            <div class="input-group">
                                <input type="text" name="alternative_mobile" class="form-control" placeholder="Mobile"
                                    autocomplete="off" value="{alternative_mobile}">
                                <span class="input-group-text" id="basic-addon2"
                                    style="width:100px;padding:0px!important">
                                    <select name="alt_mobile_type" data-control="select2"
                                        data-placeholder="Alternative Mobile Type" class="form-control">
                                        <?php
                                        foreach ($this->ki_theme->project_config('mobile_types') as $key => $value) {
                                            $selected = $key == $alt_mobile_type ? 'selected' : '';
                                            echo "<option value='{$key}' {$selected}>{$value}</option>";
                                        }
                                        ?>
                                    </select>
                                </span>
                            </div>
                        </div>
                        <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
                            <label class="form-label">E-Mail ID</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter E-Mail ID"
                                value="{email}">
                        </div>
                        <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
                            <label class="form-label required">Father Name</label>
                            <input type="text" name="father_name" class="form-control" placeholder="Enter Father Name"
                                value="{father_name}">
                        </div>
                        <!-- <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
                                <label class="form-label required">Father Mobile</label>
                                <input type="text" name="father_mobile" class="form-control"
                                    placeholder="Enter Father MObile">
                            </div> -->
                        <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
                            <label class="form-label required">Mother Name</label>
                            <input type="text" name="mother_name" id="aadhar_number" class="form-control"
                                placeholder="Enter Mothe Name" value="{mother_name}">
                        </div>
                        <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
                            <label class="form-label">Family ID</label>
                            <input type="text" name="family_id" class="form-control" placeholder="Enter family ID"
                                value="{family_id}">
                        </div>
                        <div class="form-group mb-4 col-lg-12 col-xs-12 col-sm-12">
                            <label class="form-label required">Address</label>
                            <textarea class="form-control" name="address" placeholder="Address">{address}</textarea>
                        </div>
                        <div class="form-group mb-4 col-lg-4 col-xs-12 col-sm-12">
                            <label for="" class="form-label require">Pincode</label>
                            <input type="number" name="pincode" min="6" class="form-control" placeholder="Pincode"
                                value="{pincode}">
                        </div>
                        <div class="form-group mb-4 col-lg-4 col-xs-12 col-sm-12">
                            <label for="" class="form-label required">State</label>
                            <select class="form-select get_city" name="state_id" data-control="select2"
                                data-placeholder="Select a State">
                                <option value="">--Select--</option>
                                <option></option>
                                <?php
                                $state = $this->db->order_by('STATE_NAME', 'ASC')->get('state');
                                if ($state->num_rows()) {
                                    foreach ($state->result() as $row)
                                        echo '<option value="' . $row->STATE_ID . '" ' . ($row->STATE_ID == $STATE_ID ? 'selected' : '') . '>' . $row->STATE_NAME . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group mb-4 col-lg-4 col-xs-12 col-sm-12 form-group-city">
                            <label for="" class="form-label required">City</label>
                            <select class="form-select list-cities" name="city_id" data-control="select2"
                                data-placeholder="Select a City">
                                <option></option>
                                <?php
                                //DISTRICT_ID
                                $CITY = $this->db->where('STATE_ID', $STATE_ID)->order_by('DISTRICT_NAME', 'ASC')->get('district');
                                if ($CITY->num_rows()) {
                                    foreach ($CITY->result() as $row)
                                        echo '<option value="' . $row->DISTRICT_ID . '" ' . ($row->DISTRICT_ID == $DISTRICT_ID ? 'selected' : '') . '>' . $row->DISTRICT_NAME . '</option>';
                                }
                                $get = $this->db->select('marital_status,category,medium')->where('id', $student_id)->get('students');
                                $marital_status = $category = $medium = '';
                                if ($get->num_rows()) {
                                    $row = $get->row();
                                    $marital_status = $row->marital_status;
                                    $category = $row->category;
                                    $medium = $row->medium;
                                }
                                ?>
                            </select>
                        </div>



                        <!-- Marital Status -->
                        <div class="form-group mb-4 col-lg-4 col-xs-12 col-sm-12">
                            <label for="marital_status" class="form-label">Marital Status:</label>
                            <select name="marital_status" data-allow-clear="true" data-control="select2"
                                data-placeholder="Select Marital Status" id="marital_status" class="form-control">
                                <option value="">Select</option>
                                <option value="Married" <?= $marital_status == 'Married' ? 'selected' : '' ?>>Married
                                </option>
                                <option value="Unmarried" <?= $marital_status == 'Unmarried' ? 'selected' : '' ?>>Unmarried
                                </option>
                            </select>
                        </div>

                        <!-- Category -->
                        <div class="form-group mb-4 col-lg-4 col-xs-12 col-sm-12">
                            <label for="category" class="form-label">Category:</label>
                            <select name="category" data-allow-clear="true" data-control="select2"
                                data-placeholder="Select Category" id="category" class="form-control">
                                <option value="">Select Category</option>
                                <option <?= ($category == 'General' ? 'selected' : '') ?> value="General">General</option>
                                <option <?= ($category == 'OBC' ? 'selected' : '') ?> value="OBC">OBC</option>
                                <option <?= ($category == 'SC' ? 'selected' : '') ?> value="SC">SC</option>
                                <option <?= ($category == 'ST' ? 'selected' : '') ?> value="ST">ST</option>
                            </select>
                        </div>

                        <!-- Medium -->
                        <div class="form-group mb-4 col-lg-4 col-xs-12 col-sm-12">
                            <label for="medium" class="form-label">Medium:</label>
                            <select name="medium" data-control="select2" data-allow-clear="true"
                                data-placeholder="Select Medium" id="medium" class="form-control">
                                <option value="">Select</option>
                                <option <?= $medium == 'Hindi' ? 'selected' : '' ?> value="Hindi">Hindi Medium</option>
                                <option <?= $medium == 'English' ? 'selected' : '' ?> value="English">English Medium
                                </option>
                            </select>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>
</div>