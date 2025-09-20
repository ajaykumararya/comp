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
            font-size: 14px;  /* Absolute Positioning */
            max-width: 490px; 
        }
        .ellipsis-text {
            max-width: 490px;    /* Fix Width */
            white-space: nowrap; /* Prevent Line Break */
            overflow: hidden;    /* Hide Overflow */
            text-overflow: ellipsis; /* Add "..." */
            }
        #photo {
            z-index: 999;
            top: 16.05%;
            left: 18px;
        }
    </style>
</head>
<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/id_card.jpg">
    <div class="position-absolute" id="photo">
        <img src="upload/{image}" style="width:136px;height:176px">
    </div>
    <p class="position-absolute" style="top:14%;left:20rem;">{roll_no}</p>
    <p class="position-absolute" style="top:16.2%;left:36.5%">{student_name}</p>
    <p class="position-absolute" style="top:18.3%;left:36.5%">{father_name}</p>
    <p class="position-absolute " style="top:20.4%;left:36.5%;line-height:1"><span class="ellipsis-text">{address}</span></p>
    <p class="position-absolute " style="top:22.6%;left:36.5%">{dob}</p>
    <p class="position-absolute " style="top:22.6%;left:75%">{center_code}</p>
    <p class="position-absolute " style="top:24.7%;left:36.5%">{course_name}</p>
    <p class="position-absolute " style="top:26.7%;left:36.5%">{center_name}</p>
    <p class="position-absolute " style="top:29%;left:36.5%">{contact_number}</p>
    <p class="position-absolute " style="top:29%;left:75%">{alternative_mobile}</p>
    <div class="position-absolute" style="top:24.7rem;left:44.8%;">
        <img src="upload/images/id_card_{student_id}.png" style="width:82px;" alt="">
    </div>
</body>
</html>
