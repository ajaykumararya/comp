<div class="row">
    <?php
    if (CHECK_PERMISSION('NON_OBJECTION_CERTIFICATE')) {
        // echo $student_id;
        $get = $this->student_model->get_switch('other_certificate', [
            'student_id' => $student_id,
            'certificate' => 'no_objection_certificate'
        ]);
        if ($get->num_rows()) {
            $row = $get->row();
            ?>
            <div class="col-md-6">
                <a href="{base_url}no-objection-certificate/<?= $this->ki_theme->encrypt($row->cert_id) ?>" target="_blank"
                    class="card card-image border-hover-primary mb-4">
                    <!--begin::Card header-->
                    <div class="card-header border-0 pt-9 ">
                        <!--begin::Card Title-->
                        <div class="card-title m-0">
                            <!--begin::Avatar-->
                            <div class="symbol symbol-50px w-50px bg-light me-7">
                                <img src="{base_url}upload/{image}" alt="image" class="p-3">
                            </div>
                            <!--end::Avatar-->
                            <h1>NO OBJECTION CERTIFICATE</h1>
                        </div>
                        <!--end::Car Title-->
                    </div>
                    <!--end:: Card header-->
                    <!--begin:: Card body-->
                    <div class="card-body p-9 ribbon ribbon-end ribbon-clip">
                        <div class="ribbon-label" style="top:10px">
                            {rollno_text} :
                            <?= $row->roll_no ?>
                            <span class="ribbon-inner bg-primary"></span>
                        </div>
                        <div class="fs-1 fw-bolder text-primary">
                            {student_name}
                        </div>
                        <!--begin::Name-->
                        <div class="fs-3 fw-bold text-gray-900">
                            <?= $row->course_name ?>
                        </div>
                        <!--end::Name-->
                        <!--begin::Description-->
                        <p class="text-gray-500 fw-semibold fs-5 mt-1 mb-7">
                            <?= $row->duration ?>
                            <?= $row->duration_type ?>
                        </p>
                        <!--end::Description-->
                        <!--begin::Info-->
                        <div class="d-flex flex-wrap mb-5">
                            <!--begin::Due-->
                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
                                <div class="fs-6 text-gray-800 fw-bold">
                                    <?= $row->sr_no ?>
                                </div>
                                <div class="fw-semibold text-gray-500">Sr. No.</div>
                            </div>
                            <!--end::Due-->
                            <!--begin::Budget-->
                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3 me-7">
                                <div class="fs-6 text-gray-800 fw-bold">
                                    <?= $row->date ?>
                                </div>
                                <div class="fw-semibold text-gray-500">Date</div>
                            </div>
                            <!--end::Budget-->
                        </div>
                        <!--end::Info-->
                    </div>
                    <div class="card-footer p-3" align="center">
                        {view_button}
                    </div>
                </a>
            </div>
            <?php
        }
    }

    if (CHECK_PERMISSION('MIGRATION_CERTIFICATE')) {
        $get = $this->student_model->get_switch('other_certificate', [
            'student_id' => $student_id,
            'certificate' => 'migration_certificate'
        ]);
        if ($get->num_rows()) {
            $row = $get->row();
            ?>
            <div class="col-md-6">
                <a href="{base_url}migration-certificate/<?= $this->ki_theme->encrypt($row->cert_id) ?>" target="_blank"
                    class="card card-image border-hover-primary mb-4">
                    <!--begin::Card header-->
                    <div class="card-header border-0 pt-9 ">
                        <!--begin::Card Title-->
                        <div class="card-title m-0">
                            <!--begin::Avatar-->
                            <div class="symbol symbol-50px w-50px bg-light me-7">
                                <img src="{base_url}upload/{image}" alt="image" class="p-3">
                            </div>
                            <!--end::Avatar-->
                            <h1>MIGRATION CERTIFICATE</h1>
                        </div>
                        <!--end::Car Title-->
                    </div>
                    <!--end:: Card header-->
                    <!--begin:: Card body-->
                    <div class="card-body p-9 ribbon ribbon-end ribbon-clip">
                        <div class="ribbon-label" style="top:10px">
                            {rollno_text} :
                            <?= $row->roll_no ?>
                            <span class="ribbon-inner bg-primary"></span>
                        </div>
                        <div class="fs-1 fw-bolder text-primary">
                            {student_name}
                        </div>
                        <!--begin::Name-->
                        <div class="fs-3 fw-bold text-gray-900">
                            <?= $row->course_name ?>
                        </div>
                        <!--end::Name-->
                        <!--begin::Description-->
                        <p class="text-gray-500 fw-semibold fs-5 mt-1 mb-7">
                            <?= $row->duration ?>
                            <?= $row->duration_type ?>
                        </p>
                        <!--end::Description-->
                        <!--begin::Info-->
                        <div class="d-flex flex-wrap mb-5">
                            <!--begin::Due-->
                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
                                <div class="fs-6 text-gray-800 fw-bold">
                                    <?= $row->sr_no ?>
                                </div>
                                <div class="fw-semibold text-gray-500">Sr. No.</div>
                            </div>
                            <!--end::Due-->
                            <!--begin::Budget-->
                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3 me-7">
                                <div class="fs-6 text-gray-800 fw-bold">
                                    <?= $row->date ?>
                                </div>
                                <div class="fw-semibold text-gray-500">Date</div>
                            </div>
                            <!--end::Budget-->
                        </div>
                        <!--end::Info-->
                    </div>
                    <div class="card-footer p-3" align="center">
                        {view_button}
                    </div>
                </a>
            </div>
            <?php
        }
    }
    if (CHECK_PERMISSION('PROVISIONAL_CERTIFICATE')) {
        $get = $this->student_model->get_switch('other_certificate', ['certificate' => 'provisional_certificate', 'student_id' => $student_id]);
        if ($get->num_rows()) {
            $row = $get->row();
            ?>
            <div class="col-md-6">
                <a href="{base_url}provisional-certificate/<?= $this->ki_theme->encrypt($row->cert_id) ?>" target="_blank"
                    class="card card-image border-hover-primary mb-4">
                    <!--begin::Card header-->
                    <div class="card-header border-0 pt-9 ">
                        <!--begin::Card Title-->
                        <div class="card-title m-0">
                            <!--begin::Avatar-->
                            <div class="symbol symbol-50px w-50px bg-light me-7">
                                <img src="{base_url}upload/{image}" alt="image" class="p-3">
                            </div>
                            <!--end::Avatar-->
                            <h1>PROVISIONAL CERTIFICATE</h1>
                        </div>
                        <!--end::Car Title-->
                    </div>
                    <!--end:: Card header-->
                    <!--begin:: Card body-->
                    <div class="card-body p-9 ribbon ribbon-end ribbon-clip">
                        <div class="ribbon-label" style="top:10px">
                            {rollno_text} :
                            <?= $row->roll_no ?>
                            <span class="ribbon-inner bg-primary"></span>
                        </div>
                        <div class="fs-1 fw-bolder text-primary">
                            {student_name}
                        </div>
                        <!--begin::Name-->
                        <div class="fs-3 fw-bold text-gray-900">
                            <?= $row->course_name ?>
                        </div>
                        <!--end::Name-->
                        <!--begin::Description-->
                        <p class="text-gray-500 fw-semibold fs-5 mt-1 mb-7">
                            <?= $row->duration ?>
                            <?= $row->duration_type ?>
                        </p>
                        <!--end::Description-->
                        <!--begin::Info-->
                        <div class="d-flex flex-wrap mb-5">
                            <!--begin::Due-->
                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
                                <div class="fs-6 text-gray-800 fw-bold">
                                    <?= $row->sr_no ?>
                                </div>
                                <div class="fw-semibold text-gray-500">Sr. No.</div>
                            </div>
                            <!--end::Due-->
                            <!--begin::Budget-->
                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3 me-7">
                                <div class="fs-6 text-gray-800 fw-bold">
                                    <?= $row->internship ?>
                                </div>
                                <div class="fw-semibold text-gray-500">Internship</div>
                            </div>
                            <!--end::Budget-->
                        </div>
                        <!--end::Info-->
                    </div>
                    <div class="card-footer p-3" align="center">
                        {view_button}
                    </div>
                </a>
            </div>
            <?php
        }
    }
    ?>
</div>