<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{student_name} Card</title>
    <!-- <link href="{base_url}assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" /> -->
    <!-- <link href="{base_url}assets/css/style.bundle.css" rel="stylesheet" type="text/css" /> -->
    {basic_header_link}
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;

            font-weight: bold;
        }

        .text-capitlize {
            text-transform: capitalize;
        }

        .position-relative {
            position: relative;
        }

        .position-absolute {
            position: absolute;
            text-align: center;
        }

        .w-100 {
            width: 100%;
        }

        td,
        p {
            font-weight: bold;
            color: black;
            font-size: 15px;
            /* text-transform: capitalize; */
            /* background-color: black; */
        }

        #photo {
            z-index: 999;
            top: 22.4%;
            left: 75%;
        }

        .test {
            border: 1px solid red
        }
        table {
            border-collapse: collapse;
        }
    </style>
</head>

<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/admit-card.jpg">
    <div class="position-absolute" id="photo">
        <img src="upload/{image}" style="width:119.8px;height:155px">
    </div>

    <!-- <p class="position-absolute" style="top:16.5%;left:80%">{createdOn}</p>
    <p class="position-absolute" style="top:16.5%;left:17%">{admit_card_id}</p>
    <p class="position-absolute" style="top:1.5%;left:16%">{session}</p> -->

    <p class="position-absolute " style="top:20.2%;left:35%;width:60%;text-align:left">{roll_no}</p>
    <p class="position-absolute" style="top:22.3%;left:35%">{student_name}</p>
    <p class="position-absolute" style="top:24.4%;left:35%">{father_name}</p>
    <p class="position-absolute" style="top:26.5%;left:35%">{mother_name}</p>
    <p class="position-absolute" style="top:28.6%;left:35%">{dob}</p>
    <p class="position-absolute text-capitlize" style="top:30.7%;left:35%">{gender}</p>
    <p class="position-absolute" style="top:32.9%;left:35%;width:100px;text-align:left">{category}</p>


    <?php
    $sign = '';
    if($student_docs){
        $docs = (json_decode($student_docs,true));
        if(isset($docs['signature'])){
            $sign = $docs['signature'];
            if(file_exists('upload/'.$sign.'')){
                echo '
                <div class="position-absolute" style="top:36.7%;left:74%;">
                    <img src="upload/'.$sign.'" style="width:150px;height:37px">
                </div>
                
                ';
            }
        }
    }
    $where = [
        'course_id' => $course_id,
        'duration' => $admit_card_duration,
        'duration_type' => $duration_type,
        'student_id' => $student_id
    ];
    $get = $this->student_model->get_switch('admit_card_schedule', $where);

    if ($get->num_rows()) {
        $row = $get->row();
        // pre($row);
        $subjects = $this->db->select('s.*,acs.date,acs.time')
            ->from('subjects as s')
            ->join('admit_cards_subjects as acs', 'acs.subject_id = s.id AND acs.admit_session_id = ' . $row->admit_session_id)
            ->get();
        ?>
        <p class="position-absolute text-capitlize" style="top:39%;left:19%"><?= $row->centre_name ?></p>

        <div class="position-absolute " style="top:42.5%;left:6.5%;width:87%">
            <table id="first" border="1" style="width:100%">
                <thead>
                    <tr>
                        <th>Sr. No.</th>
                        <th>Subject</th>
                        <th>Subject Code</th>
                        <th>Date</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    if ($subjects->num_rows()) {
                        foreach ($subjects->result() as $srow) {
                            // pre($srow);
                            echo '<tr>
                                    <td>' . $i++ . '.</td>
                                    <td>' . $srow->subject_name . '</td>
                                    <td>' . $srow->subject_code . '</td>
                                    <td>' . $srow->date . '</td>
                                    <td>' . date('h:i A', strtotime($srow->time)) . '</td>
                                </tr>';
                        }
                    }
                    ?>

                </tbody>
            </table>
        </div>
        <?php
    }
    $this->ki_theme->generate_qr($admit_card_id, 'admit_card', current_url());
    ?>
    <div class="position-absolute" style="top:83.8%;left:81.5%;">
        <img style="width:105px;height:106px" src="upload/images/admit_card_{admit_card_id}.png" alt="">
    </div>
</body>

</html>