<div class="row">
    <div class="col-md-12">
        <form action="" id="submit-attendance-form">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">Select Criteria</h3>
                    <div class="card-toolbar rotate-180">
                        {save_button}
                    </div>
                </div>
                <div class="card-body">
                <div class="table-responsive">
                        <!--begin::Datatable-->
                        <table id="list_attendance" class="table align-middle table-row-dashed fs-6 gy-5">
                            <thead>
                                <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">

                                    <th>#.</th>
                                    <th>Roll No.</th>
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