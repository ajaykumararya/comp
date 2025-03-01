<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{student_name} Marksheet</title>
    {basic_header_link}
    <link href="https://fonts.cdnfonts.com/css/letter-gothic-std-2" rel="stylesheet">
    <style>
        body {
            font-family: "lettergothic", sans-serif !important;
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
            font-size: 14px;
            display: inline-block;
            /* word-spacing: 1px; */
        }

        #photo {
            z-index: 999;
            top: 21.68%;
            left: 77%;
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
            border: 1px solid transparent;
            text-align: center;
            /* font-weight: bold; */
            padding: 0;
            margin: 0;
            line-height: 0 !important;
        }

        .fw {
            font-weight: bold;
        }



        table tr td {
            line-height: 1.6;
        }

        table {
            border-collapse: collapse;
            border: none
        }

        .test {
            border: 1px solid red
        }

        .t-u {
            text-transform: uppercase
        }

        table td,
        table th {
            /* border: 1px solid black; */
        }
    </style>
</head>

<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/marksheet.jpg">
    <!-- <div class="position-absolute" id="photo">
        <img src="upload/{image}" style="width:73.3px;height:96px">
    </div> -->
    <p class="position-absolute" style="top:3.8%;left:80.3%;width:120px">{serial_no}</p>
    <p class="position-absolute " style="top:33%;left:82.5%;width:110px;text-align:left">{enrollment_no}</p>
    <p class="position-absolute " style="top:36%;left:82.5%;width:110px;text-align:left">{roll_no}</p>

    <!-- <p class="position-absolute" style="top:26.7%;left:50%;width:175px">{center_code}</p>-->
    <p class="position-absolute " style="top:82%;left:12%;width:175px">{issue_date}</p>
    <!-- <p class="position-absolute" style="top:17%;right:15%;font-size:12px">{enrollment_no}</p> -->
    <p class="position-absolute t-u" style="top:33%;left:30%;">{student_name}</p>
    <p class="position-absolute t-u" style="top:36.3%;left:36%;">{mother_name}</p>
    <p class="position-absolute  t-u" style="top:38.8%;left:36%">{father_name}</p>
    <p class="position-absolute" style="top:41.6%;left:40%;line-height:1">{course_name}</p>
    <!-- <p class="position-absolute " style="top:35.3%;left:36.5%">{center_name}</p> -->
    <p class="position-absolute text-capitlize" style="top:38.5%;left: 82.5%;width:110px;text-align:left">
        <?= numberToFullOrdinal($marksheet_duration) ?> {duration_type}</p>
    <!-- <p class="position-absolute " style="top:39.6%;left:36.5%">{dob}</p> -->
    <div class="position-absolute" style="top:3.1%;left:3.8%;">
        <img src="upload/images/marksheet_{result_id}.png" style="width:90px;height:90px;" alt="">
    </div>
    <div class="position-absolute " style="top:54%;left:6.5%;width:86.5%">
        <table id="first" style="width:100%">

            <tbody>
                <?php
                $total = 0;
                $maxTotal = 0;
                $minTotal = 0;
                foreach ($marks as $mark) {
                    $theory = (float) $mark['theory_total'];
                    $practical = (float) $mark['practical_total'];
                    $markTotal = $theory + $practical;
                    $mark['mark_total'] = $markTotal;
                    $total += $markTotal;
                    $maxTotal += (float) $mark['theory_max_marks'];
                    $minTotal += (float) $mark['practical_max_marks'];
                    $mark['total_max_marks'] = (float) $mark['theory_max_marks'] + (float) $mark['practical_max_marks'];
                    $mark['inword'] = numberToWords($markTotal);
                    echo $this->parser->parse_string('
                                    <tr>
                                        <td style="width:60px;font-size:12.81px">{subject_code}</td>
                                        <td class="primary lb" style="text-align:left;padding-left:5px;font-size:12.81px;width:178px;line-height:1">{subject_name}
                                        </td>
                                        <td class="primary lb" style="font-size:12.81px;width:60px">{total_max_marks}</td>
                                        <td class="primary lb" style="font-size:12.81px;width:35px">{theory_total}</td>
                                        <td class="primary lb" style="font-size:12.81px;width:35px">{practical_total}</td>
                                        <td class="lb fw" style="font-size:12.819px;width:102px">{mark_total}</td>
                                        <td class="lb fw t-u" style="font-size:12.819px;text-align:left">{inword}</td>
                                    </tr>', $mark, true);
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- <p class="position-absolute" style="bottom:17.5%;left:23%;font-size:15px;width:50px"><?= $minTotal ?></p> -->
    <!-- <p class="position-absolute" style="bottom:17.5%;left:50%;font-size:15px;width:50px"><?= $maxTotal ?></p> -->
    <p class="position-absolute " style="font-weight:300;top:74.3%;left:67%;font-size:18px;width:200px;line-height:1">
        <?= numberToWords($total) ?></p>
    <p class="position-absolute" style="font-weight:300;top:74.3%;left:17%;font-size:18px;width:210px;line-height:1"><?php
    $percentage = (($total / ($minTotal + $maxTotal)) * 100);
    echo $percentage > 35 ? 'PASSED IN FIRST DIVISION' : 'FAIL';
    ?></p>


</body>

</html>