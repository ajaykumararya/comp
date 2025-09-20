<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{student_name} Certificate</title>
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
            top: 72.35%;
            left: 7.1rem;
        }

        #photo1 {
            top: 83.65%;
            left: 31.7%;
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

        .test {
            border: 1px solid red
        }

        .text-center {
            text-align: center
        }
    </style>
</head>

<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/certificate.jpg">
    <!-- <div class="position-absolute" id="photo">
        <img src="upload/{image}" style="width: 64px;height: 83px;">
    </div> -->
    <div class="position-absolute" id="photo1">
        <img src="upload/images/student_certificate_{certiticate_id}.png" style="width:60px;height:60px">
    </div>
    <!-- <p class="position-absolute" style="top:34.2%;left:28%;width:210px">{enrollment_no}</p> -->
    <p class="position-absolute " style="top:40%;left:70%;width:300px">{roll_no}</p>
    <!-- <p class="position-absolute" style="top:2.5%;font-size:12px;left:110px">{serial_no}</p> -->
    <div class="position-absolute" style="top:42%;left:30%">{student_name}</div>
    <div class="position-absolute" style="top:47.8%;left:15%">{father_name}</div>
    <div class="position-absolute" style="top:47.8%;left:82%"><?=generateCourseShortName($course_name)?> - {duration} {duration_type}</div>
    <div class="position-absolute" style="top:64.2%;left:43%;width:600px">{center_name}</div>

    <div class="position-absolute" style="top:59.1%;left:33%;width:100px">{obtain_total}</div>
    <div class="position-absolute" style="top:48.1%;left:24%;width:60px">{grade}</div>
    <p class="position-absolute" style="top:67.5%;left:40%">{from_date}</p>
    <p class="position-absolute" style="top:67.5%;left:62%">{to_date}</p>
    <div class="position-absolute" style="top:88.1%;left:19%">{createdOn}</div>
</body>

</html>