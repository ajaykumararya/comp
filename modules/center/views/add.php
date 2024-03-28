<div class="row">
    <div class="col-md-12">
        <form id="add_center_form" action="" method="POST" autocomplete="off">
            <div class="{card_class}">
                <div class="card-header collapsible cursor-pointer rotate" data-bs-toggle="collapse"
                    data-bs-target="#kt_docs_card_collapsible">
                    <h3 class="card-title">Center Form</h3>
                    <div class="card-toolbar rotate-180">
                        <i class="ki-duotone ki-down fs-1"></i>
                    </div>
                </div>
                <div id="kt_docs_card_collapsible" class="collapse show">
                    <div class="card-body">
                        <div class="row">
                            <input type="hidden" name="center_number" value="<?= time() ?>">
                            <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
                                <label class="form-label required">Institute Owner Name</label>
                                <input type="text" name="name" class="form-control"
                                    placeholder="Enter Institute Owner Name">
                            </div>
                            <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
                                <label class="form-label required">Institute Name</label>
                                <input type="text" name="institute_name" class="form-control"
                                    placeholder="Enter Institute Name">
                            </div>
                            <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
                                <label class="form-label required">Qualification of institute head</label>
                                <input type="text" name="qualification_of_center_head" class="form-control"
                                    placeholder="Enter Qualification of institute head">
                            </div>
                            <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
                                <label class="form-label required"> Prefix Roll No.</label>
                                <input type="text" name="rollno_prefix" class="form-control"
                                    placeholder="Enter Prefix Roll No.">
                            </div>
                            <div class="form-group mb-4 col-lg-4 col-xs-12 col-sm-12">
                                <label class="form-label required required">Date of birth</label>
                                <input type="date" name="dob" class="form-control" placeholder="Select date of birth">
                            </div>

                            <div class="form-group mb-4 col-lg-4 col-xs-12 col-sm-12">
                                <label class="form-label required">Pan Number</label>
                                <input type="text" name="pan_number" class="form-control"
                                    placeholder="Enter Pan Number">
                            </div>
                            <div class="form-group mb-4 col-lg-4 col-xs-12 col-sm-12">
                                <label class="form-label required">Aadhar Number</label>
                                <input type="text" name="aadhar_number" id="aadhar_number" class="form-control"
                                    placeholder="Enter Aadhar Number">
                            </div>
                            <div class="form-group mb-4 col-lg-12 col-xs-12 col-sm-12">
                                <label class="form-label required">Institite Full Address</label>
                                <textarea class="form-control" name="center_full_address"
                                    placeholder="Institite Full Address"></textarea>
                            </div>

                            <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
                                <label class="form-label required">Upload Image of franchise Owner</label>
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
                                <label class="form-label required">Select Distric <span id="load"></span></label>
                                <select class="form-select list-cities" name="city_id" data-control="select2"
                                    data-placeholder="Select a City">
                                    <option></option>

                                </select>
                            </div>
                            <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
                                <label class="form-label required"> Number of Staff</label>
                                <input type="text" name="no_of_computer_operator" class="form-control"
                                    placeholder="Enter Number of computer operators">
                            </div>
                            <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
                                <label class="form-label required">Number of class rooms</label>
                                <input type="text" name="no_of_class_room" class="form-control"
                                    placeholder="Enter Number of class rooms">
                            </div>
                            <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
                                <label class="form-label required">Total Computers</label>
                                <input type="text" name="total_computer" class="form-control"
                                    placeholder="Enter Total Computers">
                            </div>
                            <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
                                <label class="form-label required">Space of Computer Center</label>
                                <input type="text" name="space_of_computer_center" class="form-control"
                                    placeholder="Enter Space of  Computer Center">
                            </div>
                            <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
                                <label class="form-label required">Whatsapp Number</label>
                                <input type="text" name="whatsapp_number" class="form-control"
                                    placeholder="Enter Whatsapp Number">
                            </div>
                            <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
                                <label class="form-label required">Contact Number</label>
                                <input type="text" name="contact_number" class="form-control"
                                    placeholder="Enter Contact Number">
                            </div>
                            <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
                                <label class="form-label required">E-Mail ID</label>
                                <input type="email" name="email_id" class="form-control" placeholder="Enter E-Mail ID">
                            </div>
                            <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
                                <label class="form-label required">Password</label>
                                <input type="text" name="password" class="form-control" placeholder="Enter">
                            </div>

                            <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
                                <label class="form-label required">Reception</label>
                                <select class="form-select" name="reception" data-control="select2"
                                    data-placeholder="Select an option">
                                    <option value="no">No</option>
                                    <option value="yes">Yes</option>
                                </select>
                            </div>
                            <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
                                <label class="form-label required">Staff Room</label>
                                <select class="form-select" name="staff_room" data-control="select2"
                                    data-placeholder="Select an option">
                                    <option value="no">No</option>
                                    <option value="yes">Yes</option>
                                </select>
                            </div>
                            <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
                                <label class="form-label required">Water Supply</label>
                                <select class="form-select" name="water_supply" data-control="select2"
                                    data-placeholder="Select an option">
                                    <option value="no">No</option>
                                    <option value="yes">Yes</option>
                                </select>

                            </div>
                            <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
                                <label class="form-label required">Toilet</label>
                                <select class="form-select" name="toilet" data-control="select2"
                                    data-placeholder="Select an option">
                                    <option value="no">No</option>
                                    <option value="yes">Yes</option>
                                </select>
                            </div>
                            <!-- <div class="form-group mb-4 col-lg-4 col-xs-12 col-sm-12">
                                <label class="form-label required">Username</label>
                                <input type="text" name="username" class="form-control" placeholder="Enter">
                            </div> -->

                            <!--//valid_upto-->
                            <div class="form-group mb-4 col-lg-4 col-xs-12 col-sm-12">
                                <label class="form-label required">Valid Upto</label>
                                <input type="date" name="valid_upto" class="form-control selectdate"
                                    placeholder="Select A Date">
                            </div>
                        </div>
                    </div>
                    <div class="card card-body">
                        <h4>Upload Documents</h4>
                        <div class="row">
                            <div class="col-md-3 mb-4">
                                <div class="form-control">
                                    <label for="adhar" class="form-label required">Aadhar Card
                                        </label>
                                </div>
                            </div>
                            <div class="col-md-9 mb-4">
                                <div class="form-group">
                                    <input type="file" class="form-control" name="adhar" id="adhar">
                                </div>
                            </div>

                            
                            <div class="col-md-3 mb-4">
                                <div class="form-control">
                                    <label for="signature" class="form-label required">Signature</label>
                                </div>
                            </div>
                            <div class="col-md-9 mb-4">
                                <div class="form-group">
                                    <input type="file" class="form-control" name="signature" id="signature">
                                </div>
                            </div>

                            <div class="col-md-3 mb-4">
                                <div class="form-control">
                                    <label for="address_proof" class="form-label">Address Proof</label>
                                </div>
                            </div>
                            <div class="col-md-9 mb-4">
                                <div class="form-group">
                                    <input type="file" class="form-control" name="address_proof" id="address_proof">
                                </div>
                            </div>

                            <div class="col-md-3 mb-4">
                                <div class="form-control">
                                    <label for="agreement" class="form-label">Agreement</label>
                                </div>
                            </div>
                            <div class="col-md-9 mb-4">
                                <div class="form-group">
                                    <input type="file" class="form-control" name="agreement" id="agreement">
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    {publish_button}
                </div>
            </div>

        </form>

    </div>
</div>