<div class="col-md-12 mt-10">
    <div class="{card_class}">
        <div class="card-header collapsible cursor-pointer rotate" data-bs-toggle="collapse" data-bs-target="#list">
            <h3 class="card-title">List Certificate(s)</h3>
            <div class="card-toolbar rotate-180">
                <i class="ki-duotone ki-down fs-1"></i>
            </div>
        </div>
        <div id="list" class="collapse show">
            <div class="card-body">

                <div class="table-responsive">
                    <!--begin::Datatable-->
                    <table id="list-certificates" class="table align-middle table-row-dashed fs-6 gy-5">
                        <thead>
                            <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">

                                <th>{rollno_text}</th>
                                <th>Student Name</th>
                                <th>Course</th>
                                <th>Issue Date</th>
                                <!-- <th>Session</th> -->
                                <th>Institute</th>
                                <th class="text-end">Actions</th>
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

<script id="formTemplate" type="text/x-handlebars-template">
    <input type="hidden" name="id" value="{{certiticate_id}}">
    <div class="form-group">
        <label class="form-label required">Issue Date</label>
        <input type="text" name="date" value="{{createdOn}}" class="form-control selectdate">
    </div>
</script>