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
            top:19.3rem;
            left:72.6%;
            width: 120px !important;;
            height: 95px;
        }
    </style>
</head>

<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/admit_card.jpg">
    <div class="position-absolute" id="photo">
        <img src="upload/{image}" style="width:146.5px;height:194px">
    </div>
    <!-- <p class="position-absolute" style="top:1%;left:80%">{createdOn}</p> -->
    <!-- <p class="position-absolute" style="top:1%;left:16%">{admit_card_id}</p> -->

    <!-- <p class="position-absolute" style="top:1%;left:80%">{createdOn}</p> -->
    <p class="position-absolute" style="top:34%;left:15%">{student_name}</p>
    <p class="position-absolute" style="top:38%;left:18%">{father_name}</p>
    <p class="position-absolute " style="top:42%;left:20%;width:280px">{enrollment_no}</p>
    <p class="position-absolute" style="top:42%;left:55%;width:180px">{roll_no}</p>
    <p class="position-absolute" style="top:45.8%;left:15%">{dob}</p>

    <p class="position-absolute" style="top:54.8%;left:12%">{course_name}</p>
    <p class="position-absolute" style="top:58.8%;left:45%">{date}</p>
    <p class="position-absolute" style="top:58.8%;left:18%">{time}</p>
    <p class="position-absolute" style="top:62.5%;left:16%">{center_name}</p>
    <?php
    $this->ki_theme->generate_qr($admit_card_id, 'admit_card', current_url());
    ?>
    <div class="position-absolute" style="top:76.7%;left:44.55%">
        <img style="width:115px;height:117px" src="upload/images/admit_card_{admit_card_id}.png" alt="">
    </div>
</body>

</html>