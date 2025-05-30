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
            font-size: 16px;
            line-height:1.815;
            /* text-transform: capitalize; */
            /* background-color: black; */
        }
        #photo{
            z-index: 999;
            top:18.3rem;
            left:59.55rem;
            width: 120px !important;;
            height: 95px;
        }
    </style>
</head>
<?php
$this->mypdf->addPage('L');
?>
<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/admit-card.jpg">
    <div class="position-absolute" id="photo">
        <img src="upload/{image}" style="width:147px;height:195px">
    </div>
    <!-- <p class="position-absolute" style="top:1%;left:80%">{createdOn}</p> -->
    <!-- <p class="position-absolute" style="top:1%;left:16%">{admit_card_id}</p> -->

    <!-- <p class="position-absolute" style="top:1%;left:80%">{createdOn}</p> -->
    <p class="position-absolute" style="top:32.6%;left:15%">{student_name}</p>
    <p class="position-absolute" style="top:36.2%;left:20%">{father_name}</p>
    <p class="position-absolute" style="top:40%;left:25%">{enrollment_no}</p>
    <p class="position-absolute" style="top:40%;left:56%;width:150px">{roll_no}</p>
    <p class="position-absolute" style="top:44%;left:16%">{dob}</p>
    <p class="position-absolute" style="top:53%;left:15%">{course_name}</p>
    <p class="position-absolute" style="top:57%;left:18%">{date}</p>
    <p class="position-absolute" style="top:57%;left:45%">{time}</p>
    <p class="position-absolute" style="top:60.8%;left:18%">{center_name}</p>
    <?php
    $this->ki_theme->generate_qr($admit_card_id, 'admit_card', current_url());
    ?>
    <div class="position-absolute" style="top:74.5%;left:33.7rem">
        <img style="width:128px;height:128px" src="upload/images/admit_card_{admit_card_id}.png" alt="">
    </div>
</body>

</html>