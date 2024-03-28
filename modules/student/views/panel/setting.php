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
                            <input type="text" name="name" value="{student_name}" class="form-control" placeholder="Enter Student Name">
                        </div>
                        <div class="form-group mb-4 col-lg-2 col-xs-12 col-sm-12">
                            <label class="form-label required">Gender</label>
                            <select name="gender" class="form-select" data-control="select2"
                                data-placeholder="Select Gender">
                                <option></option>
                                <option value="male" <?=$gender == 'male' ? 'selected' : ''?>>Male</option>
                                <option value="female" <?=$gender == 'female' ? 'selected' : ''?>>Female</option>
                                <option value="other" <?=$gender == 'other' ? 'selected' : ''?>>Other</option>
                            </select>
                        </div>
                        <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
                            <label class="form-label required">Date of birth</label>
                            <input type="date" name="dob" data-value="{dob}" class="form-control" placeholder="Select date of birth">
                        </div>
                        
                        <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
                            <label class="form-label required">Profile Status</label>
                            <select name="status" id="" class="form-control" data-control="select2">
                                <option value="1" <?=($student_profile_status == 1) ? 'selected' : ''?>>Verified</option>
                                <option value="0" <?=($student_profile_status == 0) ? 'selected' : ''?>>Un-Verified</option>
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
                                        foreach ($this->ki_theme->project_config('mobile_types') as $key => $value){
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
                                        foreach ($this->ki_theme->project_config('mobile_types') as $key => $value){
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
                            <input type="email" name="email" class="form-control" placeholder="Enter E-Mail ID" value="{email}">
                        </div>
                        <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
                            <label class="form-label required">Father Name</label>
                            <input type="text" name="father_name" class="form-control" placeholder="Enter Father Name" value="{father_name}">
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
                            <input type="text" name="family_id" class="form-control" placeholder="Enter family ID" value="{family_id}">
                        </div>
                        <div class="form-group mb-4 col-lg-12 col-xs-12 col-sm-12">
                            <label class="form-label required">Address</label>
                            <textarea class="form-control" name="address" placeholder="Address">{address}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>