<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{student_name} Marksheet</title>
    {basic_header_link}
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
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
            display: grid;
        }

        p {
            font-weight: bold;
            color: black;
            font-size: 14px;
            display: inline-block;
            /* word-spacing: 1px; */
        }

        #photo {
            top: 27.9%;
            left: 86.2%;
            z-index: 999
        }

        /* table#first {
            color: black;
            font-size: 12px;
            border-collapse: collapse;
        }
        table td,
        table th{
            border : 1px solid black;
            text-align: center;
        } */
        table th:nth-child(1),
        table,
        tfoot tr {
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
            border: 1px;
            padding: 0;
        }

        .test {
            border: 1px solid red
        }
    </style>
</head>

<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/marksheet.jpg">
    <!-- <div class="position-absolute" id="photo">
        <img src="upload/{image}" style="width:76px;height:95px">
    </div> -->





    <p class="position-absolute" style="top:19.2%;left:32%;width:200px">{student_name}</p>
    <p class="position-absolute " style="top:21.6%;left:32%;width:63%">{course_name}</p>
    <p class="position-absolute" style="top:24.2%;left:32%;width:150px"><?= humnize_duration($duration, $duration_type) ?>
    </p>

    <p class="position-absolute" style="top:26.8%;left:32%;width:200px">{roll_no}</p>
    <p class="position-absolute" style="top:29.5%;left:32%;width:150px">{enrollment_no}</p>

    <p class="position-absolute" style="top:31.9%;left:32%;width:200px">{session}</p>
    <!-- <p class="position-absolute" style="top:41.7%;left:34%;width:200px">{mother_name}</p> -->
    <!-- <p class="position-absolute " style="top:41.7%;left:80%;width:150px"><?= humnize_duration_with_ordinal($marksheet_duration, $duration_type) ?></p> -->

    <p class="position-absolute " style="top:34.5%;left:32%;width:63%">{center_name}</p>

    <!-- <div class="position-absolute" style="z-index: 999;top: 83.8%;left: 6.1%;">
        <img src="upload/images/marksheet_{result_id}.png" style="width: 70px" alt="">
    </div> -->
    <div class="position-absolute " style="top:55%;left:7.5%;width:85%;">
        <table id="first1" style="width:100%">

            <tbody>
                <?php
                $theoryMaxtotal = $practicalMaxTotal = $theoryTotal = $practicalTotal = 0;
                foreach ($marks as $mark) {
                    $theoryMaxtotal += $mark['theory_max_marks'];
                    $practicalMaxTotal += $mark['practical_max_marks'];
                    $theoryTotal += $mark['theory_total'];
                    $practicalTotal += $mark['practical_total'];
                    echo '<tr>
                        <td style="text-align:left;width:360px">' . $mark['subject_name'] . '</td>
                        <td style="width:50px">' . $mark['theory_max_marks'] . '</td>
                        <td style="width:64px">' . $mark['theory_total'] . '</td>
                        <td style="width:42px">' . $mark['practical_max_marks'] . '</td>
                        <td style="width:62px">' . $mark['practical_total'] . '</td>
                        <td>' . ($mark['theory_total'] + $mark['practical_total']) . '</td>
                    </tr>';
                }
                ?>
            </tbody>

        </table>
    </div>
    <p class="position-absolute" style="top:68.5%;width:100px;left:63%"><?= ($theoryMaxtotal + $practicalMaxTotal) ?></p>
    <p class="position-absolute" style="top:68.5%;width:100px;left:85%"><?= ($theoryTotal + $practicalTotal) ?></p>
    <p class="position-absolute" style="top:71.7%;left:40%">{percentage}%</p>
    <p class="position-absolute" style="top:71.7%;left:85%">{grade}</p>
    <!-- <p class="position-absolute" style="top:-0.2%;left:12%;width:200px">{serial_no}</p> -->
    <p class="position-absolute" style="top:75%;left:21%;">{issue_date}</p>
</body>

</html>
<?php
/*
<tfoot>
                <tr>
                    <th colspan="2">Total</th>
                    <th><?= $theoryMaxtotal ?></th>
                    <th><?= $theoryTotal ?></th>
                    <th><?= $practicalMaxTotal ?></th>
                    <th><?= $practicalTotal ?></th>
                    <th><?= ($theoryMaxtotal + $practicalMaxTotal) ?></th>
                    <th><?= ($theoryTotal + $practicalTotal) ?></th>
                </tr>
                <tr>
                    <th colspan="3">Result : <?=$percentage > 40 ? 'PASS' : 'FAIL' ?></th>
                    <th colspan="5">Division : <?php
                    switch ($percentage) {
                        case $percentage >= 75:
                            echo 'Distinction';
                            break;
                        case $percentage >= 60:
                            echo 'Fisrt Division';
                            break;
                        case $percentage >= 50:
                            echo 'Second Division';
                            break;
                        case $percentage >= 40:
                            echo 'Pass Class / Third Division';
                            break;
                        default:
                            echo 'Fail';
                            break;
                    }

                    ?></th>
                </tr>

            </tfoot>*/
?>