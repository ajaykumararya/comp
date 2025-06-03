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
            /* text-transform: capitalize; */
        }

        .text-capitlize {
            text-transform: uppercase!important;
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
            top: 21.68%;
            left: 77%;
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
        .test {
            border: 1px solid red
        }
        #center_signature{
            bottom:7.1%;
            left:67%;
            padding:0;
            width:210px
        }
    </style>
</head>

<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/marksheet.jpg">
    <div class="position-absolute" id="photo">
        <img src="upload/images/marksheet_{result_id}.png" style="width:80px">
    </div>
    <!-- <div class="position-absolute" style="top:22.68%;left:10%;">
        <img src="upload/images/marksheet_{result_id}.png" style="width:90px;border:1px solid #014f85" alt="">
    </div> -->
    <p class="position-absolute" style="top:17.5%;left:76.4%;width:120px">{enrollment_no}</p>
    <p class="position-absolute " style="top:17.5%;left:21.9%;width:120px">{roll_no}</p>
    <p class="position-absolute text-capitlize " style="top:30.4%;left:45%;width:240px">{student_name}</p>
    <p class="position-absolute text-capitlize " style="top:33.4%;left:34.9%;width:238px">{father_name}</p>
    <p class="position-absolute " style="top:36.5%;left:15%;width:77%;line-height:1">{course_name}</p>

    <p class="position-absolute" style="top:39.4%;left:50%;width:100px"><?=date('M Y',strtotime($issue_date))?></p>
    <p class="position-absolute" style="top:42%;left:14%">{center_name}</p>
    <!-- <p class="position-absolute " style="top:31.1%;left:36.5%">{mother_name}</p> -->
    <!-- <p class="position-absolute " style="top:35.3%;left:36.5%">{center_name}</p> -->
    <!-- <p class="position-absolute text-capitlize" style="top:68.5%;left: 51.3%;width:140px">{marksheet_duration} {duration_type}</p> -->
    <!-- <p class="position-absolute " style="top:39.6%;left:36.5%">{dob}</p> -->
    
    <div class="position-absolute " style="top:49%;left:8%;width:84%">
        <table id="first" border="1" style="width:100%">
            <thead>
                <tr>
                    <th class="primary" width="15%" style="text-align:left;padding-left:35px">SR.No</th>
                    <th class="primary" width="55%" style="text-align:left;padding-left:35px">Subject</th>
                    <th class="primary lb" >Full Marks</th>
                    <th class="primary lb" >Mark Secured</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($marks as $i => $mark){
                    $num1 = (int) ($mark['theory_max_marks']);
                    $num2 = (int) ($mark['practical_max_marks']);
                    
                    $num11 = (int) ($mark['theory_total']);
                    $num22 = (int) ($mark['practical_total']);
                    echo '<tr>
                            <td>'.($i + 1).'.</td>
                            <td style="text-align:left;padding-left:10px">'.$mark['subject_name'].'</td>
                            <td>'.($num1 + $num2).'</td>
                            <td>'.($num11 + $num22).'</td>                    
                        </tr>';
                }
                ?>
                <!-- {marks}
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
                {/marks} -->
            </tbody>
            <tfoot>
                <tr class="fw">
                    <td colspan="2" class="primary fw" style="font-size:12.81px">TOTAL</td>
                    <td class="fw lb" style="font-size:12.81px">{total}</td>
                    <td class="fw" style="font-size:12.81px">{obtain_total}</td>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- <p class="position-absolute" style="bottom:27%;left:69%;width:67px;font-size:15px">{division}</p> -->
    <p class="position-absolute" style="bottom:15.6%;left:77%;width:68px;font-size:15px">{grade}</p>
    <!-- <p class="position-absolute " style="bottom:20.35%;width:108px;left:5%;font-size:13px">{center_code}</p> -->
    <!-- <p class="position-absolute " style="bottom:20.3%;left:18.5%;font-size:15px;width:467px;line-height:1">{center_name}</p> -->
    <!-- <p class="position-absolute " style="bottom:27%;left:86%;font-size:15px;width:70px">{obtain_total}</p> -->
    <p class="position-absolute" style="bottom:15.6%;left:20%;font-size:15px;width:138px">{issue_date}</p>
    <?php
    if (file_exists('upload/' . $center_signature)) {
        ?>
        <div class="position-absolute" id="center_signature">
            <img src="upload/{center_signature}" style="width:100%;height:80px">
        </div>
        <?php
    }
    ?>
</body>

</html>