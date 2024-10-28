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
            top: 17.05%;
            left: 22px;
        }
    </style>
</head>
<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/id-card.jpg">
    <div class="position-absolute" id="photo">
        <img src="upload/{image}" style="width:115px;height:150px">
    </div>
    <p class="position-absolute" style="top:15.2%;left:20rem;">{roll_no}</p>
    <p class="position-absolute" style="top:17.3%;left:36.5%">{student_name}</p>
    <p class="position-absolute" style="top:19.3%;left:36.5%">{father_name}</p>
    <p class="position-absolute " style="top:21.5%;left:36.5%">{address}</p>
    <p class="position-absolute " style="top:23.6%;left:36.5%">{dob}</p>
    <p class="position-absolute " style="top:25.8%;left:36.5%">{course_name}</p>
    <p class="position-absolute " style="top:27.9%;left:36.5%">{center_name}</p>
    <div class="position-absolute" style="top:23.7rem;left:1.7%;">
        <img src="upload/images/id_card_{student_id}.png" style="width:110px;height:110px;" alt="">
    </div>
</body>
</html>
