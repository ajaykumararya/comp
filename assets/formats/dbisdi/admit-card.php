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
        }

        .w-100 {
            width: 100%;
        }

        td,
        p {
            font-weight: bold;
            color: black;
            font-size: 14px;
            line-height: 1.815;
        }

        #photo {
            z-index: 999;
            top: 28.5%;
            left: 79.2%;
        }

        .test {
            border: 1px solid red
        }
        table th:nth-child(1),
        table,
        tfoot tr {
            border: 1px solid black;
            text-align: center;
            /* font-weight: bold; */
            padding: 0;
            margin: 0;
            line-height: 0 !important;
        }
        .fw {
            font-weight: bold;
        }
        table tr:nth-child(1) {
            padding: 0 !important;
            margin: 0 !important;
            line-height: 0 !important;
        }
        .b-tb {
            border-top: 1xp solid black;
            border-bottom: 1px solid black;
        }
        .rmrb {
            border-right: 0px !important
        }
        .rmb {
            border-left: 0px solid transparent !important;
        }
        .lb {
            border-left: 1px solid black;
        }
        table head tr th {
            color: #0651a4 !important;
        }
        table tr td {
            line-height: 1.6;
        }
        table {
            border-collapse: collapse;
        }
    </style>
</head>

<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/admit-card.jpg">
    <div class="position-absolute" id="photo">
        <img src="upload/{image}" style="width:85px;height:110px;border:2px solid #017ba4">
    </div>
    <!-- <p class="position-absolute" style="top:92.3%;left:20%;font-size:12px">NEW DELHI</p> -->
    <!-- <p class="position-absolute" style="top:94%;left:20%;font-size:12px">{createdOn}</p> -->
    <!-- <p class="position-absolute" style="top:1%;left:16%">{admit_card_id}</p> -->

    <p class="position-absolute" style="top:24.5%;left:82.6%">{enrollment_no}</p>
    <p class="position-absolute " style="top:24.5%;left:24.5%;width:130px">{roll_no}</p>
    <!-- <p class="position-absolute " style="top:24,2%;left:82%;width:130px"><?=humnize_duration_with_ordinal($admit_card_duration,$duration_type)?></p> -->
    <!-- < -->
    <p class="position-absolute" style="top:26.8%;left:24.4%">{student_name}</p>
    <p class="position-absolute" style="top:28.9%;left:24.4%">{father_name}</p>
    <p class="position-absolute" style="top:31%;left:24.4%">{dob}</p>
    <p class="position-absolute" style="top:33.1%;left:24.4%">{course_name}</p>
    <!-- <p class="position-absolute" style="top:34.1%;left:24.4%">{mother_name}</p> -->
    <!-- <p class="position-absolute text-capitlize" style="top:36.6%;left:64%">{gender}</p> -->
    <p class="position-absolute" style="top:37.3%;left:24.4%">{session}</p>
    <?php
    $where = [
        'course_id' => $course_id,
        'duration' => $admit_card_duration,
        'duration_type' => $duration_type,
        'student_id' => $student_id
        // 'center_id' => $center_id
    ];
    $get = $this->student_model->get_switch('admit_card_schedule', $where);
    // echo $this->db->last_query();
    if ($get->num_rows()) {
        $row = $get->row();
        // pre($row);
        $subjects = $this->db->select('s.*,acs.date,acs.time')
                ->from('subjects as s')
                ->join('admit_cards_subjects as acs','acs.subject_id = s.id AND acs.admit_session_id = '.$row->admit_session_id)
                ->get();
        ?>
        <p class="position-absolute text-capitlize" style="top:35.2%;left:24.4%"><?= $row->centre_name ?></p>
        <!-- <p class="position-absolute" style="top:41.5%;left:24.4%"><?= $row->centre_code ?></p> -->
        <!-- <p class="position-absolute" style="top:43.8%;left:24.4%"><?= $row->centre_address ?></p> -->
        <div class="position-absolute " style="top:46%;left:6.5%;width:87%">
            <table id="first" border="1" style="width:100%">
                <thead>
                    <tr>
                        <th style="width: 80px;">Sr. No.</th>
                        <th>Subject</th>
                        <th>Subject Code</th>
                        <th>Date</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    if($subjects->num_rows()){
                        foreach($subjects->result() as $srow){
                            // pre($srow);
                            echo '<tr>
                                    <td>'.$i++.'.</td>
                                    <td>'.$srow->subject_name.'</td>
                                    <td>'.$srow->subject_code.'</td>
                                    <td>'.$srow->date.'</td>
                                    <td>'.date('h:i A',strtotime($srow->time)).'</td>
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
    <div class="position-absolute" style="top:86.1%;left:45.9%">
        <img style="width:60px;" src="upload/images/admit_card_{admit_card_id}.png" alt="">
    </div>
</body>

</html>