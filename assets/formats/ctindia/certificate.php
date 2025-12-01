<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{student_name} Admit Card</title>
    <style>
        @page {
            margin: 0;
        }

        body {
            margin: 0;
            padding: 0;
            background-image: url("{document_path}/certificate.jpg");
            background-repeat: no-repeat;
            background-size: 100% 100%;   /* FULL A4 PAGE FIT */
        }
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
            top: 60.8%;
            left: 6.2%;
        }
        #photo1
        {
            top: 39.5%;
            left:85.2%;
        }
       
        p{
            font-weight: bold;
            font-size: 16px;
        }
        .middle-div {
            width: 60%;
            margin-left: 9rem;
            text-align: center;
            /* border:1px solid red; */
            font-weight: bold;
        }
        .text-center{
            text-align: center;            
        }
        .t-c{
            text-transform: capitalize;
        }
        .test{
            border: 1px solid red;
        }
    </style>
</head>
<?php
$this->mypdf->addPage('L');
?>
<body class="position-relative">
    <!-- <img id="back-image" class="position-relative" src="{document_path}/certificate.jpg" style="width:100%;height:100%;"> -->
    <div class="position-absolute" id="photo">
        <img src="upload/images/student_certificate_{certiticate_id}.png" style="width: 76px">
    </div>
    <div class="position-absolute" id="photo1">
        <img src="upload/{image}" style="width:91.5px;height:108px">
    </div>


    <p class="position-absolute" style="top:22.3%;left:28%;">{serial_no}</p>
    <p class="position-absolute text-center " style="left:86.3%;top:22.3%;">{roll_no}</p>

    <p class="position-absolute " style="left:28.5%;top:35.8%;width:240px">{student_name}</p>
    <p class="position-absolute " style="width:230px;top:35.8%;left:64.5%">{father_name}</p>
    
    <p class="position-absolute " style="width:300px;left:58.3%;top:40.7%;line-height:1;font-family:freeserif;text-indent: 80px;">
        {course_name}
    </p>
    <p class="position-absolute" style="width:220px%;left:26%;top:40.6%;line-height:1">{dob}</p>

    <p class="position-absolute " style="left:30%;top:44.7%;"><?=humnize_duration($duration,$duration_type)?></p>
    <p class="position-absolute " style="left:58%;top:44.9%;">
        {session}
    </p>

    <p class="position-absolute " style="left:58%;top:49.3%;width:150px">{grade}</p>


    <p class="position-absolute" style="top:75.6%;left:18%;font-size:13px">{createdOn}</p>



    <!-- <p class="position-absolute text-center " style="left: 83.2%;top:61%;width:12%">{enrollment_no}</p>

    <p class="position-absolute text-center" style="left: 23%;top:65%;width:15%">{center_code}</p>
    <p class="position-absolute text-center " style="left: 6%;top:62.5%;width:86%">
        <p style="text-align:centerfont-weight:900;font-family:freeserif;font-size:14px;text-indent: 65%; text-align:justify;line-height:2.5">
            {center_name}
        </p>
    </p> -->


    <!-- <p class="position-absolute text-center t-c" style="left:60%;top:59%;">{duration} {duration_type}</p> -->
    <!-- <p class="position-absolute text-center" style="width:450px;left:20%;top:61.7%;">{course_name}</p> -->
    
    <!-- <p class="position-absolute text-center" style="width:450px;left:20%;top:66.7%;">{from_date} - {to_date}</p> -->
    
    <!-- <p class="position-absolute text-center" style="width:450px;left:20%;top:74.7%;">{center_name}</p> -->

    
</body>

</html>