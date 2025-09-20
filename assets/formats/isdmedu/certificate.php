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
            font-weight: bold;

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
            top: 33.4%;
            left: 4.6rem;
        }

        #photo1 {
            top: 33.6%;
            left: 24.15rem;
        }

        p {
            font-weight: bold;
        }

        .middle-div {
            width: 60%;
            margin-left: 9rem;
            text-align: center;
            /* border:1px solid red; */
            font-weight: bold;
        }

        .text-center {
            text-align: center;
        }

        .t-c {
            text-transform: capitalize;
        }
        .test{
            border:1px solid red
        }
    </style>
</head>

<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/certificate.jpg">
    <div class="position-absolute" id="photo">
        <img src="upload/images/student_certificate_{certiticate_id}.png" style="width: 94px;
            height: 88px;">
    </div>
    <div class="position-absolute" id="photo1">
        <img src="upload/{image}" style="width:110px;height:122.3px">
    </div>
    <div class="position-absolute" style="top:33.7%;left:81.7%;">
        <img src="upload/{centre_logo}" style="width: 80px;height:73px;" alt="">
    </div>

    <p class="position-absolute" style="left:22%;top:41.2%;">{enrollment_no}</p>
    <p class="position-absolute" style="left:74%;top:41.2%;width:140px">{roll_no}</p>

    <!-- <p class="position-absolute" style="top:2.5%;left:20%;">{certiticate_id}</p> -->
    <p class="position-absolute" style="top:63.2%;left:75%;">{createdOn}</p>
    <p class="position-absolute" style="top:63.2%;left:50%;">{session}</p>
    <p class="position-absolute" style="top:63.2%;left:28%;">{percentage} %</p>

    <div class="position-absolute" style="left:22%;top:48.5%;">{student_name}</div>
    <div class="position-absolute" style="top:51.3%;left:20%">{father_name}</div>
    <div class="position-absolute" style="top:51.3%;left:69%">{mother_name}</div>

    <div class="position-absolute text-center" style="left:27%;top:54%;">{course_name}</div>
    <div class="position-absolute text-center t-c" style="left:26%;top:57%;">{duration} {duration_type}</div>

    <div class="position-absolute text-center" style="left:44.5%;top:57%;">{from_date}</div>
    <div class="position-absolute text-center" style="left:62%;top:57%">{to_date}</div>

    <div class="position-absolute text-center" style="left:86%;top:57%;">{grade}</div>
    <div class="position-absolute text-center" style="left:42%;top:59.8%;">{center_name}</div>


</body>

</html>