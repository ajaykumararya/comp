<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{student_name} Marksheet</title>
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
            top: 28.55%;
            right: 50px;
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
        table {}

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

        th,
        tfoot td {
            border: 1px solid black;
        }

        table tr:nth-child(1) {
            padding: 0 !important;
            margin: 0 !important;
            line-height: 0 !important;
        }

        /* .b-tb {
            border-top: 1xp solid black;
            border-bottom: 1px solid black;
        }

        .rmrb {
            border-right: 0px !important
        }

        .rmb {
            border-left: 0px solid transparent !important;
        }
 */
        .lb {
            border-left: 1px solid black;
            padding-top: 10px
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

        table tbody {
            display: block;
            max-height: 300px;
            overflow-y: scroll;
        }

        table thead,
        table tbody tr {
            display: table;
            width: 100%;
            table-layout: fixed;
        }
    </style>
</head>

<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/marksheet.jpg">
    <!-- <div class="position-absolute" id="photo">
        <img src="upload/{image}" style="width:120.3px;height:155.6px">
    </div> -->
    <!-- <p class="position-absolute" style="top:2.6%;left:15%;">{result_id}</p>
    <p class="position-absolute" style="top:2.6%;left:80%;">{issue_date}</p> -->

    <p class="position-absolute" style="top:25.3%;left:49%;">{serial_no}</p>
    <p class="position-absolute" style="top:31.7%;left:23.5%">{student_name}</p>
    <p class="position-absolute" style="top:33.8%;left:23.5%">{father_name}</p>
    <p class="position-absolute " style="top:35.9%;left:23.5%">{mother_name}</p>
    <p class="position-absolute " style="top:37.9%;left:23.5%;width:250px;line-height:1.2">{course_name}</p>

    <p class="position-absolute" style="top:31.7%;left:71%;">{enrollment_no}</p>
    <p class="position-absolute " style="top:33.8%;left:71%;width:200px">{roll_no}</p>

    <p class="position-absolute text-capitlize" style="top:35.9%;left:71%">{marksheet_duration} {duration_type}</p>
    <p class="position-absolute " style="top:37.9%;left:71%;text-transform:uppercase">
        <?= date('F Y', strtotime($from_date)) . ' - ' . date('F Y', strtotime($to_date)) ?>
    </p>

    <div class="position-absolute" style="top:20%;left:7%;background:white;border:1px solid black">
        <img src="upload/images/front_marksheet_{result_id}.png" style="width:100px;" alt="">
    </div>
    <?php
    $obtain_total = 0;
    $total = 0;
    foreach ($marks as $mark) {
        $total += $mark['theory_max_marks'];
        $obtain_total += $mark['total'];
    }
    $per = ($obtain_total / $total * 100);
    $passorfail = $per >= 30 ? 'PASS' : 'FAIL';
    $grade = $this->ki_theme->grade($per);
    ?>
    <div class="position-absolute " style="top:43%;left:5%;width:90%">
        <table id="first" border="0" style="width:100%;">
            <thead>
                <tr>
                    <th class="primary" rowspan="2" colspan="2" style="text-align:center;width:300px">
                        PAPERS</th>
                    <th class="primary " colspan="3" style="padding:4px"> MARKS</th>
                </tr>
                <tr>
                    <th class="primary b-tb " style="">MAX.</th>
                    <th class="primary b-tb " style="">MIN.</th>
                    <th class="primary b-tb " style="">OBTAINED</th>
                </tr>
            </thead>
            <tbody>
                {marks}
                <tr>
                    <td class="primary lb" style="width:20px;text-align:center;padding-left:2px;font-size:12.81px">
                        {subject_code}
                    </td>
                    <td class="primary lb" style="text-align:left;padding-left:2px;font-size:12.81px">{subject_name}
                    </td>
                    <td class="primary lb" style="font-size:12.81px">{theory_max_marks}</td>
                    <td class="primary lb" style="font-size:12.81px">{theory_min_marks}</td>
                    <td class="fw lb" style="font-size:12.81px">{total}</td>
                </tr>
                {/marks}
            </tbody>
            <tfoot>
                <tr>
                    <td>Result : <b><?= $passorfail ?></b>
                    </td>
                    <td>Grade : <b>{grade}</b></td>
                    <td colspan="3">Obtained Marks : <b class="fw">{obtain_total} / {total_max_theory}</b> </td>
                </tr>
            </tfoot>
            <!-- <tfoot>
                <tr class="fw">
                    <td class="primary fw" style="font-size:12.81px">TOTAL</td>
                    <td class="primary lb fw" style="font-size:12.81px">{total_max_theory}</td>
                    <td class="primary fw" style="font-size:12.81px">{total_max_practical}</td>
                    <td class="primary fw lb" style="font-size:12.81px">{total_min_theory}</td>
                    <td class="primary fw" style="font-size:12.81px">{total_min_practical}</td>
                    <td class="fw lb" style="font-size:12.81px"></td>
                    <td></td>
                    <td class="fw" style="font-size:12.81px">{obtain_total}</td>
                </tr>
            </tfoot> -->
        </table>
    </div>
    <!-- <p class="position-absolute" style="bottom:22.3%;left:32%;font-size:18px">{dob}</p> -->
    <p class="position-absolute" style="bottom:15%;left:40%;">{issue_date}</p>
    <!--  <p class="position-absolute" style="bottom:23.5%;left:70%;font-size:15px;width:100px">{obtain_total}</p>
    <p class="position-absolute" style="bottom:20.35%;left:70%;font-size:15px">{percentage} %</p> -->

</body>

</html>