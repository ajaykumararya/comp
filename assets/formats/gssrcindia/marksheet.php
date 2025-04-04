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
            top: 22.7%;
            left: 85.7%;
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
        <img src="upload/{image}" style="width:73.3px;height:96px">
    </div>
    <p class="position-absolute" style="top:2.5%;left:20.3%;width:120px">{serial_no}</p>
    <p class="position-absolute " style="top:2.5%;left:79.5%;width:120px">{enrollment_no}</p>

    <!-- <p class="position-absolute" style="top:26.7%;left:50%;width:100px"><?= date('Y', strtotime($issue_date)) ?></p> -->
    <!-- <p class="position-absolute" style="top:17%;right:15%;font-size:12px">{enrollment_no}</p> -->
    <p class="position-absolute" style="top:34%;width:358px;left:5%;font-size:13px">{student_name}</p>
    <p class="position-absolute" style="top:34%;width:358px;left:50%;font-size:13px">{father_name}</p>
    <!-- <p class="position-absolute " style="top:31.1%;left:36.5%">{mother_name}</p> -->
    <p class="position-absolute " style="top:28%;left:18%;width:530px;line-height:1">{course_name}</p>
    <!-- <p class="position-absolute " style="top:35.3%;left:36.5%">{center_name}</p> -->
    <p class="position-absolute text-capitlize" style="bottom:22%;left: 51.3%;width:140px">{marksheet_duration}
        {duration_type}</p>
    <!-- <p class="position-absolute " style="top:39.6%;left:36.5%">{dob}</p> -->
    <div class="position-absolute" style="top:84.8%;left:5.3%;">
        <img src="upload/images/marksheet_{result_id}.png" style="width:90px;" alt="">
    </div>
    <div class="position-absolute " style="top:43.1%;left:5%;width:90%">
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
    <p class="position-absolute" style="bottom:22%;left:69%;width:67px;font-size:15px">{division}</p>
    <p class="position-absolute" style="bottom:22%;left:77%;width:68px;font-size:15px">{grade}</p>
    <p class="position-absolute text-center " style="top:38.8%;width:358px;left:5%;font-size:13px">{center_code}</p>
    <p class="position-absolute text-center " style="top:38.8%;width:358px;left:50%;font-size:13px">{session}</p>
    <!-- <p class="position-absolute " style="bottom:20.3%;left:18.5%;font-size:15px;width:467px;line-height:1">{center_name} -->
    </p>
    <p class="position-absolute " style="bottom:22%;left:86%;font-size:15px;width:70px">{obtain_total}</p>
        <p class="position-absolute" style="top:92.7%;left:17%;font-size:12px">NEW DELHI</p>
        <p class="position-absolute" style="top:94%;left:17%;font-size:12px">{issue_date}</p>
</body>

</html>