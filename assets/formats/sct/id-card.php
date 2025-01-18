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
        text-transform: uppercase;
    }

    .text-capitlize {
        text-transform: uppercase;
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
        top: 15.4%;
        left: 25px;
    }

    .test {
        border: 1px solid red
    }

    </style>
</head>

<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/id-card.jpg">
    <div class="position-absolute" id="photo">
        <img src="upload/{image}" style="width:149px;height:169px">
    </div>
    <p class="position-absolute" style="top:14.3%;left:48%;">{roll_no}</p>
    <p class="position-absolute" style="top:16.5%;left:48%">{student_name}</p>
    <p class="position-absolute" style="top:18.7%;left:48%">{father_name}</p>
    <p class="position-absolute" style="top:21.2%;left:48%;width:63%;">{course_name}</p>
    <p class="position-absolute " style="top:23.6%;left:48%">{center_name}</p>
    <p class="position-absolute" style="top:25.7%;left:48%;width:63%;line-height:1">{address}</p>
    <p class="position-absolute" style="top:28.2%;left:48%;width:63%">{dob}</p>
    <div class="position-absolute" style="top:24.4rem;left:43.6%;">
        <img src="upload/images/id_card_{student_id}.png" style="width:90px;height:80px;" alt="">
    </div>
</body>

</html>