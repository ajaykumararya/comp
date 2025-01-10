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
            top: 13.1%;
            left: 74.8%;
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
    <img id="back-image" class="position-relative" src="{document_path}/id-card.jpg">
    <div class="position-absolute" id="photo">
        <img src="upload/{image}" style="width:158px;height:195px">  
    </div>
    <p class="position-absolute" style="top:15%;left:30%">{roll_no}</p>
    <p class="position-absolute" style="top:18.3%;left:33%">{student_name}</p>
    <p class="position-absolute" style="top:21.7%;left:33%">{father_name}</p>
    <p class="position-absolute" style="top:24.9%;left:28%;">{adhar_card_no} as</p>
    <p class="position-absolute " style="top:28.5%;left:22%">{dob}</p>
    <p class="position-absolute" style="top:32%;left:20%">{course_name}</p>
    <p class="position-absolute " style="top:35.2%;left:20%">{center_name}</p>
    <!-- <p class="position-absolute " style="top:60%;left:45%">{center_email}</p> -->
    <!-- <div class="position-absolute" style="top:59.5%;left:5.2%;">
        <img src="upload/images/id_card_{student_id}.png" style="width:178px;height:165px;" alt="">
    </div> -->
</body>

</html>