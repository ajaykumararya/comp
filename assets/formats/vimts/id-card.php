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
            top: 14.05%;
            left: 22.5px;
        }
    </style>
</head>
<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/Id-card.jpg">
    <div class="position-absolute" id="photo">
        <img src="upload/{image}" style="width:170.5px;height:216px">
    </div>
    <p class="position-absolute" style="top:13.5%;left:51.5%;">{roll_no}</p>
    <p class="position-absolute" style="top:16%;left:51.5%">{student_name}</p>
    <p class="position-absolute" style="top:18.8%;left:51.5%">{father_name}</p>
    <p class="position-absolute " style="top:21.8%;left:51.5%">{course_name}</p>
    <p class="position-absolute " style="top:24.5%;left:51.5%">{center_name}</p>
    <p class="position-absolute " style="top:27.3%;left:51.5%">{address}</p>
    <p class="position-absolute " style="top:30%;left:51.5%">{dob}</p>
    <div class="position-absolute" style="top:34.8%;left:45.5%;">
        <img src="upload/images/id_card_{student_id}.png" style="width:75px;height:70px" alt="">
    </div>
</body>
</html>
