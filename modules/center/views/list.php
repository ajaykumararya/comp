<div class="row">
    <div class="col-md-12">

        <div class="{card_class}">
            <div class="card-header collapsible cursor-pointer rotate" data-bs-toggle="collapse"
                data-bs-target="#kt_docs_card_collapsible">
                <h3 class="card-title">List Center(s)</h3>
                <div class="card-toolbar rotate-180">
                    <i class="ki-duotone ki-down fs-1"></i>
                </div>
            </div>
            <div id="kt_docs_card_collapsible" class="collapse show">
                <div class="card-body">
                <div class="alert alert-warning d-flex align-items-center p-5 mb-10">
                    <i class="ki-duotone ki-shield-tick fs-2hx text-warning me-4"><span class="path1"></span><span class="path2"></span></i>                    <div class="d-flex flex-column">
                        <h4 class="mb-1 text-warning">Information</h4>
                        <span>You can change the Prefix Roll no by clicking on it.</span>
                    </div>
                </div>
                    <div class="table-responsive">
                        <!--begin::Datatable-->
                        <table id="list_center" class="table align-middle table-row-dashed fs-6 gy-5">
                            <thead>
                                <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">

                                    <th>Roll No</th>
                                    <th>Institute ID</th>
                                    <th>Institute Name</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Address</th>
                                    <th class="text-end min-w-100px">Actions</th>
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
    <input type="hidden" name="id" value="{{id}}">
    
    <div class="form-group mb-4">
        <label class="form-label">Center Roll Number Prefix</label>
        <input type="text" name="rollno_prefix" class="form-control" placeholder="Enter Roll Number Prefix" value="{{rollno_prefix}}">
    </div>
</script>