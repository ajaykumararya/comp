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
            top: 15.4%;
            left: 82.5%;
        }

        .address {
            width: 600px;
            line-height: .9;
        }
        .test{
            border:1px solid red
        }
    </style>
</head>

<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/id_card.jpg">
    <div class="position-absolute" id="photo">
        <img src="upload/{image}" style="width:76px;height:98px">  
    </div>
    <p class="position-absolute" style="top:13.5%;left:30%">{roll_no}</p>
    <p class="position-absolute" style="top:16.2%;left:30%">{course_name}</p>
    <p class="position-absolute" style="top:18.9%;left:30%">{student_name}</p>
    <p class="position-absolute" style="top:21.6%;left:30%">{father_name}</p>
    <!-- <p class="position-absolute address" style="top:44.2%;left:40%;">{address}</p> -->
    <p class="position-absolute " style="top:24.3%;left:30%">{dob}</p>
    <p class="position-absolute " style="top:27%;left:30%">{session}</p>
    <p class="position-absolute " style="top:29.8%;left:30%">{center_name}</p>
    <p class="position-absolute " style="top:32.5%;left:30%;width:60%">{address}</p>
    <!-- <p class="position-absolute " style="top:60%;left:45%">{center_email}</p> -->
    <!-- <div class="position-absolute" style="top:59.5%;left:5.2%;">
        <img src="upload/images/id_card_{student_id}.png" style="width:178px;height:165px;" alt="">
    </div> -->
</body>

</html>