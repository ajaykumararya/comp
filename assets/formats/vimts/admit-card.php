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
            top:42.4%;
            left:71.9%;
        }
    </style>
</head>

<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/admit-card.jpg">
    <div class="position-absolute" id="photo">
        <img src="upload/{image}" style="width:196px;height:203.5px">
    </div>
    <!-- <p class="position-absolute" style="top:1%;left:80%">{createdOn}</p> -->
    <!-- <p class="position-absolute" style="top:1%;left:16%">{admit_card_id}</p> -->

    <!-- <p class="position-absolute" style="top:1%;left:80%">{createdOn}</p> -->
    <p class="position-absolute" style="top:49%;left:25%">{roll_no}</p>
    <!-- <p class="position-absolute" style="top:43.5%;left:56%;width:100px">{roll_no}</p> -->
    <p class="position-absolute" style="top:41.5%;left:25%">{student_name}</p>
    <p class="position-absolute" style="top:44.9%;left:25%">{father_name}</p>
    <p class="position-absolute" style="top:53%;left:25%">{dob}</p>
    <p class="position-absolute" style="top:61%;left:25%">{course_name}</p>
    <p class="position-absolute" style="top:64.5%;left:25%">{date}</p>
    <p class="position-absolute" style="top:64.5%;left:55%">{time}</p>
    <p class="position-absolute" style="top:67.9%;left:25%">{center_name}</p>
    <?php
    $this->mypdf->addPage('L');
    $this->ki_theme->generate_qr($admit_card_id, 'admit_card', current_url());
    ?>
    <div class="position-absolute" style="top:78%;left:34.2rem">
        <img style="width:98px;height:72px" src="upload/images/admit_card_{admit_card_id}.png" alt="">
    </div>
</body>

</html>