<?php
$get = $this->student_model->get_switch(
    'active_student_exams',
    [
        'id' => $this->student_model->studentId()
    ]
);
// echo $this->db->last_query();
if ($get->num_rows()) {
    echo '<div class="row">';
    foreach ($get->result() as $row) {
        $examDone = $row->percentage != null;
        // echo $row->exam_date;
        // pre($row);
        ?>
        <div class="col-md-6">
            <a href="javascript:void(0)" class="card card-image border-hover-primary <?= $examDone ? 'done' : 'ready' ?>"
                data-id="<?= $row->assign_exam_id ?>">
                <!--begin::Card header-->
                <div class="card-header border-0 pt-9 ">
                    <!--begin::Card Title-->
                    <div class="card-title m-0">
                        <!--begin::Avatar-->
                        <div class="symbol symbol-50px w-50px bg-light me-7">
                            <img src="{base_url}upload/{image}" alt="image" class="p-3">
                        </div>

                        <h1 class=""><?=$row->exam_title?></h1>
                        <!--end::Avatar-->
                    </div>
                    <!--end::Car Title-->
                    <?php
                    if ($examDone) {
                        ?>
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            <span class="badge badge-light-primary fw-bold me-auto px-4 py-3">Already Done</span>
                        </div>
                        <!--end::Card toolbar-->
                        <?php
                    }
                    ?>
                </div>
                <!--end:: Card header-->
                <!--begin:: Card body-->
                <div class="card-body p-9 ribbon ribbon-end ribbon-clip">
                    <!-- <div class="ribbon-label" style="top:10px">
                        Session :
                   
                        <span class="ribbon-inner bg-primary"></span>
                    </div> -->
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

                        <!--begin::Budget-->
                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3 me-7">
                            <div class="fs-6 text-gray-800 fw-bold">
                                <?= $row->roll_no ?>
                            </div>
                            <div class="fw-semibold text-gray-500">Roll No</div>
                        </div>
                        <!--end::Budget-->

                        <?php
                        if ($examDone) {
                            ?>
                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
                                <div class="fs-6 text-gray-800 fw-bold">
                                    <?=date('m-d-Y',$row->attempt_time)?>
                                </div>
                                <div class="fw-semibold text-gray-500">Attempt Date</div>
                            </div>
                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3 me-7">
                                <div class="fs-6 text-gray-800 fw-bold">
                                    <?=$row->percentage?> %
                                </div>
                                <div class="fw-semibold text-gray-500">Percentage</div>
                            </div>
                            <?php
                        }

                        ?>


                    </div>
                    <!--end::Info-->
                </div>
                <!--end:: Card body-->
            </a>
        </div>
        <?php
    }
    echo '</div>';
} else
    echo $this->ki_theme->item_not_found('Not Found', 'Exam not found.');


?>