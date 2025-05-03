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
    <p class="position-absolute " style="top:37.3%;left:6.7%;width:140px">{roll_no}</p>
    <p class="position-absolute " style="top:37.3%;left:24.5%;width:170px">{center_code}</p>

    <p class="position-absolute " style="top:37.3%;left:46.3%;width:110px">{marksheet_type}</p>
    <p class="position-absolute text-capitlize" style="top:37.3%;left:60%;width:115px">{marksheet_duration} {duration_type}</p>
    <p class="position-absolute " style="top:37.3%;left:72%;width:175px">{enrollment_no}</p>

    <!-- <p class="position-absolute" style="top:17%;right:15%;font-size:12px">{enrollment_no}</p> -->
    <p class="position-absolute " style="top:41%;left:49%;">{student_name}</p>
    <p class="position-absolute" style="top:42.7%;left:40%;">{mother_name}</p>
    <p class="position-absolute " style="top:44.6%;left:20%">{father_name}</p>
    <p class="position-absolute " style="top:50.5%;left:23%;line-height:1">{center_name}</p>
    <p class="position-absolute " style="top:52.3%;left:22%;line-height:1">{course_name}</p>
    <!-- <p class="position-absolute " style="top:35.3%;left:36.5%">{center_name}</p> -->
    <!-- <p class="position-absolute text-capitlize" style="top:68.5%;left: 51.3%;width:140px">{marksheet_duration} {duration_type}</p> -->
    <p class="position-absolute " style="top:46.8%;left:38%"><?=date('d / m / Y',strtotime($dob))?></p>
    <div class="position-absolute" style="top:3.5%;left:4.7%;">
        <img src="upload/images/marksheet_{result_id}.png" style="width:90px;height:90px;" alt="">
    </div>
    <div class="position-absolute " style="top:58.5%;left:6.8%;width:86.1%">
        <table id="first" style="width:100%">

            <tbody>
                <?php
                $total = 0;
                $maxTotal = 0;
                $minTotal = 0;
                foreach ($marks as $mark) {
                    $print = ( (float) $mark['theory_total'] + (float)$mark['practical_total']);
                    $total += $print; 
                    $maxTotal += (float) $mark['theory_max_marks'];
                    $minTotal += (float) $mark['practical_max_marks'];
                    $mark['mera_total'] = (float) $mark['theory_max_marks']; + (float) $mark['practical_max_marks'];
                    echo $this->parser->parse_string('
                                    <tr>
                                        <td class="primary lb" style="text-align:left;padding-left:15px;font-size:12.81px;width:230px">{subject_name}
                                        </td>
                                        <td style="width:60px">{mera_total}</td>
                                        <td style="width:40px"></td>
                                        <td class="primary lb" style="font-size:12.81px;width:60px">{theory_total}</td>
                                        
                                        <td class="primary lb" style="font-size:12.81px;width:60px">{practical_total}</td>
                                        <td style="width:25px"></td>
                                        <th style="width:40px">{total}</th>
                                        <td class="lb fw" style="font-size:12.819px">'.numberToWords($print).'</td>
                                    </tr>', $mark, true);
                }
                ?>
            </tbody>
        </table>
    </div>
    <p class="position-absolute " style="bottom:16.5%;left:21.5%;font-size:15px;width:275px;line-height:1"><?= numberToWords($total) ?></p>
    <p class="position-absolute" style="bottom:16.5%;left:82%;font-size:15px;width:70"><?php
    $percentage = (($total / ($minTotal + $maxTotal)) * 100);
    echo $percentage > 34 ? 'PASSED' : 'FAILED';
    ?></p>

    <p class="position-absolute " style="bottom:9.5%;left:20%;font-size:14px;text-transform: uppercase;font-weight:600">
        <?php
        $isseDateString = strtotime($issue_date);
        echo ordinal_number(date('d',$isseDateString)).' '.date('F Y',$isseDateString);
        ?>
    </p>
    <p class="position-absolute" style="bottom:6.8%;left:20%;font-size:14px;font-weight:600">  Nagpur, Maharashtra</p>

</body>

</html>