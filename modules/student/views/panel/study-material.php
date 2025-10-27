<style>
    .btn-container {
        font-family: 'Segoe UI', sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        gap: 30px;
    }

    .action-btn {
        display: flex;
        align-items: center;
        justify-content: flex-start;
        gap: 20px;
        padding: 20px 40px;
        width: 320px;
        font-size: 22px;
        font-weight: 600;
        text-decoration: none;
        color: #fff;
        border-radius: 12px;
        transition: all 0.3s ease;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
    }

    .action-btn i {
        font-size: 40px;
    }

    .btn-pdf {
        background: #e74c3c;
    }

    .btn-pdf:hover {
        background: #c0392b;
        transform: translateY(-2px);
    }

    .btn-video {
        background: #2980b9;
    }

    .btn-video:hover {
        background: #1f6391;
        transform: translateY(-2px);
    }
</style>
<div class="row">
    <?php
    $row = $this->student_model->get_student_via_id($this->student_model->studentId())->row();
    // pre($row);
    try {
        $pdfToken = $this->token->encode([
            'student_id' => $row->student_id,
            'course_id' => $row->course_id,
            'file_type' => 'file'
        ]);

        $videoToken = $this->token->encode([
            'student_id' => $row->student_id,
            'course_id' => $row->course_id,
            'file_type' => 'youtube'
        ]);
        echo '
            <div class="col-md-5">

            ';

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
                    <h1>Study Material</h1>
                </div>
                <!--end::Car Title-->
            </div>
            <!--end:: Card header-->
            <!--begin:: Card body-->
            <div class="card-body p-9 ribbon ribbon-end ribbon-clip">

                <div class="fs-1 fw-bolder text-primary">
                    {student_name}
                </div>
                <!--begin::Name-->
                <div class="fs-3 fw-bold text-gray-900">
                    {course_name} </div>
                <!--end::Name-->
                <!--begin::Description-->
                <p class="text-gray-500 fw-semibold fs-5 mt-1 mb-7">
                    {duration} {duration_type} </p>
                <!--end::Description-->
                <!--begin::Info-->
                <div class="d-flex flex-wrap mb-5">
                    <!--begin::Budget-->
                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3 me-7">
                        <div class="fs-6 text-gray-800 fw-bold">
                            {roll_no}
                        </div>
                        <div class="fw-semibold text-gray-500">Enrollment No</div>
                    </div>
                    <!--end::Budget-->
                </div>
                <!--end::Info-->
            </div>
            <div class="card-footer p-3" align="center">

                <div class="btn-container">
                    <!-- PDF Button -->
                    <a href="{base_url}student/course-study-material/<?=$pdfToken?>" target="_blank" class="action-btn btn-pdf">
                        <i class="fas fa-file-pdf text-white"></i>
                        <span>Read PDF</span>
                    </a>

                    <!-- Video Button -->
                    <a href="{base_url}student/course-study-material/<?=$videoToken?>" class="action-btn btn-video">
                        <i class="fas fa-play-circle text-white"></i>
                        <span>Watch Video</span>
                    </a>
                </div>
            </div>
        </div>
        <?php
        /*
                echo
                    '


                    <div class="card border-success">
                            <div class="card-header border-success">
                                  <div class="card-title">' . $row->course_name . '</div>
                                  <div class="card-toolbar">' . humnize_duration($row->duration, $row->duration_type) . '</div>

                          </div>
                          <div class="card-footer d-flex ">
                            ';
                echo '
                            <a href="{base_url}student/course-study-material/' . $pdfToken . '" class="btn me-2 publish-btn btn btn-outline btn-outline-dashed btn-outline-primary btn-active-light-primary  pulse pulse-primary rounded hover-elevate-uppublish-btn btn btn-outline btn-outline-dashed btn-outline-primary btn-active-light-primary  pulse pulse-primary rounded hover-elevate-up "><i class="fa text-danger fa-file-pdf me-2"></i> PDF File(s)</a>
                            <a href="{base_url}student/course-study-material/' . $videoToken . '" class="btn publish-btn btn btn-outline btn-outline-dashed btn-outline-primary btn-active-light-primary  pulse pulse-primary rounded hover-elevate-uppublish-btn btn btn-outline btn-outline-dashed btn-outline-primary btn-active-light-primary  pulse pulse-primary rounded hover-elevate-up "><i class="fab text-danger fa-youtube me-2"></i> Video Lecture(s)</a>
                                ';
                echo '
                          </div>
                        </div>';
                        */
        echo '
            </div>
            ';
    } catch (Exception $e) {
    }

    echo '</div>';

    ?>

    <?php


    /*
    if ($list->num_rows()) {

        foreach ($list->result() as $row) {
            $getCourse = $this->db->where('id', $row->course_id)->get('course');
            if ($getCourse->num_rows()) {
                $courseRow = $getCourse->row();
                echo '<div class="row mb-3">
                <div class="col-md-12">
                    <div class="{card_class}">
                        <div class="card-header">
                            <h3 class="card-title">' . $courseRow->course_name . ' ( ' . $courseRow->duration . ' ' . $courseRow->duration_type . ')</h3>
                        </div>
                        <div class="card-body">';
                $studyMaterial = $this->db->where('course_id', $row->course_id)->get('study_material');
                if ($studyMaterial->num_rows()) {
                    echo '
                            <div class="table-responsive">
                                <table class="table align-middle table-row-dashed">
                                    <thead>
                                        <tr class="text-start text-gray-500 fw-bold text-uppercase gs-0">
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
                        $i =1 ;
                    foreach ($studyMaterial->result() as $study) {
                        $token = $this->token->encode([
                            'id' => $study->material_id,
                            'student_id' => $login_id
                        ]);
                        echo '<tr data-time="' . $study->material_id . '">
                                    <td>' .$i++ . '.</td>
                                    <td>' . $study->title . '</td>
                                    <td>' . $study->description . '</td>
                                    <td>
                                        <a href="{base_url}student/study-material/'.$token.'" class="btn btn-primary"><i class="fa fa-eye"></i> View</a>
                                    </td>
                                </tr>';
                    }



                    echo '                      </tbody>
                                </table>
                            </div>
                        ';
                }
                else
                    echo alert('Study Material Not Found..','danger');
                echo '</div>
                    </div>
                </div>
            </div>';
            }
        }
    } else {
        echo $this->ki_theme->item_not_found('Not Found', 'Study Material not found.');
    }
    */
    ?>