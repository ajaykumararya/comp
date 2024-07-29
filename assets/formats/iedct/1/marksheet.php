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

table thead, table tbody tr {
  display: table;
  width: 100%;
  table-layout: fixed;
}
    </style>
</head>

<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/1/marksheet.jpg">
    <!-- <div class="position-absolute" id="photo">
        <img src="upload/{image}" style="width:120.3px;height:155.6px">
    </div> -->
    <!-- <p class="position-absolute" style="top:2.6%;left:15%;">{result_id}</p>
    <p class="position-absolute" style="top:2.6%;left:80%;">{issue_date}</p> -->


    <!-- <p class="position-absolute" style="top:17%;right:15%;font-size:12px">{enrollment_no}</p> -->
    <p class="position-absolute" style="top:18.8%;left:23.5%">{student_name}</p>
    <p class="position-absolute" style="top:21.3%;left:23.5%">{father_name}</p>
    <p class="position-absolute " style="top:23.6%;left:23.5%">{course_name}</p>
    <p class="position-absolute " style="top:25.8%;left:23.5%">{center_name}</p>

    <p class="position-absolute " style="top:18.8%;left:68.5%;width:200px">{roll_no}</p>

    <p class="position-absolute " style="top:21.3%;left:68.5%">{center_code}</p>
    <div class="position-absolute" style="bottom:7.3%;left:17%;">
        <img src="upload/images/marksheet_{result_id}.png" style="width:90px;" alt="">
    </div>
    <?php
    $obtain_total = 0;
    $total = 0;
    foreach($marks as $mark){
        $total += $mark['theory_max_marks'];
        $obtain_total += $mark['total'];
    }
    $per = ($obtain_total / $total * 100 ) ;
    $grade = $this->ki_theme->grade($per);
    ?>
    <div class="position-absolute " style="top:30%;left:10%;width:80%">
        <table id="first" border="0" style="width:100%;">
            <thead>
                <tr>
                    <th class="primary" rowspan="2" colspan="2" style="text-align:center;width:300px">
                        PAPERS</th>
                    <th class="primary " colspan="2" style="padding:4px">SCHEME OF MARKS</th>
                    <th class="primary rb" rowspan="2" style="">MARKS OBTAINED </th>
                </tr>
                <tr>
                    <th class="primary b-tb " style="">MIN.</th>
                    <th class="primary b-tb " style="">MAX.</th>
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
                    <td class="primary lb" style="font-size:12.81px">{theory_min_marks}</td>
                    <td class="primary lb" style="font-size:12.81px">{theory_max_marks}</td>
                    <td class="fw lb" style="font-size:12.81px">{total}</td>
                </tr>
                {/marks}
            </tbody>
            <tfoot>
                <tr>
                    <th>Grade</th>
                    <th>Percentage</th>
                    <td>{total_min_theory}</td>
                    <td>{total_max_theory}</td>
                    <td><b class="fw">TOTAL</b> {obtain_total}</td>
                </tr>
                <tr>
                    <td>{grade}</td>
                    <td><?=number_format($per,2)?>%</td>
                    <th>RESULT</th>
                    <td>
                        <?php
                        
                        $divisions = ['A' => '1ST', 'B' => '2ND', 'C' => '3RD', 'D' => '4TH'];
                        echo isset($divisions[$grade]) ? 'PASS' : 'FAIL';

                        ?>
                    </td>
                    <td><b class="fw">DIVISION</b>
                        <?php

                        echo isset($divisions[$grade]) ? $divisions[$grade] : 'FAIL';
                        ?>
                    </td>
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
    <p class="position-absolute" style="bottom:22.3%;left:32%;font-size:18px">{dob}</p>
    <p class="position-absolute" style="bottom:22.3%;left:77%;font-size:18px">{issue_date}</p>
   <!--  <p class="position-absolute" style="bottom:23.5%;left:70%;font-size:15px;width:100px">{obtain_total}</p>
    <p class="position-absolute" style="bottom:20.35%;left:70%;font-size:15px">{percentage} %</p> -->

</body>

</html>