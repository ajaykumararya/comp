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
            z-index: 999;
            top: 27.4%;
            right: 107px;
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
        /* table th:nth-child(1),
        table,
        tfoot tr {
            border: 1px solid #1a4891;
            text-align: center;
            padding: 0;
            margin: 0;
            line-height: 0 !important;
        } */
        .fw {
            font-weight: bold;
        }

        .b-tb {
            border-top: 1xp solid #1a4891;
            border-bottom: 1px solid #1a4891;
        }

        .rmrb {
            border-right: 0px !important
        }

        .rmb {
            border-left: 0px solid transparent !important;
        }

        .lb {
            border-left: 1px solid #1a4891;
        }

        table head tr th {
            color: #0651a4 !important;
            padding: 0;
            font-size: 8px !important;
        }

        table tr td,
        table tfoot tr th {
            line-height: 0;
            font-size: 11px;
            font-weight: bold;
            color: black
        }

        table tfoot tr th {
            font-size: 12px;
        }

        table {
            border-collapse: collapse;
        }

        .test {
            border: 1px solid red
        }

        .f-s-8 {
            font-size: 11px !important;
        }

        .p-l-r {
            padding-left: 6px;
            padding-right: 6px;
        }

        table tbody tr td {
            border-top: none;
            border-bottom: none;
            text-align: center;
            font-weight: bold;
        }

        .horizontal-letters div {
            display: inline-block;
            margin-right: 5px;
        }

        sup {
            font-weight: bold;
        }
    </style>
</head>

<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/marksheet.png">
    <div class="position-absolute" id="photo">
        <img src="upload/{image}" style="width:92px;height:98px">
    </div>
    <p class="position-absolute" style="top:46.35%;left:15%;width:100px">{serial_no}</p>
    <p class="position-absolute" style="top:36.7%;left:14.5%;">{issue_date}</p>
    <p class="position-absolute text-capitlize" style="top:36.5%;left:25%;width:630px;text-align:center">{course_name}
    </p>
    <!-- <p class="position-absolute" style="top:17%;right:15%;font-size:12px">{enrollment_no}</p> -->
    <p class="position-absolute" style="top:40.8%;left:20.5%">{student_name}</p>
    <p class="position-absolute" style="top:40.9%;left:49.5%">{father_name}</p>
    <p class="position-absolute " style="top:40.9%;left:70.7%">{session}</p>
    <p class="position-absolute " style="top:40.8%;left:85%">{dob}</p>
    <p class="position-absolute " style="top:46.35%;left:36.7%">{enrollment_no}</p>
    <p class="position-absolute " style="top:46.35%;left:58.5%">{center_name}</p>
    <!-- <p class="position-absolute " style="top:37.5%;left:36.5%">{duration} {duration_type}</p>
    <p class="position-absolute " style="top:39.6%;left:36.5%">{dob}</p> -->
    <div class="position-absolute" style="bottom:8%;left:28.9%;">
        <img src="upload/images/marksheet_{result_id}.png" style="padding:-4px;width:85px;border:1px solid black" alt="">
    </div>
    <div class="position-absolute" style="top:52%;left:4.3%">
        <table class="table" id="first" border="1" style="width:97.3%" class="position-absolute">
            <thead>
                <tr>
                    <th class="f-s-8" style="width:6%;height:20px" rowspan="2">PAPER</th>
                    <th class="f-s-8" style="width:30%">THEORY</th>
                    <th class="f-s-8" colspan="2">MARKS</th>
                    <th class="f-s-8 p-l-r" rowspan="2">DIVISION</th>
                    <th class="f-s-8 p-l-r" rowspan="2">PAPERS</th>
                    <th class="f-s-8" style="width:30%">PRACTICAL</th>
                    <th class="f-s-8" colspan="2">MARKS</th>
                    <th class="f-s-8 p-l-r" rowspan="2">DIVISION</th>
                </tr>
                <tr>
                    <th class="f-s-8">SUBJECT</th>
                    <th class="f-s-8">MAX.</th>
                    <th class="f-s-8">OBT.</th>
                    <th class="f-s-8">SUBJECT</th>
                    <th class="f-s-8">MAX.</th>
                    <th class="f-s-8">OBT.</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $totalP = $totalT = 0;
                // $division = 'FAIL';
                $divisions = ['A' => 'FIRST', 'B' => 'SECOND', 'C' => 'THIRD', 'D' => 'PASS', 'E' => 'FAIL'];
                $division = isset($divisions[$grade]) ? $divisions[$grade] : 'FAIL';
                if (isset($practicalSubjects) && isset($theorySubject)) {
                    $tCount = count($theorySubject);
                    $pCount = count($practicalSubjects);
                    $getLarge = $tCount > $pCount ? $tCount : $pCount;

                    for ($i = 0; $i < $getLarge; $i++) {
                        echo '<tr>';
                        if (isset($theorySubject[$i])) {
                            $totalT += $theorySubject[$i]['theory_total'];
                            echo '<td>' . ($i + 1) . sup($i + 1) . '</td>';
                            echo '<td>' . $theorySubject[$i]['subject_name'] . '</td>';
                            echo '<td>' . $theorySubject[$i]['theory_max_marks'] . '</td>';
                            echo '<td>' . $theorySubject[$i]['theory_total'] . '</td>';
                            echo !$i ? '<td rowspan="' . $getLarge . '">
                                        <div class="horizontal-letters">
                                            ' . convert_to_div($division) . '
                                        </div>
                            </td>' : '';
                            // echo '<td></td>';
                        } else {
                            echo ('<td></td>');
                            echo ('<td></td>');
                            echo ('<td></td>');
                            echo ('<td></td>');
                        }
                        if (isset($practicalSubjects[$i])) {
                            $totalP += $practicalSubjects[$i]['practical_total'];

                            echo '<td>' . ($i + 1) . sup($i + 1) . '</td>';
                            echo '<td>' . $practicalSubjects[$i]['subject_name'] . '</td>';
                            echo '<td>' . $practicalSubjects[$i]['practical_max_marks'] . '</td>';
                            echo '<td>' . $practicalSubjects[$i]['practical_total'] . '</td>';
                            echo !$i ? '<td rowspan="' . $getLarge . '">
                            <div class="horizontal-letters">
                                            ' . convert_to_div($division) . '
                                        </div>
                            </td>' : '';
                            // echo '<td>';
                        } else {
                            echo ('<td></td>');
                            echo ('<td></td>');
                            echo ('<td></td>');
                            echo ('<td></td>');
                        }
                        echo '</tr>';
                    }
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="2">Total</th>
                    <th>{total_max_theory}</th>
                    <th><?= $totalT ?></th>
                    <th colspan="2"></th>
                    <th>Total</th>
                    <th>{total_max_practical}</th>
                    <th><?= $totalP ?></th>
                    <th></th>
                </tr>
            </tfoot>
        </table>
    </div>
 
    <p class="position-absolute" style="bottom:16.5%;left:40%;width:100px">{obtain_total}</p>
    <p class="position-absolute" style="bottom:16.5%;left:66%">{grade} / {percentage} %</p>
</body>

</html>