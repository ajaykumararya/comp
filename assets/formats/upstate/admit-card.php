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
            top: 22%;
            left: 78.5%;
            width: 120px !important;
            ;
            height: 95px;
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
        <img src="upload/{image}" style="width:115px;height:134px">
    </div>
    <!-- <p class="position-absolute" style="top:1%;left:80%">{createdOn}</p>
    <p class="position-absolute" style="top:1%;left:16%">{admit_card_id}</p> -->

    <p class="position-absolute" style="top:18.1%;left:61.6%">{roll_no}</p>
    <p class="position-absolute " style="top:18.1%;left:24.5%;width:130px">{enrollment_no}</p>
    <p class="position-absolute " style="top:18.1%;left:82%;width:130px"><?=humnize_duration_with_ordinal($admit_card_duration,$duration_type)?></p>
    <p class="position-absolute" style="top:20.5%;left:24.4%">{course_name}</p>
    <p class="position-absolute" style="top:23%;left:24.4%">{student_name}</p>
    <p class="position-absolute" style="top:25.5%;left:24.4%">{father_name}</p>
    <p class="position-absolute" style="top:28%;left:24.4%">{mother_name}</p>
    <p class="position-absolute" style="top:30.5%;left:24.4%">{dob}</p>
    <p class="position-absolute text-capitlize" style="top:30.5%;left:64%">{gender}</p>
    <p class="position-absolute" style="top:32.8%;left:24.4%">{center_name}</p>
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
        <p class="position-absolute text-capitlize" style="top:35.3%;left:24.4%"><?= $row->centre_name ?></p>
        <p class="position-absolute" style="top:37.7%;left:24.4%"><?= $row->centre_code ?></p>
        <p class="position-absolute" style="top:40%;left:24.4%"><?= $row->centre_address ?></p>
        <div class="position-absolute " style="top:48%;left:6.5%;width:87%">
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
    //$this->ki_theme->generate_qr($admit_card_id, 'admit_card', current_url());
    ?>
    <!-- <div class="position-absolute" style="top:67.65%;left:43.54%">
        <img style="width:140px;" src="upload/images/admit_card_{admit_card_id}.png" alt="">
    </div> -->
</body>

</html>