<?php
$student_row = $this->student_model->get_student_via_id($this->student_model->studentId())->row();
$tokenData = [
    'student_id' => $student_row->student_id,
    'course_id' => $student_row->course_id,
    'file_type' => 'youtube'
];
$data = $this->db->select('c.duration,c.duration_type,sm.*')
    ->from('study_material as sm')
    ->join('course as c', 'c.id = sm.course_id AND c.id = ' . $course_id)
    // ->where('sm.student_id',$student_id)
    ->order_by('sm.title', 'ASC')
    ->where('sm.file_type', $file_type)
    ->get();
if ($file_type == 'youtube') {
    // pre($this->token->data());
    $material_id = $this->token->data('id');
    $material_id = $material_id ? $material_id : ($data->row() ? $data->row()->material_id : null);
    ?>
    <!-- Plyr CSS -->
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />

    <style>
        .video-title {
            margin-top: 10px;
            font-size: 18px;
            font-weight: bold;
        }

        .sidebar {
            flex: 1.2;
            /* background-color: white; */
            padding: 15px;
            border-radius: 10px;
            max-height: 85vh;
            overflow-y: auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .sidebar h3 {
            margin-top: 0;
            font-size: 18px;
        }

        .course-item {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            gap: 10px;
            cursor: pointer;
            transition: background 0.2s;
            padding: 8px;
            border-radius: 6px;
        }

        .course-item:hover,
        .course-item.active {
            background-color: #f0f0f0;
        }

        .course-item img {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 4px;
        }

        .course-item span {
            font-size: 14px;
            font-weight: 500;
        }

        h1 {
            text-align: center;
            padding-top: 20px;
            font-size: 24px;
            text-transform: uppercase;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .sidebar {
                max-height: none;
            }
        }

        .ytp-pause-overlay {
            display: none !important;
        }

        .ytp-pause-overlay-controls-hidden .ytp-pause-overlay {
            bottom: -195px !important;
            display: none !important;
        }

        .plyr__video-embed iframe::after {
            display: none !important;
        }

        .plyr .plyr__video-embed iframe,
        .plyr__tooltip {
            pointer-events: none;
        }
    </style>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{course_name}</h3>
                </div>
                <div class="card-body <?= $material_id ? 'p-0' : '' ?>">

                    <div class="video-box">
                        <?php
                        if ($material_id) {
                            $videoRow = $this->db->where('material_id', $material_id)->get('study_material')->row();
                            $id = getYouTubeId($videoRow->file);
                            ?>
                            <div style="position: relative;">

                                <div id="player" data-plyr-provider="youtube" data-plyr-embed-id="<?= $id ?>"></div>
                                <div class="" id="watermark" style="bottom: 40px; left: 20px;position:absolute;">
                                    <img src="<?= logo() ?>" alt="BCCEI" class="w-10 sm:w-16 md:w-20 lg:w-24 xl:w-28 h-auto"
                                        style="
                                width: 85px;
                                opacity: 0.4;
                            ">
                                </div>
                            </div>

                        <?php } else {
                            echo alert('Please select a video from the right side list.', 'info');
                        }
                        ?>
                    </div>
                </div>
                <div class="card-header">
                    <?php
                    if ($material_id)
                        echo '<h1 class="card-title">' . $videoRow->title . '</h1>';
                    ?>
                </div>
                <div class="card-body">
                    <?php
                    if ($material_id)
                        echo $videoRow->description;
                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Course Contents</h3>
                </div>
                <div class="card-body p-0">
                    <?php
                    if ($data->num_rows() > 0) {
                        foreach ($data->result() as $row) {
                            $id = getYouTubeId($row->file);
                            $videoToken = $this->token->encode($tokenData + [
                                'id' => $row->material_id
                            ]);
                            ?>
                            <a href="{base_url}student/course-study-material/<?= $videoToken ?>"
                                class="course-item <?= $material_id == $row->material_id ? 'active' : '' ?>">
                                <img src="<?= getYouTubeThumbnail($id) ?>" alt="">
                                <span><?= $row->title ?></span>
                            </a>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- <h1>Digital Marketing</h1> -->
    <!-- Plyr JS -->
    <script src="https://cdn.plyr.io/3.7.8/plyr.polyfilled.js"></script>
    <script>
        // const player = new Plyr('#player', {
        //     controls: ['play', 'progress', 'mute', 'volume', 'fullscreen'],
        //     youtube: {
        //         rel: 0,
        //         modestbranding: 1,
        //         noCookie: true,
        //         iv_load_policy: 3
        //     }
        // });
        // player.on('ended', () => {
        //     // Hide the player when video ends
        //     document.getElementById('player').style.display = 'none';

        //     // Show custom message or image
        //     document.getElementById('custom-end-screen').style.display = 'block';
        // });
        const player = new Plyr('#player', {
            controls: ['play', 'progress', 'mute', 'volume', 'fullscreen'],
            youtube: {
                rel: 0,
                modestbranding: 1,
                noCookie: true,
                iv_load_policy: 3,
                showinfo: 0,
            }
        });

        player.on('ended', () => {
            // On video end, hide iframe or reset it so related video overlay na dikhai de
            document.querySelector('#player iframe').style.display = 'none';
        });
        // Also for pause if you want
        player.on('pause', () => {
            document.querySelector('#player iframe').style.visibility = 'hidden';
        });
        player.on('play', () => {
            document.querySelector('#player iframe').style.visibility = 'visible';
        });

        const overlay = document.getElementById("watermark");
        document.querySelector(".plyr").append(overlay);

        document.addEventListener('contextmenu', event => event.preventDefault());

        // Disable double-click on player
        const playerElement = document.getElementById('player');
        playerElement.addEventListener('dblclick', event => {
            event.preventDefault();
            event.stopPropagation();
        });
        playerElement.addEventListener('click', event => {
            event.preventDefault();
            event.stopPropagation();
        });

        console.log(document.querySelector("iframe"));
    </script>
    </body>

    </html>

    <?php
} else {

    ?>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <?= $file_type == 'file' ? '<i class="fa text-danger fa-file-pdf me-2"></i> PDF File' : '<i class="fab text-danger fa-youtube me-2"></i> Video Lecture' ?>(s)
                    </h3>
                    <div class="ms-auto">
                        <div class="input-icon mt-3">
                            <!-- <input type="text" id="search-study" class="form-control" placeholder="Search…"
                                autocomplete="off"> -->

                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <?php

                    // echo $this->db->last_query();
                    if ($data->num_rows() > 0) {
                        echo '<div class="table-responsive">';
                        echo '<table class="table table-bordered table-striped">';
                        echo '<thead><tr><th>#</th><th>Title</th><th>Description</th><th>Action</th></tr></thead>';
                        echo '<tbody>';
                         $i = 1;
                        foreach ($data->result() as $row) {
                            $token = $this->token->encode([
                                'id' => $row->material_id,
                                'student_id' => $student_id
                            ]);
                            echo '<tr>';
                            echo '<td>' . $i . '.</td>';
                            echo '<td>' . $row->title . '</td>
                                  <td>' . $row->description . '</td>
                                  <td>
                                    <a href="{base_url}student/study-material/' . $token . '" target="_blank" class="btn btn-success btn-sm"><i class="fa fa-eye me-2"></i><i>Read Now</i></a>
                                  </td>';
                            echo '</tr>';
                                    $i++;

                            /*
                            echo '<div class="col-md-4">
                                <div class="card" data-text="' . strip_tags($row->title) . ' ' . strip_tags($row->description) . '">';
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
                            if ($file_type == 'file' && !file_exists('upload/study-mat/' . $row->file)) {
                                echo label('This file is not not available.', 'danger');
                            } else {
                                echo '<a href="{base_url}student/study-material/' . $token . '" target="_blank" class="btn btn-success btn-sm"><i class="fa fa-eye me-2"></i><i>Read Now</i></a>';
                            }
                            echo '</div>
                                </div>
                            </div>';
                            */
                        }
                        echo '</tbody>';
                        echo '</table>';
                        echo '</div>';
                    } else {
                        $message = $file_type == 'file' ? '<i class="fa text-danger fa-file-pdf me-2"></i> PDF File' : '<i class="fab text-danger fa-youtube me-2"></i> Video Lecture';
                        echo alert("$message(s) not found..", 'danger');
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>