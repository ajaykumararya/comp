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
            font-size: 17px;
            line-height:1.815;
            /* text-transform: capitalize; */
            /* background-color: black; */
        }
        #photo{
            z-index: 999;
            top:22.75rem;
            left:41.6%;
            width: 120px !important;;
            height: 95px;
        }
    </style>
</head>

<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/admit-card.jpg">
    <div class="position-absolute" id="photo">
        <img src="upload/{image}" style="width:132px;height:168px">
    </div>
    <p class="position-absolute" style="bottom:8%;left:13%;font-size:13px">{createdOn}</p>
    <!-- <p class="position-absolute" style="top:1%;left:16%">{admit_card_id}</p> -->

    <p class="position-absolute" style="top:48%;left:25%">{student_name}</p>
    <p class="position-absolute" style="top:50.6%;left:25%">{father_name}</p>
    <p class="position-absolute" style="top:53%;left:77%;width:200px">{roll_no}</p>
    <p class="position-absolute" style="top:53%;left:27%">{enrollment_no}</p>
    <p class="position-absolute" style="top:55.6%;left:20%">{dob}</p>
    <p class="position-absolute" style="top:61.6%;left:17%">{course_name}</p>
    <p class="position-absolute" style="top:64.5%;left:23%">{date}</p>
    <p class="position-absolute" style="top:64.5%;left:57%">{time}</p>
    <p class="position-absolute" style="top:66.8%;left:21%">{center_name}</p>
    <?php
    // $this->ki_theme->generate_qr($admit_card_id, 'admit_card', current_url());
    ?>
    <!-- <div class="position-absolute" style="top:34.75%;left:5.7%">
        <img style="width:85.5px;height:85.5px" src="upload/images/admit_card_{admit_card_id}.png" alt="">
    </div> -->
</body>

</html>