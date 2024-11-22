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
            font-size: 18px;
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
            top:21.4rem;
            right:39px;
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
        <img src="upload/{image}" style="width:123px;height:131px">
    </div>
    <p class="position-absolute text-capitalize"  style="top:25.3%;left:25%;">{enrollment_no}</p>
    <p class="position-absolute text-capitalize"  style="top:25.3%;left:60%;width:100px">{roll_no}</p>
    <p class="position-absolute text-capitalize"  style="top:28.2%;left:26%;">{student_name}</p>
    <p class="position-absolute text-capitalize"  style="top:31.3%;left:26%;">{father_name}</p>

    <!-- <p class="position-absolute text-capitalize"  style="top:22.2%;left:24%;">{mother_name}</p> -->
    
    <p class="position-absolute text-capitalize"  style="top:34.4%;left:20%;">{dob}</p>
    
    
    <p class="position-absolute text-capitalize"  style="top:37.3%;left:36%;">{session}</p>
    <p class="position-absolute text-capitalize"  style="top:40.3%;left:23%;">{course_name}</p>
    <!-- <p class="position-absolute text-capitalize"  style="top:34.42%;left:20%;"></p> -->
    <p class="position-absolute text-capitalize"  style="top:43.5%;left:24%;"><?=$examTime?> <?=$examDate?></p>
    <p class="position-absolute text-capitalize"  style="top:46.4%;left:31%;">{center_name} / {center_code}</p>
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