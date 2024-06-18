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
            font-size: 24px;
            width: 400px;
            /* word-spacing: 1px; */
        }

        #photo {
            z-index: 999;
            top: 20%;
            left: 30%;
        }
        .photo{
            width:115px;
            height:150px;
            border-radius: 505px; /* CSS3 syntax */
            -webkit-border-radius: 505px; /* For compatibility */
            -moz-border-radius: 505px; /* For compatibility */
        }
        .test{
            border:1px solid red
        }
    </style>
</head>

<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/id-card.jpg">
    <div class="position-absolute" id="photo">
        <img src="upload/{image}" class="photo">
    </div>
    <p class="position-absolute" style="top:11%;left:20rem;">{roll_no}</p>
    <p class="position-absolute" style="top:40.3%;left:22.5%">{student_name}</p>
    <!-- <p class="position-absolute" style="top:19.3%;left:36.5%">{father_name}</p> -->

    <p class="position-absolute " style="top:45%;left:22.8%">{course_name}</p>
    <p class="position-absolute text-capitlize" style="top:49.8%;left:26.5%">{duration} {duration_type}</p>

    <p class="position-absolute " style="top:54.4%;left:26.5%">{admission_date}</p>

    <p class="position-absolute" style="top:62.9%;left:5%;width:90%;text-align:center">{center_name}</p>
    <!-- <div class="position-absolute" style="top:23.7rem;left:1.7%;">
        <img src="upload/images/id_card_{student_id}.png" style="width:110px;height:110px;" alt="">
    </div> -->
</body>

</html>