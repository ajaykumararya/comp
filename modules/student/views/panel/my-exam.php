<?php
if (defined('DB_EXAM')) {

    function checkExamTime($startTime, $endTime)
    {

        $start = new DateTime($startTime);
        $end = new DateTime($endTime);
        $now = new DateTime(); // current time

        if ($end <= $start) {
            throw new Exception("Invalid: End time must be greater than start time");
        }

        $diff = $start->diff($end);

        $totalExamSeconds = ($diff->days * 86400) + ($diff->h * 3600) + ($diff->i * 60) + $diff->s;

        if ($end <= $now) {
            $remainingSeconds = 0;
        } else {
            $nowDiff = $now->diff($end);
            $remainingSeconds = ($nowDiff->days * 86400) + ($nowDiff->h * 3600) + ($nowDiff->i * 60) + $nowDiff->s;
        }
        if ($remainingSeconds >= $totalExamSeconds)
            throw new Exception('Waiting.. Your Exam satrt on ' . $start->format('d-m-Y h:i A'), 1);

        if ($remainingSeconds <= $totalExamSeconds) {
            return $remainingSeconds;
        } else {
            return $totalExamSeconds / 2; // half time
        }
    }
    function examStartButton($token, $removeTime = 0)
    {

        return '<button 
                        class="exam-start-button btn btn-outline btn-outline-dashed btn-outline-success btn-active-light-success me-2 mb-2 pulse pulse-success" 
                        paper-token="' . $token . '" 

                        removeon="' . $removeTime . '"
                ><span class="pulse-ring"></span>
                    <i  class="fa fa-file"></i> Start Exam
                    
                </button>';
    }
    // echo $exam_2_type;
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
                // echo $getExam->num_rows();
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
                            <div class="col-md-12">
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
                                        <div class="d-flex flex-wrap mb-5 w-100">
                                            <div class="table-responsive w-100">
                                                <table class="table table-bordered table-striped w-100">
                                                    <thead>
                                                        <tr>
                                                            <th colspan="3" class="text-center fs-2">
                                                                <?= $getExam->row('title') ?>
                                                            </th>
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
                                                            try {
                                                                $time = checkExamTime($paper->start_time, $paper->end_time);
                                                                if ($time == 0)
                                                                    throw new Exception('Sorry! Your exam has been expired.');
                                                                $token = $this->token->encode(['subject_id' => $paper->subject_id, 'paper_id' => $paper->paper_id]);
                                                                $button = examStartButton($token, $time);
                                                                
                                                            } catch (Exception $e) {
                                                                $class = $e->getCode() == 1 ? 'info' : 'danger';
                                                                $button = label($e->getMessage(), $class);
                                                            }

                                                            $subject = $this->db->where('id', $paper->subject_id)->get('subjects')->row('subject_name') ?? 0;
                                                            echo '<tr>
                                                            <td align="center">' . $button . '</td>
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

            // $file = FCPATH . 'modules/exam/main/assets/student-exam-js.php';
            // echo $file;
            // CI_Jquery;
            $this->ki_theme->setFooterData($this->parser->parse('exam/main/assets/student-exam-js.php', [], true));
            // if (file_exists($file))
            //     require $file;


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