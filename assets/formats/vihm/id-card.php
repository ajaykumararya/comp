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
            top: 28%;
            left: 79.5%;
        }

        .text-upper{
            text-transform: uppercase!important;
        }
    </style>
</head>
<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/id-card.jpg">
    <div class="position-absolute" id="photo">
        <img src="upload/{image}" style="width:123px;height:131px">
    </div>
    <p class="position-absolute" style="top:19.5rem;left:31%;text-transform: uppercase;">{roll_no}</p>
    <p class="position-absolute" style="top:21.7rem;left:33%">{student_name}</p>
    <p class="position-absolute" style="top:24rem;left:33%">{father_name}</p>
    <p class="position-absolute " style="top:26.5rem;left:21%;line-height:1; text-transform: uppercase;">{course_name}</p>
    <p class="position-absolute " style="top:28.6rem;left:33%">{dob}</p>
    <p class="position-absolute " style="top:30.9rem;left:33%;text-transform: uppercase;">{duration} {duration_type}<?=$duration > 1 ? 's' :''?></p>
    <!-- <p class="position-absolute " style="top:42.1rem;left:38.5%">{admission_date}</p>
    <p class="position-absolute " style="top:44.8rem;left:23.5%">{contact_number}</p>
    <p class="position-absolute " style="top:47.6rem;left:20.5%">{address}</p> -->
    <p class="position-absolute text-upper" style="top:55.9rem;left:5%;font-size:20px;width:65%;text-align:center">{center_name}</p>
    
</body>
</html>
