<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{student_name} Card</title>
    <!-- <link href="{base_url}assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" /> -->
    <!-- <link href="{base_url}assets/css/style.bundle.css" rel="stylesheet" type="text/css" /> -->
    {basic_header_link}
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;

            font-weight: bold;
        }

        .text-capitlize {
            text-transform: capitalize;
        }

        .position-relative {
            position: relative;
        }

        .position-absolute {
            position: absolute;
        }

        .w-100 {
            width: 100%;
        }

        td,
        p {
            font-weight: bold;
            color: black;
            font-size: 21px;
            line-height: 1.815;
            /* text-transform: capitalize; */
            /* background-color: black; */
        }

        #photo {
            z-index: 999;
            top: 6.6rem;
            left: 63.6rem;
        }
        .test{
            border:1px solid red
        }
    </style>
</head>

<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/admit-card.jpg">
    <div class="position-absolute" id="photo">
        <img src="upload/{image}" style="width:108px;height:132px">
    </div>
    <p class="position-absolute" style="top:22.3%;left:16%">{enrollment_no}</p>
    <p class="position-absolute" style="top:29.6%;left:27%">{student_name}</p>
    <p class="position-absolute" style="top:38.8%;left:25%">{father_name}</p>
    <p class="position-absolute" style="top:48%;left:18%;width:60px;text-align:center">{dob_day}</p>
    <p class="position-absolute" style="top:48%;left:24%;width:60px;text-align:center">{dob_month}</p>
    <p class="position-absolute" style="top:48%;left:30%;width:120px;text-align:center">{dob_year}</p>

    
    <p class="position-absolute" style="top:57%;left:20%">{course_name}</p>
    <!-- <p class="position-absolute" style="top:1%;left:80%">{createdOn}</p>
    <p class="position-absolute" style="top:1%;left:16%">{admit_card_id}</p> -->

    <!-- <p class="position-absolute" style="top:1%;left:80%">{createdOn}</p> -->
    <p class="position-absolute" style="top:68.5%;left:24%">{center_name}</p>
    <p class="position-absolute" style="top:75.8%;left:14%">{date}</p>
    <p class="position-absolute" style="top:82%;left:14%">{time}</p>
    <?php
    // $this->ki_theme->generate_qr($admit_card_id, 'admit_card', current_url());
    ?>
    <!-- <div class="position-absolute" style="top:34.75%;left:5.7%">
        <img style="width:85.5px;height:85.5px" src="upload/images/admit_card_{admit_card_id}.png" alt="">
    </div> -->
</body>

</html>