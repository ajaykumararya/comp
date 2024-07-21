<section class="gray-bg" data-aos="fade-right">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="text-center animation animated fadeInUp" data-aos="fade-up" data-animation="fadeInUp"
                    data-animation-delay="0.01s" style="animation-delay: 0.01s; opacity: 1;">
                    <div class="heading_s1 text-center">
                        <h2 class="main-heading center-heading"><i class="fab fa-wpforms"></i> Franchise Apply Form</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form id="add_center_form" action="" class="p-0" method="POST" autocomplete="off">
                    <div class="{card_class}">
                        <div id="kt_docs_card_collapsible" class="collapse show">
                            <div class="card-body">
                                <div class="row">
                                    <input type="hidden" required name="center_number" value="<?= time() ?>">
                                    <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
                                        <label class="form-label required">Institute Owner Name</label>
                                        <input type="text" required name="name" class="form-control"
                                            placeholder="Enter Institute Owner Name">
                                    </div>
                                    <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
                                        <label class="form-label required">Institute Name</label>
                                        <input type="text" required name="institute_name" class="form-control"
                                            placeholder="Enter Institute Name">
                                    </div>
                                    <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
                                        <label class="form-label required">Qualification of institute head</label>
                                        <input type="text" required name="qualification_of_center_head"
                                            class="form-control" placeholder="Enter Qualification of institute head">
                                    </div>
                                    <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
                                        <label class="form-label required"> Series No.</label>
                                        <input type="text" required name="rollno_prefix" class="form-control"
                                            placeholder="Enter Prefix Roll No." readonly>
                                    </div>
                                    <div class="form-group mb-4 col-lg-4 col-xs-12 col-sm-12">
                                        <label class="form-label required required">Date of birth</label>
                                        <input type="date" required name="dob" class="form-control"
                                            placeholder="Select date of birth">
                                    </div>
                                    <div class="form-group mb-4 col-lg-4 col-xs-12 col-sm-12">
                                        <label class="form-label required">Pan Number</label>
                                        <input type="text" required name="pan_number" class="form-control"
                                            placeholder="Enter Pan Number">
                                    </div>
                                    <div class="form-group mb-4 col-lg-4 col-xs-12 col-sm-12">
                                        <label class="form-label required">Aadhar Number</label>
                                        <input type="text" required name="aadhar_number" id="aadhar_number"
                                            class="form-control" placeholder="Enter Aadhar Number">
                                    </div>
                                    <div class="form-group mb-4 col-lg-12 col-xs-12 col-sm-12">
                                        <label class="form-label required">Institite Full Address</label>
                                        <textarea class="form-control" required name="center_full_address"
                                            placeholder="Institite Full Address"></textarea>
                                    </div>
                                    <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
                                        <label class="form-label required">Upload Image of Owner</label>
                                        <input type="file" required name="image" class="form-control">
                                    </div>
                                    <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
                                        <label class="form-label required">Pincode</label>
                                        <input class="form-control" required name="pincode" placeholder="Enter Pincode">
                                    </div>
                                    <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
                                        <label class="form-label required">Select State </label>
                                        <select class="form-select get_city" required name="state_id"
                                            data-control="select2" data-placeholder="Select a State">
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
                                        <label class="form-label required">Select Distric <span
                                                id="load"></span></label>
                                        <select class="form-select list-cities" required name="city_id"
                                            data-control="select2" data-placeholder="Select a City">
                                            <option></option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
                                        <label class="form-label required"> Number of Staff</label>
                                        <input type="text" required name="no_of_computer_operator" class="form-control"
                                            placeholder="Enter Number of computer operators">
                                    </div>
                                    <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
                                        <label class="form-label required">Number of class rooms</label>
                                        <input type="text" required name="no_of_class_room" class="form-control"
                                            placeholder="Enter Number of class rooms">
                                    </div>
                                    <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
                                        <label class="form-label required">Total Computers</label>
                                        <input type="text" required name="total_computer" class="form-control"
                                            placeholder="Enter Total Computers">
                                    </div>
                                    <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
                                        <label class="form-label required">Space of Computer Center</label>
                                        <input type="text" required name="space_of_computer_center" class="form-control"
                                            placeholder="Enter Space of  Computer Center">
                                    </div>
                                    <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
                                        <label class="form-label required">Whatsapp Number</label>
                                        <input type="text" required name="whatsapp_number" class="form-control"
                                            placeholder="Enter Whatsapp Number">
                                    </div>
                                    <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
                                        <label class="form-label required">Contact Number</label>
                                        <input type="text" required name="contact_number" class="form-control"
                                            placeholder="Enter Contact Number">
                                    </div>
                                    <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
                                        <label class="form-label required">E-Mail ID</label>
                                        <input type="email" required name="email_id" class="form-control"
                                            placeholder="Enter E-Mail ID">
                                    </div>
                                    <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
                                        <label class="form-label required">Password</label>
                                        <input type="text" required name="password" class="form-control"
                                            placeholder="Enter">
                                            <span class="text-danger">Use 8 or more characters with a mix of letters, numbers & symbols.</span>
                                    </div>
                                    <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
                                        <label class="form-label required">Reception</label>
                                        <select class="form-select" required name="reception" data-control="select2"
                                            data-placeholder="Select an option">
                                            <option value="no">No</option>
                                            <option value="yes">Yes</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
                                        <label class="form-label required">Staff Room</label>
                                        <select class="form-select" required name="staff_room" data-control="select2"
                                            data-placeholder="Select an option">
                                            <option value="no">No</option>
                                            <option value="yes">Yes</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
                                        <label class="form-label required">Water Supply</label>
                                        <select class="form-select" required name="water_supply" data-control="select2"
                                            data-placeholder="Select an option">
                                            <option value="no">No</option>
                                            <option value="yes">Yes</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
                                        <label class="form-label required">Toilet</label>
                                        <select class="form-select" required name="toilet" data-control="select2"
                                            data-placeholder="Select an option">
                                            <option value="no">No</option>
                                            <option value="yes">Yes</option>
                                        </select>
                                    </div>
                                    <!-- <div class="form-group mb-4 col-lg-4 col-xs-12 col-sm-12">
                                <label class="form-label required">Username</label>
                                <input type="text" required name="username" class="form-control" placeholder="Enter">
                            </div> -->
                                    <!--//valid_upto-->
                                    <!-- <div class="form-group mb-4 col-lg-4 col-xs-12 col-sm-12">
                                        <label class="form-label required">Valid Upto</label>
                                        <input type="date" required name="valid_upto" class="form-control selectdate"
                                            placeholder="Select A Date">
                                    </div> -->
                                </div>
                            </div>
                            <div class="card-header">
                                <h4 class="card-title">Upload Documents</h4>
                            </div>
                            <div class="card card-body">
                                <div class="row">
                                    <div class="col-md-3 mb-2">
                                        <div class="form-control">
                                            <label for="adhar" class="form-label required">Aadhar Card
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-9 mb-2">
                                        <div class="form-group">
                                            <input type="file" class="form-control" required name="adhar" id="adhar">
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <div class="form-control">
                                            <label for="signature" class="form-label required">Signature</label>
                                        </div>
                                    </div>
                                    <div class="col-md-9 mb-2">
                                        <div class="form-group">
                                            <input type="file" class="form-control" required name="signature"
                                                id="signature">
                                        </div>
                                    </div>
                                    <?php
                                    if (CHECK_PERMISSION('CENTRE_LOGO')) {
                                        ?>
                                        <div class="col-md-3 mb-2">
                                            <div class="form-control">
                                                <label for="centre_logo" class="form-label required">Logo</label>
                                            </div>
                                        </div>
                                        <div class="col-md-9 mb-2">
                                            <div class="form-group">
                                                <input type="file" required class="form-control" required name="logo"
                                                    id="centre_logo">
                                            </div>
                                        </div>
                                        <?php
                                    }

                                    ?>
                                    <div class="col-md-3 mb-2">
                                        <div class="form-control">
                                            <label for="address_proof" class="form-label">Address Proof</label>
                                        </div>
                                    </div>
                                    <div class="col-md-9 mb-2">
                                        <div class="form-group">
                                            <input type="file" class="form-control" name="address_proof"
                                                id="address_proof">
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <div class="form-control">
                                            <label for="agreement" class="form-label">Agreement</label>
                                        </div>
                                    </div>
                                    <div class="col-md-9 mb-2">
                                        <div class="form-group">
                                            <input type="file" class="form-control" name="agreement" id="agreement">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="btn-wrapper btn-wrapper2">
                                <?= $this->ki_theme->set_class('btn btn-outline-success')->button('<span><i class="fa fa-save"></i> Submit</span>', 'submit') ?>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>