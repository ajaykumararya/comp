<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" >
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{student_name} Card</title>

    {basic_header_link}
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
        
            font-weight: bold;
        }
        .text-capitlize{
            text-transform: capitalize;
        }
        .position-relative{
            position: relative;
        }
        .position-absolute{
            position: absolute;
        }
        .w-100{
            width: 100%;
        }
        p{
            font-size: 12px;
            font-weight: bold;
        }
        td{
            font-weight: bold;
            color:black;
            font-size: 11px;
            line-height:1.5;
            /* text-transform: capitalize; */
            /* background-color: black; */
        }
        #photo{
            z-index: 999;
            top:8rem;
            right:44.5px;
        }
    </style>
</head>
<?php
$examDate = date('d-m-Y',strtotime($exam_date));
$examTime = date('h:i A',strtotime($exam_date));

?>
<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/admit-card.jpg">
    <div class="position-absolute" id="photo">
        <img src="upload/{image}" style="width:103px;height:118px">
    </div>
    <p class="position-absolute text-capitalize"  style="top:17.1%;left:24%;">{student_name}</p>
    <p class="position-absolute text-capitalize"  style="top:19.73%;left:24%;">{father_name}</p>

    <p class="position-absolute text-capitalize"  style="top:22.2%;left:24%;">{mother_name}</p>
    <p class="position-absolute text-capitalize"  style="top:24.9%;left:24%;">{enrollment_no}</p>
    <p class="position-absolute text-capitalize"  style="top:24.9%;left:54%;">{roll_no}</p>
    <p class="position-absolute text-capitalize"  style="top:24.9%;left:79%;">{dob}</p>
    
    
    <p class="position-absolute text-capitalize"  style="top:31.3%;left:17%;">{course_name}</p>
    <p class="position-absolute text-capitalize"  style="top:34.42%;left:20%;"><?=$examDate?></p>
    <p class="position-absolute text-capitalize"  style="top:34.42%;left:57%;"><?=$examTime?></p>
    <p class="position-absolute text-capitalize"  style="top:37.3%;left:21%;">{center_name}</p>
    <!-- <div class="position-absolute w-100" style="top:25.42%;padding-left:9px;z-index:9999">

        <table class="table table-bordered" style="margin-left:32%">
            <tbody>
                <tr><td>{roll_no}</td></tr>
                <tr><td class="text-capitlize">{student_name}</td></tr>
                <tr><td class="text-capitlize">{father_name}</td></tr>
                <tr><td class="text-capitlize">{enrollment_no}</td></tr>
                <tr><td>{course_name}</td></tr>
                <tr><td>{session}</td></tr>
                <tr><td>{center_name} </td></tr>
            </tbody>
        </table>
    </div> -->
</body>

</html>