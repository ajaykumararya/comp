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
            width: 400px;
            /* word-spacing: 1px; */
        }
        #photo {
            z-index: 999;
            top: 15.9%;
            left: 22px;
        }
        .test{
            border:1px solid red;
        }
    </style>
</head>
<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/id-card.jpg">
    <div class="position-absolute" id="photo">
        <img src="upload/{image}" style="width:115px;height:150px">
    </div>
    <p class="position-absolute" style="top:14%;left:19rem;">{roll_no}</p>
    <p class="position-absolute" style="top:16%;left:19rem">{student_name}</p>
    <p class="position-absolute" style="top:18%;left:19rem">{father_name}</p>
    <p class="position-absolute " style="top:20.3%;left:19rem;width:60%;line-height:1">{address}</p>
    <p class="position-absolute " style="top:22.3%;left:19rem">{dob}</p>
    <p class="position-absolute " style="top:22.3%;left:39rem">{center_code}</p>
    <p class="position-absolute " style="top:24.3%;left:19rem;width:500px">{course_name}</p>
    <p class="position-absolute " style="top:26.6%;left:19rem;width:500px">{center_name}</p>
    <div class="position-absolute" style="top:23rem;left:43.1%;">
        <img src="upload/images/id_card_{student_id}.png" style="width:110px;height:110px;" alt="">
    </div>
</body>
</html>
