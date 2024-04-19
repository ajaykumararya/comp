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
            font-size: 12px;
            display: inline-block;
            /* word-spacing: 1px; */
        }

        #photo {
            z-index: 999;
            top: 19.85%;
            right: 86.6px;
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
        .fw{
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
    </style>
</head>

<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/marksheet.jpg">
    <div class="position-absolute" id="photo">
        <img src="upload/{image}" style="width:102.5px;height:117.5px">
    </div>
    <div class="position-absolute" style="top:20%;left:11.6%;">
        <img src="upload/images/marksheet_{result_id}.png" style="width:107.5px;height:99px;" alt="">

    </div>

    <p class="position-absolute" style="top:5%;left:30%;font-size:12px">{enrollment_no}</p>
    <p class="position-absolute" style="top:5%;left:68.5%;font-size:12px">{roll_no}</p>

    <p class="position-absolute" style="top:30%;left:39.5%">{student_name}</p>
    <p class="position-absolute" style="top:32.4%;left:23.5%">{father_name}</p>

    <p class="position-absolute " style="top:34.6%;left:28.5%">{mother_name}</p>
    <p class="position-absolute " style="top:34.6%;left:74.5%">{dob}</p>

    <p class="position-absolute " style="top:37%;left:26.5%">{course_name}</p>

    <p class="position-absolute" style="top:39.3%;left:27.8%">{percentage}%</p>
    <p class="position-absolute" style="top:39.3%;left:45.8%">{grade}</p>
    <p class="position-absolute" style="top:39.4%;left:60%">{session}</p>
    <p class="position-absolute" style="top:39.4%;left:78.8%">{issue_date}</p>

    <!-- <p class="position-absolute " style="top:44.6%;left:31.5%">{duration} {duration_type}</p> -->
    
    <div class="position-absolute " style="top:48%;left:10%;width:80%">
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
                    <td class="primary lb" style="text-align:left;padding-left:2px;font-size:10.81px">{subject_name}</td>
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
    <!-- <p class="position-absolute" style="bottom:20.5%;left:32%;font-size:15px">{division}</p>
    <p class="position-absolute" style="bottom:17.85%;left:32%;font-size:15px">{grade}</p>
    <p class="position-absolute" style="bottom:20.5%;left:70%;font-size:15px;width:100px">{obtain_total}</p>

    <p class="position-absolute" style="bottom:7%;left:15%;font-size:12px">{issue_date}</p> -->

</body>

</html>