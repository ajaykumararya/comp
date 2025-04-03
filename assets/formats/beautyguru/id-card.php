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
            font-size: 18px;
            width: 400px;
            /* word-spacing: 1px; */
        }
        #photo {
            z-index: 999;
            top: 32.7%;
            left: 28px;
        }
    </style>
</head>
<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/id-card.jpg">
    <div class="position-absolute" id="photo">
        <img src="upload/{image}" style="width:166px;height:214px">
    </div>
    <p class="position-absolute" style="top:30%;left:36%;">{roll_no}</p>
    <p class="position-absolute" style="top:33.7%;left:36%">{student_name}</p>
    <p class="position-absolute" style="top:38%;left:36%">{father_name}</p>
    <p class="position-absolute " style="top:42%;left:36%;width:64%">{address}</p>
    <p class="position-absolute " style="top:46.5%;left:36%">{dob}</p>
    <p class="position-absolute " style="top:50.5%;left:36%">{course_name}</p>
    <p class="position-absolute " style="top:55%;left:36%">{center_name}</p>
    <div class="position-absolute" style="top:62%;left:43.7%;">
        <img src="upload/images/id_card_{student_id}.png" style="width:110px;height:110px;" alt="">
    </div>
</body>
</html>