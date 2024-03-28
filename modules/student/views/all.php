<div class="row">
    <div class="col-md-12">
        <div class="{card_class}">
            <div class="card-header collapsible cursor-pointer rotate" data-bs-toggle="collapse" data-bs-target="#list">
                <h3 class="card-title">List {title} admission(s)</h3>
                <div class="card-toolbar rotate-180">
                    <i class="ki-duotone ki-down fs-1"></i>
                </div>
            </div>
            <div id="list" class="collapse show">
                <div class="card-body">
                <div class="alert alert-success d-flex align-items-center p-5 mb-10">
                    <i class="ki-duotone ki-shield-tick fs-2hx text-success me-4"><span class="path1"></span><span class="path2"></span></i>                    <div class="d-flex flex-column">
                        <h4 class="mb-1 text-success">Information</h4>
                        <span>Double click on roll no for copy it.</span>
                    </div>
                </div>
                    <div class="table-responsive">
                        <!--begin::Datatable-->
                        <table id="list-students" class="table align-middle table-row-dashed fs-6 gy-5">
                            <thead>
                                <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">

                                    <th>Roll No</th>
                                    <th>Name</th>
                                    <th>Contact</th>
                                    <th>Email</th>
                                    <th>Course</th>
                                    <th>Admission Type</th>
                                    <th class="text-end min-w-150px">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 fw-semibold">
                            </tbody>
                        </table>
                        <!--end::Datatable-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script id="formTemplate" type="text/x-handlebars-template">
    <div class="row"> 
    <input type="hidden" name="id" value="{{id}}">
    <div class="form-group mb-4 col-lg-4 col-xs-12 col-sm-12">
        <label class="form-label required required">Student Name</label>
        <input type="text" name="name" class="form-control" placeholder="Enter Student Name">
    </div>
    
    <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
        <label class="form-label required">Date of birth</label>
        <input type="date" name="dob" class="form-control" placeholder="Select date of birth">
    </div>
   
    <div class="form-group mb-4 col-lg-6 col-xs-12 col-sm-12">
        <label class="form-label required">Whatsapp Number</label>
        <div class="input-group">
            <input type="text" name="contact_number" class="form-control"
                placeholder="Whatsapp Number" autocomplete="off">
        </div>
    </div>
    <div class="form-group mb-4 col-lg-6 col-xs-12 col-sm-12">
        <label class="form-label">Alternative Mobile</label>
        <div class="input-group">
            <input type="text" name="alternative_mobile" class="form-control"
                placeholder="Mobile" autocomplete="off">
        </div>
    </div>
    <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
        <label class="form-label required">E-Mail ID</label>
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
    <div class="form-group mb-4 col-lg-3 col-xs-12 col-sm-12">
        <label class="form-label">Family ID</label>
        <input type="text" name="family_id" class="form-control" placeholder="Enter family ID">
    </div>
    <div class="form-group mb-4 col-lg-12 col-xs-12 col-sm-12">
        <label class="form-label required">Address</label>
        <textarea class="form-control" name="address" placeholder="Address"></textarea>
    </div>
    </div>
</script>