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
            text-align: center;
        }
        .w-100{
            width: 100%;
        }
        td,p{
            font-weight: bold;
            color:black;
            font-size: 17px;
            line-height:1.815;
            /* text-transform: capitalize; */
            /* background-color: black; */
        }
        #photo{
            z-index: 999;
            top:16.6rem;
            left:53.6%;
        }
        .test{
            border:1px solid red
        }
    </style>
</head>

<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/admit-card.jpg">
    <div class="position-absolute" id="photo">
        <img src="upload/{image}" style="width:200px;height:225px">
    </div>
    <!-- <p class="position-absolute" style="top:16.5%;left:80%">{createdOn}</p>
    <p class="position-absolute" style="top:16.5%;left:17%">{admit_card_id}</p> -->
    <!-- <p class="position-absolute" style="top:1.5%;left:16%">{session}</p> -->

    <!-- <p class="position-absolute " style="top:34.8%;left:35%;">{enrollment_no}</p> -->
    <p class="position-absolute" style="top:41.7%;left:45%">{student_name}</p>
    <p class="position-absolute" style="top:46.4%;left:45%">Student</p>
    <p class="position-absolute" style="top:50.6%;left:45%">{father_name}</p>
    <!-- <p class="position-absolute" style="top:47.1%;left:35%;width:300px;text-align:left">{roll_no}</p> -->
    <!-- <p class="position-absolute" style="top:45.8%;left:15%">{dob}</p> -->

    <p class="position-absolute" style="top:55.3%;left:45%">{dob}</p>
    <p class="position-absolute" style="top:59.5%;left:45%">{contact_number}</p>
    <!-- <p class="position-absolute" style="top:56.3%;left:35%">{time}</p> -->
    <p class="position-absolute" style="top:64.4%;left:45%">{address}</p>
    <?php
    // $this->ki_theme->generate_qr($admit_card_id, 'admit_card', current_url());
    ?>
    <!--
    <div class="position-absolute" style="bottom:9%;left:8%;">
        <img style="width:76px;height:76px" src="upload/images/admit_card_{admit_card_id}.png" alt="">
    </-div> -->
</body>

</html>