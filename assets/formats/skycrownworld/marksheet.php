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
            top: 3.7%;
            left:77.4%
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
            border: 1px solid #1a4891;
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
        .t-l{
            text-align: left;
            padding-left: 12px;
        }
    </style>
</head>
<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/marksheet.jpg">
    <div class="position-absolute" id="photo">
        <img src="upload/{image}" style="width:127px;height:127px">
    </div>
    <p class="position-absolute" style="top:2.2%;left:22%;width:100px">{result_id}</p>
    <p class="position-absolute" style="top:4.3%;left:15.7%;">{session}</p>
    <!-- <p class="position-absolute" style="top:2.6%;left:80%;">{issue_date}</p> -->


    <!-- <p class="position-absolute" style="top:17%;right:15%;font-size:12px">{enrollment_no}</p> -->
    <p class="position-absolute" style="top:32.8%;left:18%">{student_name}</p>
    <p class="position-absolute" style="top:34.2%;left:24%">{father_name}</p>
    <p class="position-absolute " style="top:35.8%;left:24%">{mother_name}</p>
    <p class="position-absolute " style="top:37.3%;left:20%">{course_name}</p>
    <!-- <p class="position-absolute text-capitlize" style="top:35.3%;left:20%">{duration} {duration_type}</p> -->
    
    <!-- <p class="position-absolute text-capitlize" style="top:35.3%;left: 40%">{from_date} </p>
    <p class="position-absolute text-capitlize" style="top:35.3%;left:60%">{to_date} </p> -->

    <p class="position-absolute " style="top:38.8%;left:21%">{center_name}</p>

    <!-- <p class="position-absolute " style="top:32.8%;left:63.5%">{enrollment_no}</p> -->
    <p class="position-absolute " style="top:32.8%;left:75%;width:200px">{roll_no}</p>
    <p class="position-absolute " style="top:34.3%;left:76%;width:200px">{dob}</p>
    <p class="position-absolute text-capitlize" style="top:36%;left:73%;width:200px;">{gender}</p>
    <p class="position-absolute text-capitlize" style="top:37.3%;left:78%">{duration} {duration_type}</p>
    
    <div class="position-absolute" style="bottom:8.2%;right:10%;">
        <img src="upload/images/marksheet_{result_id}.png" style="width: 78px;" alt="">
    </div>

    <!-- <div class="position-absolute" style="top:22.4%;left:83%;">
        <img src="upload/{centre_logo}" style="width: 80px;height:73px;" alt="">
    </div> -->
    <div class="position-absolute " style="top:43%;left:6%;width:88%">
        <table id="first" border="0" style="width:100%">
            <thead>
                <tr>
                    <th style="font-size:12px;" width="20%">Subject Code</th>
                    <th class="primary lb b-tb" width="20%" style="font-size:12px;text-align:left;padding-left:35px">SUBJECTS</th>
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
    <!-- <p class="position-absolute" style="bottom:20%;left:27%;font-size:15px">{percentage} %</p>
    <p class="position-absolute" style="bottom:20%;left:50%;font-size:15px">{session}</p>
    <p class="position-absolute" style="bottom:20.15%;left:80%;font-size:15px">{issue_date}</p> -->
    
</body>
</html>
