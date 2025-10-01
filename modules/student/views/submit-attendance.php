<div class="row">
    <div class="col-md-12">
        <form action="" id="submit-attendance-form">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">Select Criteria</h3>
                    <div class="card-toolbar rotate-180">
                        <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base" style="align-items:center">
                            <select class="form-select form-select-sm me-2 select-chhoose-att-types" data-control="select2"
                                 data-placeholder="Select">
                                <?php
                                foreach ($attendance_types as $type) {
                                    echo '<option value="' . $type['id'] . '">' . $type['type'] . '</option>';
                                }
                                ?>
                            </select>
                            {save_button}
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <!--begin::Datatable-->
                        <table id="list_attendance" class="table align-middle table-row-dashed fs-6 gy-5">
                            <thead>
                                <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">

                                    <th>#.</th>
                                    <th>{rollno_text}.</th>
                                    <th>Name</th>
                                    <th>Attendance</th>
                                    <th class="text-end min-w-100px">Remark</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 fw-semibold">
                                {tbody}
                            </tbody>
                        </table>
                        <!--end::Datatable-->
                    </div>

                </div>
            </div>
        </form>
    </div>
</div>