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
        text-transform: uppercase;
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
        top: 16.05%;
        left: 29px;
    }

    .test {
        border: 1px solid red
    }

    </style>
</head>

<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/id-card.jpg">
    <div class="position-absolute" id="photo">
        <img src="upload/{image}" style="width:117px;height:153px">
    </div>
    <p class="position-absolute" style="top:14%;left:35.5%;">{roll_no}</p>
    <p class="position-absolute text-capitlize" style="top:16.2%;left:35.5%">{student_name}</p>
    <p class="position-absolute text-capitlize" style="top:18.3%;left:35.5%">{father_name}</p>
    <p class="position-absolute" style="top:20.4%;left:35.5%;width:63%;">{address}</p>
    <p class="position-absolute " style="top:22.6%;left:35.5%">{dob}</p>
    <p class="position-absolute" style="top:24.7%;left:35.5%;width:63%">{course_name}</p>
    <p class="position-absolute" style="top:26.7%;left:35.5%;width:63%">{center_name}</p>
    <div class="position-absolute" style="top:24.1rem;left:45%;">
        <img src="upload/images/id_card_{student_id}.png" style="width:80px;border:1px solid black" alt="">
    </div> 
</body>

</html> 