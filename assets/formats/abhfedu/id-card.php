<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{student_name} Id Card</title>
    {basic_header_link}
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
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
            display: grid;
        }
        p {
            font-weight: bold;
            color: black;
            font-size: 14px;
            width: 490px;
            /* word-spacing: 1px; */
        }
        #photo {
            z-index: 999;
            top: 17.1%;
            left: 33px;
        }
        .test{
            border:1px solid red
        }
    </style>
</head>
<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/Id-card.jpg">
    <div class="position-absolute" id="photo">
        <img src="upload/{image}" style="width:140px;height:182.5px">
    </div>
    <p class="position-absolute" style="top:15.4%;left:43%">{roll_no}</p>
    <p class="position-absolute" style="top:17.6%;left:43%">{student_name}</p>
    <p class="position-absolute " style="top:19.7%;left:43%">{dob}</p>
    <p class="position-absolute" style="top:22.1%;left:43%;text-transform:capitalize">{gender}</p>
    <p class="position-absolute" style="top:24.2%;left:43%">{father_name}</p>
    <!-- <p class="position-absolute " style="top:20.4%;left:43%">{DISTRICT_NAME}, {STATE_NAME}</p> -->
    <p class="position-absolute " style="top:26.5%;left:43%">{center_code}</p>
    <p class="position-absolute " style="top:28.9%;left:43%">{course_name}</p>
    <p class="position-absolute " style="top:33.1%;left:43%">{admission_date}</p>
    <p class="position-absolute " style="top:35.6%;left:43%">{contact_number}</p>
    <!-- <p class="position-absolute " style="top:26.5%;left:43%">{center_name}</p> -->
    <!-- <div class="position-absolute" style="top:23.4rem;left:2%;">
        <img src="upload/images/id_card_{student_id}.png" style="width:100px;height:100px;" alt="">
    </div> -->
</body>
</html>
