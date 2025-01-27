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
            <div class="card border-success">
                    <div class="card-header border-success">
                          <div class="card-title">' . $row->course_name . '</div>
                          <div class="card-toolbar">' . humnize_duration($row->duration, $row->duration_type) . '</div>
                        
                  </div>
                  <div class="card-footer d-flex ">
                    ';
                        echo '
                    <a href="{base_url}student/course-study-material/'.$pdfToken.'" class="btn me-2 btn-success "><i class="fa text-danger fa-file-pdf me-2"></i> PDF File(s)</a>
                    <a href="{base_url}student/course-study-material/'.$videoToken.'" class="btn btn-success "><i class="fab text-danger fa-youtube me-2"></i> Video Lecture(s)</a>
                        ';
                    echo '
                  </div>
                </div>
            </div>
            ';
              } catch (Exception $e) {
              }

    echo '</div>';




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