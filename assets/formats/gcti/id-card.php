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
            top: 16.3%;
            left: 23px;
        }
    </style>
</head>
<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/id-card.jpg">
    <div class="position-absolute" id="photo">
        <img src="upload/{image}" style="width:111px;height:144.5px">
    </div>
    <p class="position-absolute" style="top:14.5%;left:34%;">{roll_no}</p>
    <p class="position-absolute" style="top:16.9%;left:34%">{student_name}</p>
    <p class="position-absolute" style="top:19.2%;left:34%">{father_name}</p>
    <!-- <p class="position-absolute test" style="top:20.4%;left:34%">{address}</p> -->
    <p class="position-absolute " style="top:21.8%;left:34%">{dob}</p>
    <p class="position-absolute test" style="top:24%;left:34%">{course_name}</p>
    <p class="position-absolute test" style="top:26.5%;left:34%">{center_name}</p>
    <div class="position-absolute" style="top:23.2rem;left:43.4%;">
        <img src="upload/images/id_card_{student_id}.png" style="width:105px" alt="">
    </div>
</body>
</html>
