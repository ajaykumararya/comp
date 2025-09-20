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
            text-align: center;
        }

        .w-100 {
            width: 100%;
            display: grid;
        }

        p {
            font-weight: bold;
            color: black;
            font-size: 12px;
            display: inline-block;
            /* word-spacing: 1px; */
        }

        #photo {
            z-index: 999;
            top: 24.5%;
            left: 7%;
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

        .test {
            border: 1px solid red
        }
    </style>
</head>

<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/marksheet.jpg">
    <div class="position-absolute" id="photo">
        <img src="upload/images/marksheet_{result_id}.png" style="width:75px;height:75px">
    </div>
    <?php
    $course_name = 'Diploma in Community Medical Service & Essential Drugs';
    $fontSize = strlen($course_name) > 50 ? 18 : 20; 
    ?>
    <p class="position-absolute" style="top:2.6%;left:11%;width:120px">{serial_no}</p>
    <p class="position-absolute" style="top:34.5%;left:76%;width:120px;text-align:left">{enrollment_no}</p>
    <p class="position-absolute " style="top:33%;left:76%;width:120px;text-align:left">{roll_no}</p>
    <p class="position-absolute" style="top:33%;left:30%;width:255px;text-align:left">{student_name}</p>
    <p class="position-absolute" style="top:34.7%;left:30%;width:255px;text-align:left">{father_name}</p>
    <p class="position-absolute" style="top:36.3%;left:30%;width:255px;text-align:left">{mother_name}</p>
    <p class="position-absolute" style="top:28%;left:17%;width:540px;line-height:1;font-size:<?=$fontSize?>px">{course_name}</p>
    <?php
    $myduration = humnize_duration_with_ordinal($marksheet_duration, $duration_type);
    ?>
    <p class="position-absolute " style="text-align:left;top:31.3%;left:53%;width:500px;line-height:1;font-size:14px">
        <?= $myduration ?> - {session}</p>

    <!-- <p class="position-absolute" style="top:39.4%;left:50%;width:100px"><?= date('M Y', strtotime($issue_date)) ?></p> -->
    <p class="position-absolute" style="top:37.9%;left:30%;width:60%;line-height:1;text-align:left">{center_name}</p>
    <!-- <p class="position-absolute " style="top:31.1%;left:36.5%">{mother_name}</p> -->
    <!-- <p class="position-absolute " style="top:35.3%;left:36.5%">{center_name}</p> -->
    <p class="position-absolute" style="top:36%;left:76%;width:120px;text-align:left"><?= $myduration ?></p>
    <!-- <p class="position-absolute " style="top:39.6%;left:36.5%">{dob}</p> -->
    <div class="position-absolute" style="top:25.96%;left:86.1%;">
        <img src="upload/{image}" style="width:48.1px;height:57px;" alt="">
    </div>
    <div class="position-absolute " style="top:42%;left:8%;width:84%">
        <table id="first" border="0" style="width:100%">
            <thead>
                <tr>
                    <th class="primary" rowspan="2" width="18%">CODE</th>
                    <th class="primary lb b-tb" rowspan="2" width="36%" style="text-align:left;padding-left:35px">
                        SUBJECTS</th>
                    <th class="primary lb" colspan="2" style="font-size:11px;padding:4px">MAXIMUM MARKS</th>
                    <th class="primary lb" colspan="2" style="font-size:11px;padding:4px">OBTAINED MARKS</th>
                    <th class="primary lb b-tb" rowspan="2" style="font-size:11px;padding:4px">TOTAL </th>
                </tr>
                <tr>
                    <th class="primary b-tb lb" style="font-size:11px">THEORY</th>
                    <th class="primary b-tb" style="font-size:11px">PRACTICAL</th>
                    <th class="primary b-tb lb" style="font-size:11px">THEORY</th>
                    <th class="primary b-tb" style="font-size:11px">PRACTICAL</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // pre(getMark($marks);
                foreach($marks as $mark):

                ?>
                <tr>
                    <td class="primary lb"><?=getMark($mark['subject_code'])?></td>
                    <td class="primary lb" style="text-align:left;padding-left:6px;font-size:12.81px"><?=getMark($mark['subject_name'])?>
                    </td>
                    <td class="primary lb" style="font-size:12.81px"><?=getMark($mark['theory_max_marks'])?></td>
                    <td class="primary lb" style="font-size:12.81px"><?=getMark($mark['practical_max_marks'])?></td>
                    <td class="primary lb" style="font-size:12.81px"><?=getMark($mark['theory_total'])?></td>
                    <td class="primary lb" style="font-size:12.81px"><?=getMark($mark['practical_total'])?></td>
                    <td class="fw lb" style="font-size:12.81px"><?=getMark($mark['total'])?></td>
                </tr>
                <?php
                endforeach;
                ?>
            </tbody>
            <tfoot>
                <tr class="fw">
                    <td class="primary fw" colspan="2" style="font-size:12.81px">TOTAL</td>
                    <!-- <td class="primary lb fw" style="font-size:12.81px">{total_max_theory}</td>                    
                    <td class="primary lb fw" style="font-size:12.81px">{total_max_theory}</td> -->
                    <!-- <td class="primary lb fw" style="font-size:12.81px"></td>                     -->
                    <td class="primary lb fw" colspan="2" style="font-size:12.81px">{total}</td>
                    <td class="fw lb" style="font-size:12.81px"></td>
                    <td></td>
                    <td class="fw" style="font-size:12.81px">{obtain_total}</td>
                </tr>
            </tfoot>
        </table>
    </div>

    <?php
    function getMark($num)
    {
        if ($num == '00' or !$num)
            return '--';
        return $num;
    }
    ?>
    <!-- <p class="position-absolute" style="bottom:27%;left:69%;width:67px;font-size:15px">{division}</p> -->
    <!-- <p class="position-absolute" style="bottom:15.6%;left:77%;width:68px;font-size:15px">{grade}</p> -->
    <p class="position-absolute " style="bottom:28.1%;width:108px;left:21%;text-align:left">{grade}
        (<?= $percentage >= 33 ? 'PASS' : 'FAIL' ?>)</p>
    <p class="position-absolute " style="bottom:29.9%;left:33%;width:467px;line-height:1;text-align:left">
        <?= numberToWords($obtain_total) ?></p>
    <p class="position-absolute " style="bottom:20.7%;left:20%;width:138px;text-align:left">Lucknow</p>
    <p class="position-absolute" style="bottom:22.2%;left:20%;width:138px;text-align:left">{issue_date}</p>

</body>

</html>
