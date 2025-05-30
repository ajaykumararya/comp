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
            top:15.45%;
            left:77.4%;
        }
    </style>
</head>
<?php
$examDate = date('d-m-Y',strtotime($exam_date));
$examTime = date('h:i A',strtotime($exam_date));
$this->ki_theme->generate_qr($admit_card_id, 'admit_card', current_url());
?>
<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/admit-card.jpg">
    <div class="position-absolute" id="photo">
        <img src="upload/{image}" style="width:105px;height:139px">
    </div>
    <p class="position-absolute text-capitalize"  style="top:14.5%;left:13%;">{student_name}</p>
    <p class="position-absolute text-capitalize"  style="top:16.4%;left:18%;">{father_name}</p>

    <!-- <p class="position-absolute text-capitalize"  style="top:22.2%;left:24%;">{mother_name}</p> -->
    <p class="position-absolute text-capitalize"  style="top:18.4%;left:22%;">{enrollment_no}</p>
    <p class="position-absolute text-capitalize"  style="top:18.4%;left:55.5%;">{roll_no}</p>
    <p class="position-absolute text-capitalize"  style="top:20.4%;left:13%;">{dob}</p>
    
    
    <p class="position-absolute text-capitalize"  style="top:25%;left:15%;">{course_name}</p>
    <p class="position-absolute text-capitalize"  style="top:27%;left:20%;"><?=$examDate?></p>
    <p class="position-absolute text-capitalize"  style="top:27%;left:45%;"><?=$examTime?></p>
    <p class="position-absolute text-capitalize"  style="top:29%;left:18%;">{center_name}</p>
    <div class="position-absolute" style="top:32.1%;left:44%;">
        <img src="upload/images/admit_card_{admit_card_id}.png" style="width:95px;" alt="">
    </div>
</body>

</html>