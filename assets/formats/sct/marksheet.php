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
    <!-- <p class="position-absolute" style="top:2.5%;left:20.3%;width:120px">{serial_no}</p> -->
    <p class="position-absolute" style="top:26.7%;left:6%;width:170px">{roll_no}</p>
    <p class="position-absolute" style="top:26.7%;left:28%;width:170px">{enrollment_no}</p>

    <p class="position-absolute" style="top:26.7%;left:50%;width:175px">{center_code}</p>
    <p class="position-absolute " style="top:26.7%;left:72%;width:175px">{issue_date}</p>
    <!-- <p class="position-absolute" style="top:17%;right:15%;font-size:12px">{enrollment_no}</p> -->
    <p class="position-absolute" style="top:31.5%;left:36%;">{student_name}</p>
    <p class="position-absolute" style="top:34.3%;left:36%;">{mother_name}</p>
    <p class="position-absolute " style="top:36.8%;left:36%">{father_name}</p>
    <p class="position-absolute" style="top:39.6%;left:36%;line-height:1">{course_name}</p>
    <!-- <p class="position-absolute " style="top:35.3%;left:36.5%">{center_name}</p> -->
    <!-- <p class="position-absolute text-capitlize" style="top:68.5%;left: 51.3%;width:140px">{marksheet_duration} {duration_type}</p> -->
    <!-- <p class="position-absolute " style="top:39.6%;left:36.5%">{dob}</p> -->
    <div class="position-absolute" style="bottom:6.3%;left:8.4%;">
        <img src="upload/images/marksheet_{result_id}.png" style="width:90px;height:90px;" alt="">
    </div>
    <div class="position-absolute " style="top:48.7%;left:6%;width:88%">
        <table id="first" style="width:100%">

            <tbody>
                <?php
                $total = 0;
                $maxTotal = 0;
                $minTotal = 0;
                foreach ($marks as $mark) {
                    $total += (float) $mark['theory_total'];
                    $maxTotal += (float) $mark['theory_max_marks'];
                    $minTotal += (float) $mark['theory_min_marks'];
                    echo $this->parser->parse_string('
                                    <tr>
                                        <td style="width:90px">{subject_code}</td>
                                        <td class="primary lb" style="text-align:left;padding-left:15px;font-size:12.81px;width:400px">{subject_name}
                                        </td>
                                        <td class="primary lb" style="font-size:12.81px;width:62px">{theory_max_marks}</td>
                                        <td class="primary lb" style="font-size:12.81px;width:80px">{theory_min_marks}</td>
                                        <td class="lb fw" style="font-size:12.819px">{theory_total}</td>
                                    </tr>', $mark, true);
                }
                ?>
            </tbody>
        </table>
    </div>
    <p class="position-absolute" style="bottom:17.5%;left:23%;font-size:15px;width:50px"><?= $minTotal ?></p>
    <p class="position-absolute" style="bottom:17.5%;left:50%;font-size:15px;width:50px"><?= $maxTotal ?></p>
    <p class="position-absolute" style="bottom:17.5%;left:79%;font-size:15px;width:50px"><?= $total ?></p>
    <p class="position-absolute" style="bottom:16.5%;left:86%;font-size:15px;width:70"><?php
    $percentage = (($total / ($minTotal + $maxTotal)) * 100);
    echo $percentage > 35 ? 'PASS' : 'FAIL';
    ?></p>

</body>

</html>