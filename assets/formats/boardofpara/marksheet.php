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
            font-size: 12px;
        }

        .test {
            border: 1px solid red
        }
    </style>
</head>

<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/marksheet.jpg">
    <div class="position-absolute" id="photo">
        <img src="upload/{image}" style="width:76px;height:95px">
    </div>




    <p class="position-absolute" style="top:26.9%;left:52%;width:200px">{session}</p>

    <p class="position-absolute" style="top:37.5%;left:34%;width:200px">{student_name}</p>
    <p class="position-absolute" style="top:37.5%;left:80%;width:150px">{roll_no}</p>

    <p class="position-absolute" style="top:39.35%;left:34%;width:200px">{father_name}</p>
    <p class="position-absolute" style="top:39.35%;left:80%;width:150px">{enrollment_no}</p>

    <p class="position-absolute" style="top:41.3%;left:34%;width:200px">{mother_name}</p>
    <p class="position-absolute text-capitlize" style="top:41.3%;left:80%;width:150px">{marksheet_duration}
        {duration_type}</p>

    <p class="position-absolute " style="top:43.2%;left:34%;width:63%">{course_name}</p>
    <p class="position-absolute " style="top:45.2%;left:34%;width:63%">{center_name}</p>

    <div class="position-absolute" style="z-index: 999;top: 83.8%;left: 6.1%;">
        <img src="upload/images/marksheet_{result_id}.png" style="width: 70px" alt="">
    </div>
    <div class="position-absolute " style="top:50%;left:5%;width:90%">
        <table id="first1" border="1" style="width:100%">
            <thead>
                <tr>
                    <th rowspan="2">S. No.</th>
                    <th rowspan="2" width="42%">Name of Subject</th>
                    <th rowspan="2">Subject Code</th>
                    <th colspan="2">Theory Marks</th>
                    <th colspan="2">Practical Marks</th>
                    <th colspan="2">Total Marks</th>
                </tr>
                <tr>
                    <th class="text-center">Maxi.</th>
                    <th class="text-center">Obt.</th>
                    <th class="text-center">Maxi.</th>
                    <th class="text-center">Obt.</th>
                    <th class="text-center">Maxi.</th>
                    <th class="text-center">Obt.</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                $theoryMaxtotal = $practicalMaxTotal = $theoryTotal = $practicalTotal = 0;
                foreach ($marks as $mark) {
                    $theoryMaxtotal += $mark['theory_max_marks'];
                    $practicalMaxTotal += $mark['practical_max_marks'];
                    $theoryTotal += $mark['theory_total'];
                    $practicalTotal += $mark['practical_total'];
                    echo '<tr>
                        <td>' . $i++ . '.</td>
                        <td style="text-align:left">' . $mark['subject_name'] . '</td>
                        <td>' . $mark['subject_code'] . '</td>
                        <td>' . $mark['theory_max_marks'] . '</td>
                        <td>' . $mark['theory_total'] . '</td>
                        <td>' . $mark['practical_max_marks'] . '</td>
                        <td>' . $mark['practical_total'] . '</td>
                        <td>' . ($mark['theory_max_marks'] + $mark['practical_max_marks']) . '</td>
                        <td>' . ($mark['theory_total'] + $mark['practical_total']) . '</td>
                    </tr>';
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3">Total</th>
                    <th><?= $theoryMaxtotal ?></th>
                    <th><?= $theoryTotal ?></th>
                    <th><?= $practicalMaxTotal ?></th>
                    <th><?= $practicalTotal ?></th>
                    <th><?= ($theoryMaxtotal + $practicalMaxTotal) ?></th>
                    <th><?= ($theoryTotal + $practicalTotal) ?></th>
                </tr>
                <tr>
                    <th colspan="3">Result : <?=$percentage > 40 ? 'PASS' : 'FAIL' ?></th>
                    <th colspan="6">Division : <?php
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

            </tfoot>
        </table>
    </div>
    <p class="position-absolute" style="top:-0.2%;left:12%;width:200px">{serial_no}</p>
    <p class="position-absolute" style="bottom:5.3%;left:19%;font-size:13px">{issue_date}</p>
    <p class="position-absolute" style="bottom:3.6%;left:15%;font-size:13px">New Delhi</p>
</body>

</html>