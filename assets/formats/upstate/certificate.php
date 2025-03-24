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
            top: 75.8%;
            left: 10.75%;
        }

        #photo1 {
            top: 61.7%;
            left: 78.5%;
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

<body class="position-relative"><?php
$certificate = ($duration_type == 'month' or ($duration_type == 'year' && $duration == 1)) ? 'certificate' : 'diploma';
?>
    <img id="back-image" class="position-relative" src="{document_path}/<?= $certificate ?>.jpg">
    <div class="position-absolute" id="photo">
        <img src="upload/{image}" style="width: 65px;height: 84px;">
    </div>
    <div class="position-absolute" id="photo1">
        <img src="upload/images/student_certificate_{certiticate_id}.png" style="width:96px;height:96px">
    </div>
    <p class="position-absolute" style="top:43.2%;left:28%;width:210px">{roll_no}</p>
    <p class="position-absolute " style="top:43.2%;left:70%;width:300px">{enrollment_no} 23</p>
    <p class="position-absolute" style="top:2.5%;font-size:12px;left:110px">{serial_no}</p>
    <div class="position-absolute" style="top:35%;left:44%">{student_name}</div>
    <div class="position-absolute" style="top:40%;left:40%">{father_name}</div>
    <div class="position-absolute text-center" style="top:54%;left:37%;width:450px">{course_name}</div>

    <div class="position-absolute text-center " style="top:51.5%;left:9%;width:440px">{center_name}</div>
    <div class="position-absolute" style="top:59.5%;left:22%;width:60px">{grade}</div>

    <div class="position-absolute" style="top:64.1%;left:18%">Lucknow</div>
    <div class="position-absolute text-center" style="top:49%;left:18.5%;width:112px">{cert_session}</div>
    <div class="position-absolute" style="top:68.6%;left:25%">{createdOn}</div>
</body>

</html>