<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{student_name} Marsheet</title>
    <!-- <link href="{base_url}assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" /> -->
    <!-- <link href="{base_url}assets/css/style.bundle.css" rel="stylesheet" type="text/css" /> -->
    {basic_header_link}
    <style>
        body{
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
        }

        td,p {
            font-weight: bold;
            color: black;
            font-size: 13px;
            line-height: 1.5;
            /* text-transform: capitalize; */
            /* background-color: black; */
        }

        #photo {
            z-index: 999;
            top: 20.3rem;
            right: 47px;
            width: 120px !important;
            ;
            height: 95px;
        }

        #session {
            top: 34%;
            left: 16.3%;
            font-weight: bold
        }

        /* table#first td, */
        table th:nth-child(1),table,tfoot tr,
        table#first th {
            border: 1px solid #1a7cfd;
            text-align: center;
        }
        .primary,
        table th{
            color:#1a7cfd
        }

        table {
            border-collapse: collapse;
        }
        .b-tb{
            border-top:1xp solid #1a7cfd;
            border-bottom: 1px solid #1a7cfd;
        }
        .rmrb{
            border-right:0px!important
        }
        .rmb{
            border-left:0px solid transparent!important;
        }
        .lb{
            border-left: 1px solid #1a7cfd;
        }
    </style>
</head>

<body class="position-relative">
    <div class="position-absolute" style="top:6.1%;left:78%;font-weight:bold">{result_id}</div>
    <img id="back-image" class="position-relative" src="{document_path}/marksheet.png">
    <p class="position-absolute" id="session">{session}</p>
    <div class="position-absolute" id="photo">
        <img src="upload/{image}" style="width:95px;height:113px">
    </div>

    <p class="position-absolute" style="top:41.5%;left:27%">{student_name}</p>
    <p class="position-absolute" style="top:43.6%;left:27%">{father_name}</p>
    <p class="position-absolute" style="top:45.55%;left:27%">{mother_name}</p>
    <p class="position-absolute" style="top:47.89%;left:27%">{enrollment_no}</p>
    <p class="position-absolute" style="top:49.75%;left:27%">{center_name}</p>
    <p class="position-absolute" style="top:51.65%;left:27%">{course_name}</p>
    <p class="position-absolute" style="top:53.55%;left:27%">{duration} {duration_type}</p>
    <!--
    <div class="position-absolute w-100" style="top:39.62%;padding-left:9px;z-index:9999">

        <table class="table table-bordered" style="margin-left:20%">
            <tbody>

                <tr>
                    <td class="text-capitlize">{student_name}</td>
                </tr>
                <tr>
                    <td class="text-capitlize">{father_name}</td>
                </tr>
                <tr>
                    <td class="text-capitlize">{mother_name}</td>
                </tr>
                <tr>
                    <td>{enrollment_no}</td>
                </tr>
                <tr>
                    <td class="text-capitlize" style="line-height:0.9">{center_name}</td>
                </tr>
                <tr>
                    <td class="text-capitlize" style="line-height:2">{course_name}</td>
                </tr>
                <tr>
                    <td class="text-capitlize" style="line-height:0.6">{duration} {duration_type}</td>
                </tr>
            </tbody>
        </table>


    </div>
    -->
    <div class="position-absolute " style="top:57%;left:8%;width:84%">
        <table id="first" border="0" style="width:100%">
            <thead>
                <tr>
                    <th rowspan="2" width="50%" style="text-align:left;padding-left:20px">SUBJECTS</th>
                    <th colspan="2" style="font-size:10px;padding:4px">MAXIMUM MARKS</th>
                    <th colspan="2" style="font-size:10px;padding:4px">MINIMUM MARKS</th>
                    <th colspan="3" style="font-size:10px;padding:4px">OBTAINED MARKS</th>
                </tr>
                <tr>
                    <th style="font-size:9px">THEORY</th>
                    <th style="font-size:9px">PRACTICAL</th>
                    <th style="font-size:9px">THEORY</th>
                    <th style="font-size:9px">PRACTICAL</th>
                    <th style="font-size:9px">TH.</th>
                    <th style="font-size:9px">PR.</th>
                    <th style="font-size:9px">TOTAL</th>
                </tr>
            </thead>
            <tbody>
                {marks}
                <tr>
                    <td style="text-align:left" class="primary">{subject_name}</td>
                    <td  class="primary lb">{theory_max_marks}</td>
                    <td  class="primary lb">{practical_max_marks}</td>
                    <td  class="primary lb">{theory_min_marks}</td>
                    <td  class="primary lb">{practical_min_marks}</td>
                    <td  class="lb">{theory_total}</td>
                    <td >{practical_total}</td>
                    <td >{total}</td>
                </tr>
                {/marks}
            </tbody>
            <tfoot>
                <tr>
                    <td class="primary">TOTAL</td>
                    <td class="primary lb">{total_max_theory}</td>
                    <td class="primary">{total_max_practical}</td>
                    <td class="primary lb">{total_min_theory}</td>
                    <td class="primary">{total_min_practical}</td>
                    <td class="lb"></td>
                    <td></td>
                    <td class="">{obtain_total}</td>
                </tr>
            </tfoot>
        </table>
    </div>

    <p class="position-absolute" style="bottom:14%;left:30%;font-size:15px;width:100px">{grade}</p>

    <p class="position-absolute" style="bottom:14%;left:65%;font-size:15px">{percentage} %</p>
    <p class="position-absolute" style="bottom:7.7%;left:20%;font-size:12px">{issue_date}</p>

</body>

</html>