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
            text-transform: capitalize;
            /* word-spacing: 1px; */
        }
        #photo {
            z-index: 999;
            top: 15.28%;
            left: 15.3rem;
        }
    </style>
</head>
<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/id-card.png">
    <div class="position-absolute" id="photo">
        <img src="upload/{image}" style="width:148px;height:177px">
    </div>
    <p class="position-absolute " style="top:26rem;left:24%">{course_name}</p>
    <p class="position-absolute" style="top:28.7rem;left:25%;">{roll_no}</p>
    <p class="position-absolute" style="top:31.4rem;left:23.5%">{session}</p>
    <p class="position-absolute" style="top:34rem;left:33%">{father_name}</p>
    <p class="position-absolute " style="top:36.6rem;left:18.5%">{dob}</p>
    <p class="position-absolute " style="top:39.3rem;left:20.5%">{gender}</p>
    <p class="position-absolute " style="top:42.1rem;left:38.5%">{admission_date}</p>
    <p class="position-absolute " style="top:44.8rem;left:23.5%">{contact_number}</p>
    <p class="position-absolute " style="top:47.6rem;left:20.5%">{address}</p>
    <p class="position-absolute " style="top:55.9rem;left:10.5%;font-size:20px;width:100%">{center_name}</p>
    
</body>
</html>
