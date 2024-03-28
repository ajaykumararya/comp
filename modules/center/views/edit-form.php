<form action="center/update">
    <input type="hidden" name="id" value="{id}">
    <div class="row">
        <input type="hidden" name="center_number" value="<?= time() ?>">
        <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
            <label class="form-label required">Institute Owner Name</label>
            <input type="text" value="{name}" name="name" class="form-control" placeholder="Enter Institute Owner Name">
        </div>
        <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
            <label class="form-label required">Institute Name</label>
            <input type="text" value="{institute_name}" name="institute_name" class="form-control"
                placeholder="Enter Institute Name">
        </div>
        <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
            <label class="form-label required">Institute ID</label>
            <input type="text" value="{center_number}" name="center_number" class="form-control"
                placeholder="Enter Insitute ID">
        </div>
        <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
            <label class="form-label required">Qualification of institute head</label>
            <input type="text" value="{qualification_of_center_head}" name="qualification_of_center_head"
                class="form-control" placeholder="Enter Qualification of institute head">
        </div>
        <div class="form-group mb-4 col-lg-4 col-xs-12 col-sm-12">
            <label class="form-label required required">Date of birth</label>
            <input type="date" name="dob" value="<?=date('Y-m-d',strtotime($dob))?>" class="form-control" placeholder="Select date of birth">
        </div>
        <div class="form-group mb-4 col-lg-4 col-xs-12 col-sm-12">
            <label class="form-label required">Pan Number</label>
            <input type="text" value="{pan_number}" name="pan_number" class="form-control"
                placeholder="Enter Pan Number">
        </div>
        <div class="form-group mb-4 col-lg-4 col-xs-12 col-sm-12">
            <label class="form-label required">Aadhar Number</label>
            <input type="text" value="{aadhar_number}" name="aadhar_number" id="aadhar_number" class="form-control"
                placeholder="Enter Aadhar Number">
        </div>
        <div class="form-group mb-4 col-lg-12 col-xs-12 col-sm-12">
            <label class="form-label required">Institite Full Address</label>
            <textarea class="form-control" name="center_full_address"
                placeholder="Institite Full Address">{center_full_address}</textarea>
        </div>
        <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
            <label class="form-label required">Pincode</label>
            <input class="form-control" value="{pincode}" name="pincode" placeholder="Enter Pincode">
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
                        echo '<option value="' . $row->STATE_ID . '" ' . ($row->STATE_ID == $state_id ? 'selected' : '') . '>' . $row->STATE_NAME . '</option>';
                }
                ?>
            </select>
        </div>
        <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12 form-group-city">
            <label class="form-label required">Select Distric <span id="load"></span></label>
            <select class="form-select list-cities" name="city_id" data-control="select2"
                data-placeholder="Select a City">
                <option></option>
                <?php
                $getCities = $this->SiteModel->get_city(['STATE_ID' => $state_id]);
                if ($getCities->num_rows()) {
                    foreach ($getCities->result() as $city) {
                        echo '<option value="' . $city->DISTRICT_ID . '"  ' . ($city->DISTRICT_ID == $city_id ? 'selected' : '') . '>' . $city->DISTRICT_NAME . '</option>';
                    }
                }
                ?>
            </select>
        </div>
        <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
            <label class="form-label required"> Number of Staff</label>
            <input type="text" name="no_of_computer_operator" value="{no_of_computer_operator}" class="form-control"
                placeholder="Enter Number of computer operators">
        </div>
        <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
            <label class="form-label required">Number of class rooms</label>
            <input type="text" name="no_of_class_room" value="{no_of_class_room}" class="form-control"
                placeholder="Enter Number of class rooms">
        </div>
        <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
            <label class="form-label required">Total Computers</label>
            <input type="text" name="total_computer" value="{total_computer}" class="form-control"
                placeholder="Enter Total Computers">
        </div>
        <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
            <label class="form-label required">Space of Computer Center</label>
            <input type="text" name="space_of_computer_center" value="{space_of_computer_center}" class="form-control"
                placeholder="Enter Space of  Computer Center">
        </div>
        <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
            <label class="form-label required">Whatsapp Number</label>
            <input type="text" name="whatsapp_number" value="{whatsapp_number}" class="form-control"
                placeholder="Enter Whatsapp Number">
        </div>
        <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
            <label class="form-label required">Contact Number</label>
            <input type="text" name="contact_number" value="{contact_number}" class="form-control"
                placeholder="Enter Contact Number">
        </div>
        <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
            <label class="form-label required">E-Mail ID</label>
            <input type="email" name="email" value="{email}" class="form-control" placeholder="Enter E-Mail ID">
        </div>
        <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
            <label class="form-label required">Reception</label>
            <select class="form-select" name="reception" data-control="select2" data-placeholder="Select an option">
                <option value="no" <?= $reception == 'no' ? 'selected' : '' ?>>No</option>
                <option value="yes" <?= $reception == 'yes' ? 'selected' : '' ?>>Yes</option>
            </select>
        </div>
        <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
            <label class="form-label required">Staff Room</label>
            <select class="form-select" name="staff_room" data-control="select2" data-placeholder="Select an option">
                <option value="no" <?= $staff_room == 'no' ? 'selected' : '' ?>>No</option>
                <option value="yes" <?= $staff_room == 'no' ? 'selected' : '' ?>>Yes</option>
            </select>
        </div>
        <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
            <label class="form-label required">Water Supply</label>
            <select class="form-select" name="water_supply" data-control="select2" data-placeholder="Select an option">
                <option value="no" <?= $water_supply == 'no' ? 'selected' : '' ?>>No</option>
                <option value="yes" <?= $water_supply == 'no' ? 'selected' : '' ?>>Yes</option>
            </select>
        </div>
        <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
            <label class="form-label required">Toilet</label>
            <select class="form-select" name="toilet" data-control="select2" data-placeholder="Select an option">
                <option value="no" <?= $toilet == 'no' ? 'selected' : '' ?>>No</option>
                <option value="yes" <?= $toilet == 'no' ? 'selected' : '' ?>>Yes</option>
            </select>
        </div>
        <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
            <label class="form-label required">Valid Upto</label>
            <input type="date" name="valid_upto" value="{valid_upto}" class="form-control selectdate"
                placeholder="Select A Date">
        </div>
    </div>
</form>
