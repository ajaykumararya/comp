<?php
if (defined('DB_EXAM')) {
    // echo $this->ki_theme->item_not_found('Not Found', 'Exam module is not installed.');
    if ($exam_2_type) {
        $this->db->order_by('ac.duration', 'DESC');
        $get = $this->student_model->admit_card(['student_id' => $student_id]);
        $record = [];
        if ($get->num_rows()) {
            $this->load->model('exam/exam_model2');
            // $this->db->reset_query();
            echo '<div class="row">';
            $html = '';
            foreach ($get->result() as $row) {

                $getExam = $this->exam_model2->list_exams([
                    'duration' => $row->admit_card_duration,
                    'course_id' => $row->course_id,
                    'session_id' => $row->session_id
                ]);
                if (!$getExam->num_rows())
                    continue;
                switch ($exam_2_type) {
                    case '1':
                        ?>
                        <div class="card card-image border-hover-primary mb-4">
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
                                if ($row->duration == $getExam->row('duration')) {
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
                                    if (!empty($exam_date)):
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
                                        <div class="fw-semibold text-gray-500">{enrollment_text}</div>
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
                        </div>
                        <?php
                        break;
                    case '2':
                        $subPapers = $this->exam_model2->get_sub_papers(['paper_id' => $getExam->row('id')]);
                        if ($subPapers->num_rows()) {
                            ?>
                            <div class="col-md-6">
                                <div class="card card-image border-hover-primary mb-4">
                                    <!--begin::Card header-->
                                    <div class="card-header border-0 pt-9 ">
                                        <!--begin::Card Title-->
                                        <div class="card-title m-0">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-50px w-50px bg-light me-7">
                                                <img src="{base_url}upload/{image}" alt="image" class="p-3">
                                            </div>
                                            <!--end::Avatar-->
                                            <h1>Exam</h1>
                                        </div>
                                        <!--end::Car Title-->
                                        <?php
                                        if ($row->duration == $getExam->row('duration')) {
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
                                            if (!empty($exam_date)):
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
                                                <div class="fw-semibold text-gray-500">{enrollment_text}</div>
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
                                        <div class="d-flex flex-wrap mb-5">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped w-100">
                                                    <thead>
                                                        <tr>
                                                            <th colspan="3" class="text-center">akjsdh kajhsdk ajdhs</th>
                                                        </tr>
                                                    </thead>
                                                    <thead>
                                                        <th>Action</th>
                                                        <th>Subject</th>
                                                        <th>Schedule</th>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        foreach ($subPapers->result() as $paper) {
                                                            $subject = $this->db->where('id', $paper->subject_id)->get('subjects')->row('subject_name') ?? 0;
                                                            echo '<tr>
                                                            <td></td>
                                                            <td>
                                                                ' . $subject . '
                                                            </td>
                                                            <td>
                                                                ' . label('Start Exam: ' . date('d-m-Y h:i A', strtotime($paper->start_time)), 'success') . '<br>
                                                                ' . label('End Exam: ' . date('d-m-Y h:i A', strtotime($paper->end_time)), 'danger') . '
                                                                
                                                            </td>
                                                            </tr>
                                                        ';
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        break;
                }
            }
            echo str_repeat('</div>', 1);
        }
        // pre($record);
    } else
        echo alert('Exam Service not available.', 'danger');
} else {
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

                            <h1 class=""><?= $row->exam_title ?></h1>
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
                                <div class="fw-semibold text-gray-500">{rollno_text}</div>
                            </div>
                            <!--end::Budget-->

                            <?php
                            if ($examDone) {
                                ?>
                                <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
                                    <div class="fs-6 text-gray-800 fw-bold">
                                        <?= date('m-d-Y', $row->attempt_time) ?>
                                    </div>
                                    <div class="fw-semibold text-gray-500">Attempt Date</div>
                                </div>
                                <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3 me-7">
                                    <div class="fs-6 text-gray-800 fw-bold">
                                        <?= $row->percentage ?> %
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
}

?>