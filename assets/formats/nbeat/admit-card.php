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
            text-transform: uppercase;
            font-weight: bold;
        }
        .text-capitlize{
            text-transform: uppercase;
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
            top:44.5%;
            left:75.9%;
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
        <img src="upload/{image}" style="width:115px;height:134px">
    </div>
    <!-- <p class="position-absolute" style="top:1%;left:80%">{createdOn}</p> -->
    <!-- <p class="position-absolute" style="top:1%;left:16%">{admit_card_id}</p> -->

    <!-- <p class="position-absolute" style="top:1%;left:80%">{createdOn}</p> -->
    <p class="position-absolute" style="top:40%;left:15%">{student_name}</p>
    <p class="position-absolute" style="top:44%;left:22%">{father_name}</p>
    <p class="position-absolute " style="top:48.5%;left:20%;width:280px">{enrollment_no}</p>
    <p class="position-absolute" style="top:52.8%;left:15%">{dob}</p>
    <p class="position-absolute" style="top:65.5%;left:15%;width:180px">{roll_no}</p>

    <p class="position-absolute" style="top:70%;left:15%">{course_name}</p>
    <p class="position-absolute" style="top:74.5%;left:54%">{time}</p>
    <p class="position-absolute" style="top:74.5%;left:22%">{date}</p>
    <p class="position-absolute" style="top:79.5%;left:18%;width:54%;line-height:1;text-align:left">{center_name}</p>
    <?php
    $this->ki_theme->generate_qr($admit_card_id, 'admit_card', current_url());
    ?>
    <div class="position-absolute" style="top:30%;left:78.7%">
        <img style="width:90px;height:90px;border:1px solid black;padding:1px" src="upload/images/admit_card_{admit_card_id}.png" alt="">
    </div>
</body>

</html>