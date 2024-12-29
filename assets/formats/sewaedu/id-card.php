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
            top: 15.7%;
            left: 22px;
        }
        .test{
            border:1px solid red;
        }
    </style>
</head>
<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/id_card.jpg">
    <div class="position-absolute" id="photo">
        <img src="upload/{image}" style="width:134.5px;height:178px">
    </div>
    <p class="position-absolute" style="top:14%;left:21rem;">{roll_no}</p>
    <p class="position-absolute" style="top:16.3%;left:21rem">{student_name}</p>
    <p class="position-absolute" style="top:18.8%;left:21rem">{father_name}</p>
    <p class="position-absolute " style="top:21.5%;left:21rem;width:60%;line-height:1">{address}</p>
    <p class="position-absolute " style="top:24%;left:21rem">{dob}</p>
    <p class="position-absolute " style="top:26.3%;left:21rem">{course_name}</p>
    <p class="position-absolute " style="top:28.8%;left:21rem">{center_name}</p>
    <div class="position-absolute" style="top:24.47rem;left:43.1%;">
        <img src="upload/images/id_card_{student_id}.png" style="width:110px;height:110px;" alt="">
    </div>
</body>
</html>
