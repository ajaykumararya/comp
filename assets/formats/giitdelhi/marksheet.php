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
            top: 17.65%;
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
            border:none
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
    <p class="position-absolute" style="top:2.5%;left:20.3%;width:120px">{enrollment_no}</p>
    <p class="position-absolute " style="top:2.5%;left:79.5%;width:120px">{roll_no}</p>

    <p class="position-absolute " style="top:22.8%;left:17.5%;width:528px">{course_name}</p>
    <!-- <p class="position-absolute" style="top:17%;right:15%;font-size:12px">{enrollment_no}</p> -->
    <p class="position-absolute" style="top:30%;left:5%;width:240px">{student_name}</p>
    <p class="position-absolute" style="top:30%;left:34.9%;width:238px">{father_name}</p>
    <!-- <p class="position-absolute " style="top:31.1%;left:36.5%">{mother_name}</p> -->
    <p class="position-absolute" style="top:30%;left:64.5%;width:240px;line-height:1">{session}</p>
    <!-- <p class="position-absolute " style="top:35.3%;left:36.5%">{center_name}</p> -->
    <p class="position-absolute text-capitlize" style="bottom:25%;left: 51.3%;width:140px">{marksheet_duration} {duration_type}</p>
    <!-- <p class="position-absolute " style="top:39.6%;left:36.5%">{dob}</p> -->
    <div class="position-absolute" style="bottom:4%;left:44.1%;">
        <img src="upload/images/marksheet_{result_id}.png" style="width:90px;height:110px;" alt="">
    </div>
    <div class="position-absolute " style="top:39.5%;left:5%;width:90%">
        <table id="first" style="width:100%">
           
            <tbody>
                {marks}
                <tr>
                    <td style="width:80px">{subject_code}</td>
                    <td class="primary lb" style="text-align:left;padding-left:2px;font-size:12.81px;width:430px">{subject_name}
                    </td>
                    <td class="primary lb" style="font-size:12.81px;width:60px">{theory_max_marks}</td>
                    <td class="primary lb" style="font-size:12.81px;width:70px">{theory_min_marks}</td>
                    <td class="lb fw" style="font-size:12.819px">{theory_total}</td>
                </tr>
                {/marks}
            </tbody>
        </table>
    </div>
    <p class="position-absolute" style="bottom:25%;left:69%;width:67px;font-size:15px">{division}</p>
    <p class="position-absolute " style="bottom:25%;left:86%;font-size:15px;width:70px">{obtain_total}</p>
    <p class="position-absolute" style="bottom:25%;left:77%;width:68px;font-size:15px">{grade}</p>
    <p class="position-absolute " style="bottom:19%;width:108px;left:5%;font-size:13px">{center_code}</p>
    <p class="position-absolute " style="bottom:19%;left:18.5%;font-size:15px;width:467px;line-height:1">{center_name}</p>
    <p class="position-absolute" style="bottom:19%;left:79%;font-size:15px;width:138px">{issue_date}</p>

</body>

</html>