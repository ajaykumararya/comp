<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <?= $file_type == 'file' ? '<i class="fa text-danger fa-file-pdf me-2"></i> PDF File' : '<i class="fab text-danger fa-youtube me-2"></i> Video Lecture' ?>(s)
                </h3>
                <div class="ms-auto">
                    <div class="input-icon mt-3">
                        <input type="text" id="search-study" class="form-control" placeholder="Search…" autocomplete="off">
                        
                    </div>
                </div>
            </div>
            <div class="card-body row">
                <?php
                $data = $this->db->select('c.duration,c.duration_type,sm.*')
                    ->from('study_material as sm')
                    ->join('course as c', 'c.id = sm.course_id AND c.id = ' . $course_id)
                    // ->where('sm.student_id',$student_id)
                    ->order_by('sm.title','ASC')
                    ->where('sm.file_type', $file_type)
                    ->get();
                // echo $this->db->last_query();
                if ($data->num_rows() > 0) {
                    foreach ($data->result() as $row) {
                        $token = $this->token->encode([
                            'id' => $row->material_id,
                            'student_id' => $student_id
                        ]);
                        echo '<div class="col-md-4">
                                <div class="card" data-text="'.strip_tags($row->title).' '.strip_tags($row->description).'">';
                        if ($file_type == 'youtube') {
                            $id = getYouTubeId($row->file);
                            $thumb = getYouTubeThumbnail($id);
                            echo '<div class="card-body p-0" style="height:200px;background-image:url(' . $thumb . ');background-size: cover;background-position: center;">
                                    </div>';
                        }
                        echo '<div class="card-body p-2">                             
                                        <h1 class="search-text">' . $row->title . '</h1>
                                        <p class="">' . $row->description . '</p>
                                    </div>
                                    <div class="card-footer text-end">';
                                // echo $file_type;
                                        if($file_type == 'file' && !file_exists('upload/study-mat/'.$row->file)){
                                            echo label('This file is not not available.','danger');
                                        }
                                        else{
                                            echo '<a href="{base_url}student/study-material/' . $token . '" target="_blank" class="btn btn-success btn-sm"><i class="fa fa-eye me-2"></i><i>Read Now</i></a>';
                                    }
                                    echo '</div>
                                </div>
                            </div>';
                    }
                } else {
                    $message = $file_type == 'file' ? '<i class="fa text-danger fa-file-pdf me-2"></i> PDF File' : '<i class="fab text-danger fa-youtube me-2"></i> Video Lecture';
                    echo alert("$message(s) not found..", 'danger');
                }
                ?>
            </div>
        </div>
    </div>
</div>
