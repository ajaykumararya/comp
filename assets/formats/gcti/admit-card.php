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
            z-index: 2;
        }

        #photo {
            z-index: 1;
            top: 26.9%;
            left: 81.5%;
            width: 420px !important;
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
        <img src="upload/{image}" style="width:106.5px;height:136px">
    </div>
    <!-- <p class="position-absolute" style="top:1%;left:80%">{createdOn}</p>
    <p class="position-absolute" style="top:1%;left:16%">{admit_card_id}</p> -->

    <p class="position-absolute " style="top:1.9%;left:80.1%;width:130px;font-size:12px">{roll_no}</p>
    <p class="position-absolute " style="top:1.9%;left:20.2%;width:130px;font-size:12px">{enrollment_no}</p>

    <p class="position-absolute" style="top:24.9%;left:25.5%">{student_name}</p>
    <p class="position-absolute" style="top:26.8%;left:25.5%">{father_name}</p>
    <p class="position-absolute" style="top:28.5%;left:25.5%">{mother_name}</p>
    <p class="position-absolute" style="top:30.5%;left:25.5%">{dob}</p>
    <p class="position-absolute" style="top:32.3%;left:25.5%">{course_name}</p>
    <p class="position-absolute" style="top:36.2%;left:25.5%">{session}</p>
    <!-- <p class="position-absolute text-capitlize" style="top:30.5%;left:64%">{gender}</p>
    <p class="position-absolute" style="top:32.8%;left:24.4%">{center_name}</p> -->
    <?php
    $subjects = $this->db->where([
        'course_id' => $course_id,
        'duration' => $admit_card_duration,
        'duration_type' => $duration_type
    ])->order_by('seq','ASC')->get('subjects');
    ?>
    <p class="position-absolute text-capitlize" style="top:34.3%;left:25.5%">{center_name}</p>
    <!-- <p class="position-absolute text-capitlize" style="top:29.5%;left:25.5%">{exam_date}</p> -->
    <div class="position-absolute " style="top:42%;left:6.5%;width:87%">
        <table id="first" border="1" style="width:100%">
            <thead>
                <tr>
                    <th>Sr. No.</th>
                    <th>Subject Code</th>
                    <th>Subject</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($subjects->result() as $subject) {
                    echo '<tr>
                            <td>' . $i++ . '.</td>
                            <td>' . $subject->subject_code . '</td>
                            <td>' . $subject->subject_name . '</td>
                        </tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php

    $this->ki_theme->generate_qr($admit_card_id, 'admit_card', current_url());
    ?>
    <div class="position-absolute" style="top:85%;left:44%">
        <img style="width:92px;" src="upload/images/admit_card_{admit_card_id}.png" alt="">
    </div>
</body>

</html>