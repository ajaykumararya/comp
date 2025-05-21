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
            width: 500px;
            /* word-spacing: 1px; */
        }
        #photo {
            z-index: 999;
            top: 16.05%;
            left: 22px;
        }
    </style>
</head>
<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/Id-card.jpg">
    <div class="position-absolute" id="photo">
        <img src="upload/{image}" style="width:115px;height:150px">
    </div>
    <p class="position-absolute" style="top:14%;left:34%;">{roll_no}</p>
    <p class="position-absolute" style="top:16.2%;left:34%">{student_name}</p>
    <p class="position-absolute" style="top:18.3%;left:34%">{father_name}</p>
    <p class="position-absolute test" style="top:20.4%;left:34%">{address}</p>
    <p class="position-absolute " style="top:22.6%;left:34%">{dob}</p>
    <p class="position-absolute test" style="top:24.7%;left:34%">{course_name}</p>
    <p class="position-absolute test" style="top:26.7%;left:34%">{center_name}</p>
    <div class="position-absolute" style="top:23.3rem;left:43.4%;">
        <img src="upload/images/id_card_{student_id}.png" style="width:105px" alt="">
    </div>
</body>
</html>
