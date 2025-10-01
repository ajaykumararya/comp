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
            top: 14%;
            left: 84.8%;
        }
    </style>
</head>
<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/id-card.jpg">
    <div class="position-absolute" id="photo">
        <img src="upload/{image}" style="width:83px;height:101px">
    </div>
    <p class="position-absolute" style="top:17%;left:25.7%;">{roll_no}</p>
    <p class="position-absolute" style="top:19.7%;left:23%">{student_name}</p>
    <p class="position-absolute" style="top:22.4%;left:23%">{dob}</p>
    <p class="position-absolute test" style="top:25%;left:23%;width:64%;text-align:left">{course_name}</p>
    <p class="position-absolute " style="top:27.6%;left:23%;width:64%;text-align:left">{center_name}</p>
    <p class="position-absolute " style="top:30.7%;left:23%;width:64%;text-align:left;line-height:1">{address}</p>
    <div class="position-absolute" style="top:34.2%;left:45.2%;">
        <img src="upload/images/id_card_{student_id}.png" style="width:100px;height:92px;" alt="">
    </div>
</body>
</html>