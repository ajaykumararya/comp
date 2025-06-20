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
            /* text-align: center; */
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
            left: 71.4%;
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
    </style>
</head>

<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/marksheet.jpg">
    <div class="position-absolute" id="photo">
        <img src="upload/{image}" style="width: 88px;height:113px;border:2px solid #017ba4">
    </div>
    <p class="position-absolute" style="top:20.9%;left:11.5%;width:120px">{serial_no}</p>
    <p class="position-absolute " style="top:20.9%;left:79%;width:120px">{enrollment_no}</p>

    <!-- <p class="position-absolute" style="top:26.7%;left:50%;width:100px"><?= date('Y', strtotime($issue_date)) ?></p> -->
    <p class="position-absolute" style="top:24.2%;left:30%;">{roll_no}</p>
    <p class="position-absolute" style="top:26.3%;width:358px;left:30%;">{student_name}</p>
    <p class="position-absolute" style="top:28.3%;width:358px;left:30%;">{session}</p>
    <p class="position-absolute" style="top:30.5%;width:358px;left:30%;">{father_name}</p>
    <p class="position-absolute " style="top:32.6%;left:30%">{mother_name}</p>
    <p class="position-absolute " style="top:34.7%;left:30%">{dob}</p>
    <p class="position-absolute text-capitlize" style="top:36.9%;left:30%">{gender}</p>
    <p class="position-absolute " style="top:38.9%;left:37.5%;width:530px;line-height:1">{course_name}</p>
    <p class="position-absolute text-capitlize" style="top:40.8%;left: 38%;width:140px"><?=humnize_duration($duration,$duration_type)?></p>
    <!-- <p class="position-absolute " style="top:39.6%;left:36.5%">{dob}</p> -->
    <p class="position-absolute " style="top:43%;left:38%">{center_name}</p>
    <p class="position-absolute " style="top:45%;left:55%"><?=humnize_duration_with_ordinal($marksheet_duration,$duration_type)?></p>
    <div class="position-absolute" style="top:29.9%;left:86.1%;">
        <img src="upload/images/marksheet_{result_id}.png" style="width:60px;" alt="">
    </div>
    <div class="position-absolute " style="top:49%;left:6%;width:88%">
        <table id="first" border="1" style="width:100%">
            <thead>
                <tr>
                    <th class="primary" rowspan="2" width="50%" style="text-align:left;padding-left:35px">SUBJECTS</th>
                    <th class="primary" colspan="2" style="font-size:11px;padding:4px">MAXIMUM MARKS</th>
                    <th class="primary lb" colspan="2" style="font-size:11px;padding:4px">MINIMUM MARKS</th>
                    <th class="primary lb" colspan="3" style="font-size:11px;padding:4px">OBTAINED MARKS</th>
                </tr>
                <tr>
                    <th class="primary b-tb" style="font-size:11px">THEORY</th>
                    <th class="primary b-tb" style="font-size:11px">PRACTICAL</th>
                    <th class="primary b-tb lb" style="font-size:11px">THEORY</th>
                    <th class="primary b-tb" style="font-size:11px">PRACTICAL</th>
                    <th class="primary b-tb lb" style="font-size:11px">TH.</th>
                    <th class="primary b-tb" style="font-size:11px">PR.</th>
                    <th class="primary b-tb" style="font-size:11px">TOTAL</th>
                </tr>
            </thead>
            <tbody>
                {marks}
                <tr>
                    <td class="primary lb" style="text-align:left;padding-left:2px;font-size:12.81px">{subject_name}
                    </td>
                    <td class="primary lb" style="font-size:12.81px">{theory_max_marks}</td>
                    <td class="primary lb" style="font-size:12.81px">{practical_max_marks}</td>
                    <td class="primary lb" style="font-size:12.81px">{theory_min_marks}</td>
                    <td class="primary lb" style="font-size:12.81px">{practical_min_marks}</td>
                    <td class="lb fw" style="font-size:12.819px">{theory_total}</td>
                    <td class="fw" style="font-size:12.81px">{practical_total}</td>
                    <td class="fw" style="font-size:12.81px">{total}</td>
                </tr>
                {/marks}
            </tbody>
            <tfoot>
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
            </tfoot>
        </table>
    </div>
    <p class="position-absolute" style="top:80.4%;left:88.5%;width:67px;font-size:12px">{percentage}%</p>
    <p class="position-absolute" style="top:82.3%;left:79%;width:68px;font-size:12px">{grade}</p>
    <!-- <p class="position-absolute text-center " style="top:38.8%;width:358px;left:5%;font-size:13px">{center_code}</p> -->
    <!-- <p class="position-absolute text-center " style="top:38.8%;width:358px;left:50%;font-size:13px">{session}</p> -->
    <!-- <p class="position-absolute " style="bottom:20.3%;left:18.5%;font-size:15px;width:467px;line-height:1">{center_name} -->
    </p>
    <!-- <p class="position-absolute " style="bottom:22%;left:86%;font-size:15px;width:70px">{obtain_total}</p> -->
        <!-- <p class="position-absolute" style="top:92.7%;left:17%;font-size:12px">NEW DELHI</p> -->
        <p class="position-absolute" style="top:80.3%;left:52.5%;">{issue_date}</p>
</body>

</html>