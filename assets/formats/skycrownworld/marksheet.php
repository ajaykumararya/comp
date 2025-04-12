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
            top: 25.7%;
            left: 85.2%
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

        .t-l {
            text-align: left;
            padding-left: 12px;
        }
    </style>
</head>

<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/marksheet.jpg">
    <div class="position-absolute" id="photo">
        <img src="upload/{image}" style="width:71px;height:92.5px">
    </div>
    <p class="position-absolute" style="top:4.7%;left:22%;width:400px">UDYAM-BR-37-0039467</p>
    <p class="position-absolute" style="top:78%;left:43%;width:100px">{issue_date}</p>
    <p class="position-absolute" style="top:22%;left:78%;">{session}</p>

    <p class="position-absolute" style="top:23.8%;left:22%">{student_name}</p>
    <p class="position-absolute" style="top:25.8%;left:22%">{father_name}</p>
    <p class="position-absolute " style="top:27.6%;left:22%">{mother_name}</p>
    <p class="position-absolute " style="top:29.6%;left:22%">{dob}</p>
    <p class="position-absolute " style="top:31.3%;left:22%;width:240px;line-height:1">{course_name}</p>

    <p class="position-absolute" style="top:23.8%;left:68%">{roll_no}</p>
    <p class="position-absolute" style="top:25.8%;left:68%">{enrollment_no}</p>
    <p class="position-absolute " style="top:27.6%;left:68%">{duration} {duration_type}</p>
    <p class="position-absolute " style="top:29.6%;left:68%">{center_code}</p>
    <p class="position-absolute text-capitlize" style="top:31.3%;left:68%;">{gender}</p>

    <p class="position-absolute " style="top:35.3%;left:22%;width:580px;">{center_name}</p>

    <div class="position-absolute" style="top:84.8%;left:83%;">
        <img src="upload/images/marksheet_{result_id}.png" style="width: 92.3px;" alt="">
    </div>

    <!-- <div class="position-absolute" style="top:22.4%;left:83%;">
        <img src="upload/{centre_logo}" style="width: 80px;height:73px;" alt="">
    </div> -->
    <!--
    <div class="position-absolute " style="top:40%;left:6%;width:88%;">
        <table id="first" border="0" style="width:100%">
            <thead>
                <tr>
                    <th style="font-size:12px;" width="20%">Subject Code</th>
                    <th class="primary lb b-tb" width="40%" style="font-size:12px;text-align:left;padding-left:35px">SUBJECTS</th>
                    <th class="primary lb b-tb" width="20%" style="font-size:12px;padding:4px">FULL MARKS</th>
                    <th class="primary lb b-tb" width="20%" style="font-size:12px;padding:4px">PASSING PERCENATGE</th>
                    <th class="primary lb b-tb"  width="20%" style="font-size:12px;padding:4px">MARKS OBTAINED</th>
                </tr>
            </thead>
            <tbody>
                {marks}
                <tr>
                    <td>{subject_code}</td>
                    <td class="primary lb" style="text-align:left;padding-left:2px;font-size:12.81px">{subject_name}
                    </td>
                    <td class="primary lb" style="font-size:12.81px">{theory_max_marks}</td>
                    <td class="lb fw" style="font-size:12.819px">70%</td>
                    <td class="fw lb" style="font-size:12.81px">{total}</td>
                </tr>
                {/marks}
            </tbody>
            <tfoot>
                <tr class="fw">
                    <td colspan="2" class="primary fw t-l" style="font-size:12.81px">Percentage of Marks: {percentage}%</td>
                    <td colspan="3" class="primary lb fw t-l" style="font-size:12.81px">Grand Total : {obtain_total}</td>
                </tr>
                <tr>
                    <td colspan="2" class="primary fw lb t-l" style="font-size:12.81px">Date of Issue : {issue_date}</td>
                    <td colspan="3" class="fw lb t-l" style="font-size:12.81px">Overall Grade : {grade}</td>
                </tr>
            </tfoot>
        </table>
    </div>
    -->
    <div class="position-absolute " style="top:40%;left:6%;width:88%;">
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
                    <td class="primary lb" style="text-align:left;padding-left:2px;font-size:10.81px">{subject_name}
                    </td>
                    <td class="primary lb" style="font-size:10.81px">{theory_max_marks}</td>
                    <td class="primary lb" style="font-size:10.81px">{practical_max_marks}</td>
                    <td class="primary lb" style="font-size:10.81px">{theory_min_marks}</td>
                    <td class="primary lb" style="font-size:10.81px">{practical_min_marks}</td>
                    <td class="lb fw" style="font-size:10.819px">{theory_total}</td>
                    <td class="fw" style="font-size:10.81px">{practical_total}</td>
                    <td class="fw" style="font-size:10.81px">{total}</td>
                </tr>
                {/marks}
            </tbody>
            <tfoot>
                <tr class="fw">
                    <td class="primary fw" style="font-size:10.81px">TOTAL</td>
                    <td class="primary lb fw" style="font-size:10.81px">{total_max_theory}</td>
                    <td class="primary fw" style="font-size:10.81px">{total_max_practical}</td>
                    <td class="primary fw lb" style="font-size:10.81px">{total_min_theory}</td>
                    <td class="primary fw" style="font-size:10.81px">{total_min_practical}</td>
                    <td class="fw lb" style="font-size:10.81px"></td>
                    <td></td>
                    <td class="fw" style="font-size:10.81px">{obtain_total}</td>
                </tr>
            </tfoot>

        </table>
    </div>
</body>

</html>