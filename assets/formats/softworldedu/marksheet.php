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
            font-size: 16px;
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

        .test {
            border: 1px solid red
        }

        table tr:nth-child(1) {
            padding: 0 !important;
            margin: 0 !important;
            line-height: 0 !important;
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

        .t-l {
            text-align: left;
            padding-left: 12px;
        }
    </style>
</head>

<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/marksheet.jpg">
    <!-- <div class="position-absolute" id="photo">
        <img src="upload/{image}" style="width:73.3px;height:96px">
    </div> -->
    <p class="position-absolute" style="top:3.5%;left:13%;width:120px;font-size:14px">{serial_no}</p>
    <!-- <p class="position-absolute " style="top:2.5%;left:79.5%;width:120px">{enrollment_no}</p> -->

    <!-- <p class="position-absolute" style="top:26.7%;left:50%;width:100px"><?= date('Y', strtotime($issue_date)) ?></p> -->
    <p class="position-absolute" style="top:36.9%;left:30%">{enrollment_no}</p>
    <p class="position-absolute" style="top:39%;left:30%;">{student_name}</p>
    <p class="position-absolute" style="top:41.5%;left:30%">{father_name}</p>
    <!-- <p class="position-absolute " style="top:31.1%;left:36.5%">{mother_name}</p> -->
    <p class="position-absolute " style="top:43.8%;left:30%;width:63%;line-height:1;text-align:left">{course_name}</p>
    <p class="position-absolute " style="top:45.9%;left:30%">{center_name}</p>
    <p class="position-absolute text-capitlize" style="top:48%;left:30%">{marksheet_duration} {duration_type}</p>
    <p class="position-absolute " style="top:50.5%;left:30%">{session}</p>
    <!-- <div class="position-absolute" style="bottom:3.75%;left:44.1%;">
        <img src="upload/images/marksheet_{result_id}.png" style="width:90px;height:110px;" alt="">
    </div> -->
    <div class="position-absolute " style="top:55%;left:10%;width:80%">
    <table id="first" border="0" style="width:100%">
            <thead>
                <tr>
                    
                    <th class="primary" rowspan="2" width="50%" style="text-align:left;padding-left:35px">SUBJECTS</th>
                    <th class="primary" colspan="2" style="font-size:10.81px;padding:4px">MAXIMUM MARKS</th>
                    <th class="primary lb" colspan="2" style="font-size:10.81px;padding:4px">MINIMUM MARKS</th>
                    <th class="primary lb" colspan="3" style="font-size:10.81px;padding:4px">OBTAINED MARKS</th>
                </tr>
                <tr>
                    <th class="primary b-tb" style="font-size:10px">THEORY</th>
                    <th class="primary b-tb" style="font-size:10px">PRACTICAL</th>
                    <th class="primary b-tb lb" style="font-size:10px">THEORY</th>
                    <th class="primary b-tb" style="font-size:10px">PRACTICAL</th>
                    <th class="primary b-tb lb" style="font-size:10px">TH.</th>
                    <th class="primary b-tb" style="font-size:10px">PR.</th>
                    <th class="primary b-tb" style="font-size:10px">TOTAL</th>
                </tr>
            </thead>
            <tbody>
                {marks}
                <tr>
                    <td class="primary lb" style="text-align:left;padding-left:2px;">{subject_name}</td>
                    <td class="primary lb">{theory_max_marks}</td>
                    <td class="primary lb">{practical_max_marks}</td>
                    <td class="primary lb">{theory_min_marks}</td>
                    <td class="primary lb">{practical_min_marks}</td>
                    <td class="lb fw" >{theory_total}</td>
                    <td class="fw">{practical_total}</td>
                    <td class="fw">{total}</td>
                </tr>
                {/marks}
            </tbody>
            <tfoot>
                <tr class="fw">
                    <td class="primary fw" >TOTAL</td>
                    <td class="primary lb fw" >{total_max_theory}</td>
                    <td class="primary fw" >{total_max_practical}</td>
                    <td class="primary fw lb" >{total_min_theory}</td>
                    <td class="primary fw" >{total_min_practical}</td>
                    <td class="fw lb" ></td>
                    <td></td>
                    <td class="fw" >{obtain_total}</td>
                </tr>
            </tfoot>

        </table>
    </div>
    <!-- <p class="position-absolute" style="bottom:27%;left:69%;width:67px;font-size:15px">{division}</p>
    <p class="position-absolute" style="bottom:27%;left:77%;width:68px;font-size:15px">{grade}</p>
    <p class="position-absolute " style="bottom:20.35%;width:108px;left:5%;font-size:13px">{center_code}</p>
    <p class="position-absolute " style="bottom:20.3%;left:18.5%;font-size:15px;width:467px;line-height:1">{center_name}
    </p>
    <p class="position-absolute " style="bottom:27%;left:86%;font-size:15px;width:70px">{obtain_total}</p>
    <p class="position-absolute" style="bottom:20.35%;left:77.3%;font-size:15px;width:138px">{issue_date}</p> -->

</body>

</html>