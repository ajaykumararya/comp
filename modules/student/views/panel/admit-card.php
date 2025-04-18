<?php
$get = $this->student_model->admit_card(['student_id' => $student_id]);
if ($get->num_rows()) {
    echo '<div class="row">';
    foreach ($get->result() as $row) {
        // pre($row);
        ?>
        <div class="col-md-6">
            <a href="{base_url}admit-card/<?= $this->ki_theme->encrypt($row->admit_card_id) ?>" target="_blank"
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
                        <h1>Admit Card</h1>
                    </div>
                    <!--end::Car Title-->
                    <?php
                    if ($row->admit_card_duration == $row->duration) {
                        ?>
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            <span class="badge badge-light-primary fw-bold me-auto px-4 py-3">Final</span>
                        </div>
                        <!--end::Card toolbar-->
                        <?php
                    }
                    ?>
                </div>
                <!--end:: Card header-->
                <!--begin:: Card body-->
                <div class="card-body p-9 ribbon ribbon-end ribbon-clip">
                    <div class="ribbon-label" style="top:10px">
                        Session :
                        <?= $row->session ?>
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
                        <?= $row->admit_card_duration ?>
                        <?= $row->duration_type ?>
                    </p>
                    <!--end::Description-->
                    <!--begin::Info-->
                    <div class="d-flex flex-wrap mb-5">
                        <?php
                        if(!empty($exam_date)):
                        ?>
                        <!--begin::Due-->
                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
                            <div class="fs-6 text-gray-800 fw-bold">
                                <?= $row->exam_date ?>
                            </div>
                            <div class="fw-semibold text-gray-500">Exam Date & Time</div>
                        </div>
                        <!--end::Due-->
                        <?php
                        endif;
                        ?>
                        <!--begin::Budget-->
                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3 me-7">
                            <div class="fs-6 text-gray-800 fw-bold">
                                <?= $row->enrollment_no ?>
                            </div>
                            <div class="fw-semibold text-gray-500">Enrollment No</div>
                        </div>
                        <!--end::Budget-->
                        <!--begin::Budget-->
                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3 me-7">
                            <div class="fs-6 text-gray-800 fw-bold">
                                <?= $row->roll_no ?>
                            </div>
                            <div class="fw-semibold text-gray-500">{rollno_text}</div>
                        </div>
                        <!--end::Budget-->
                    </div>
                    <!--end::Info-->
                </div>
                <?php
                if (CHECK_PERMISSION('SHOW_STUDENT_DOCUMENT_BUTTONS')):
                    ?>
                    <!--end:: Card body-->
                    <div class="card-footer text-end">
                        <button class="btn btn-primary"><i class="fa fa-eye"></i> View Admit card</button>
                    </div>
                    <?php
                endif;
                ?>
                <div class="card-footer p-3" align="center">
                    {view_button}
                </div>
            </a>
        </div>
        <?php
        // pre($row);
    }
    echo '</div>';
} else {
    echo $this->ki_theme->item_not_found('Not Found', 'Admit Card not found.');
}
?>