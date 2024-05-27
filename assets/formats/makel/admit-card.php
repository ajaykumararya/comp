<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" >
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{student_name} Card</title>
    <!-- <link href="{base_url}assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" /> -->
    <!-- <link href="{base_url}assets/css/style.bundle.css" rel="stylesheet" type="text/css" /> -->
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
        td,p{
            font-weight: bold;
            color:black;
            font-size: 19px;
            line-height:1.815;
        }
        #photo{
            z-index: 999;
            top:18.7rem;
            right:9.45rem;
            width: 120px !important;;
            height: 95px;
        }
        .test{
            border:1px solid red
        }
    </style>
</head>

<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/admit-card.jpg">
    <div class="position-absolute" id="photo">
        <img src="upload/{image}" style="width:145px;height:195px">
    </div>
    <!-- <p class="position-absolute" style="top:1%;left:80%">{createdOn}</p>
    <p class="position-absolute" style="top:1%;left:16%">{admit_card_id}</p> -->

    <p class="position-absolute" style="top:32.8%;left:14%">{student_name}</p>
    <p class="position-absolute" style="top:36.8%;left:16%">{father_name}</p>
    <p class="position-absolute" style="top:40.6%;left:20%">{enrollment_no}</p>
    <p class="position-absolute" style="top:40.6%;left:53%;width:190px">{roll_no}</p>
    <p class="position-absolute" style="top:44.5%;left:12%">{dob}</p>
    <p class="position-absolute" style="top:53.7%;left:14%">{course_name}</p>
    <p class="position-absolute" style="top:57.5%;left:14%">{date}</p>
    <p class="position-absolute" style="top:57.5%;left:41%">{time}</p>
    <p class="position-absolute" style="top:61.2%;left:16%">{center_name}</p>
    <?php
    $this->ki_theme->generate_qr($admit_card_id, 'admit_card', current_url());
    ?>
    <div class="position-absolute" style="top:67.65%;left:43.54%">
        <img style="width:140px;" src="upload/images/admit_card_{admit_card_id}.png" alt="">
    </div>
</body>

</html>