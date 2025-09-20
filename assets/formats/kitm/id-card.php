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
            top: 14.8%;
            left: 31px;
        }
        .test{
            border:1px solid red
        }
    </style>
</head>
<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/id-card.png">
    <div class="position-absolute" id="photo">
        <img src="upload/{image}" style="width:145px;height:178px;border:3px solid black">
    </div>
    <p class="position-absolute " style="top:12.3%;left:57%">{course_name}</p>
    <p class="position-absolute" style="top:15%;left:57%;">{roll_no}</p>
    <p class="position-absolute" style="top:17.7%;left:57%;"><?=humnize_duration($duration,$duration_type)?></p>
    <p class="position-absolute" style="top:20.4%;left:57%">{student_name}</p>
    <p class="position-absolute" style="top:23.2%;left:57%">{father_name}</p>
    <p class="position-absolute" style="top:25.8%;left:57%;text-transform:capitalize">{gender}</p>
    <p class="position-absolute " style="top:28.5%;left:57%">{center_name}</p>
   
</body>
</html>
