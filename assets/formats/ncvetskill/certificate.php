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
        #photo1
        {
            top: 47%;
            left: 80.5%;
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
        }
        .test{
            border:1px solid red
        }
        .text-center{
            text-align:center
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
    <div class="position-absolute" style="top:40%;left:44%">{student_name}</div>
    <div class="position-absolute" style="top:32%;left:40%">{father_name}</div>
    <!-- <div class="position-absolute" style="top:49%;left:26%">{mother_name}</div> -->
    <!-- <div class="position-absolute" style="top:49%;left:74%">{dob}</div> -->
    <div class="position-absolute" style="top:44.2%;left:50%;width:350px">{course_name}</div>
    
    <div class="position-absolute text-center" style="top:41.5%;left:12%;width:440px">{center_name}</div>

    <!-- <div class="position-absolute" style="top:63.83%;left:54%;width:100%">{obtain_total}</div> -->
    <div class="position-absolute" style="top:48.1%;left:24%;width:60px">{grade}</div>

    <div class="position-absolute" style="top:51.8%;left:20%">Lacknow</div>
    <div class="position-absolute" style="top:39%;left:22.5%">{session}</div>
    <div class="position-absolute" style="top:55.3%;left:27%">{createdOn}</div>
</body>

</html>