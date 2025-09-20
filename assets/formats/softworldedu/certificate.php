<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{student_name} Admit Card</title>
    <style>
        * {
            font-weight: bold;
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

        span {
            font-weight: bold;
            color: #1a4891;
            font-size: 14px;
            display: inline-block;
        }

        #photo {
            z-index: 999;
            top: 77.7%;
            left: 4.35rem;
        }
       
        p{
            font-weight: bold;
        }
        .middle-div {
            width: 60%;
            margin-left: 9rem;
            text-align: center;
            /* border:1px solid red; */
            font-weight: bold;
            font-size: 18px;
        }
        #photo1 {
            z-index: 999;
            top: 64rem;
            right: 7rem;
            width: 120px !important;
            height: 95px;
        }
        #center_signature{
            z-index: 999;
            top: 64rem;
            left: 19rem;
            width: 120px !important;
            height: 95px;
        }
        .test{
            border:1px solid red
        }
    </style>
</head>

<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/certificate.jpg">
    <div class="position-absolute" id="photo">
        <img src="upload/images/student_certificate_{certiticate_id}.png" style="height:160px;width:130px">
    </div>
    <div class="position-absolute w-100" style="top:40.5%;padding-left:7px;z-index:9999">

        <div class="middle-div">{student_name}</div>

        <div class="middle-div" style="margin-top:2rem">{father_name}</div>
        <div class="middle-div" style="margin-top:2rem">{enrollment_no}</div>
        <div class="middle-div" style="margin-top:2rem">{course_name}</div>
        <div class="middle-div" style="margin-top:2rem">{session}</div>
        <div class="middle-div text-capitlize" style="margin-top:.2rem;margin-left:10rem;">{duration} {duration_type}</div>

        <div class="middle-div" style="margin-top:1.6rem;width:70%">{center_name}</div>



    </div>
    <p class="position-absolute" style="top:69.6%;left:52%">{createdOn}</p>
    <p class="position-absolute" style="top:3.4%;left:17%">{serial_no}</p>

    <div class="position-absolute" id="photo1">
        <img src="{document_path}/director_sign.png" style="width:94.7px;height:50px">
    </div>

    <div class="position-absolute" id="center_signature">
        <img src="upload/{center_signature}" style="width:94.7px;height:50px">
    </div>

</body>

</html>