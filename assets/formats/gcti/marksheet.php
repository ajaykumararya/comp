<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{student_name} Marksheet</title>
    <!-- <link href="{base_url}assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" /> -->
    <!-- <link href="{base_url}assets/css/style.bundle.css" rel="stylesheet" type="text/css" /> -->
    {basic_header_link}
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;

            font-weight: bold;
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
        }

        td,
        p {
            font-weight: bold;
            color: black;
            font-size: 14px;
            line-height: 1.815;
            z-index: 2;
        }

        #photo {
            z-index: 1;
            top: 24%;
            left: 81.15%;
            width: 420px !important;
            height: 95px;
        }

        .test {
            border: 1px solid red
        }

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
    </style>
</head>

<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/marksheet.jpg">
    <div class="position-absolute" id="photo">
        <img src="upload/{image}" style="width:109px;height:140px">
    </div>
    <!-- <p class="position-absolute" style="top:1%;left:80%">{createdOn}</p>
    <p class="position-absolute" style="top:1%;left:16%">{admit_card_id}</p> -->

    <p class="position-absolute " style="top:1.9%;left:80.1%;width:130px;font-size:12px">{roll_no}</p>
    <p class="position-absolute " style="top:1.9%;left:20.2%;width:130px;font-size:12px">{enrollment_no}</p>

    <p class="position-absolute" style="top:21.9%;left:23%">{student_name}</p>
    <p class="position-absolute" style="top:23.8%;left:23%">{father_name}</p>
    <p class="position-absolute" style="top:25.8%;left:23%">{mother_name}</p>
    <p class="position-absolute" style="top:27.7%;left:23%">{dob}</p>
    <p class="position-absolute" style="top:29.5%;left:23%">{course_name}</p>
    <p class="position-absolute" style="top:31.3%;left:23%">{marksheet_duration} {duration_type}</p>
    <p class="position-absolute" style="top:33%;left:23%">{session}</p>


    <div class="position-absolute " style="top:40%;left:5%;width:90%">
        <table id="first" border="1" style="width:100%">
            <thead>
                <tr>
                    <th rowspan="2" style="width:70px">Code</th>
                    <th class="primary" rowspan="2" width="45%" style="text-align:left;padding-left:35px">SUBJECTS</th>
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
                    <td  style="font-size:10.81px">{subject_code}</td>
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
                    <td class="primary fw" colspan="2" style="font-size:10.81px">TOTAL</td>
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




    <p class="position-absolute" style="bottom:26.3%;left:27%;width:100px">{division}</p>
    <p class="position-absolute" style="bottom:24%;left:27%;width:100px">{grade}</p>
    <p class="position-absolute " style="bottom:26.3%;left:70%;width:100px;">{obtain_total}</p>

    <p class="position-absolute" style="bottom:24%;left:70%;width:100px">{percentage} %</p>
    <p class="position-absolute" style="bottom:21.5%;left:51%;">{issue_date}</p>

    <div class="position-absolute" style="top:86.7%;left:44%">
        <img style="width:92px;" src="upload/images/marksheet_{result_id}.png" alt="">
    </div>
</body>

</html>