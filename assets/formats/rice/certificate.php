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

        div.position-absolute {
            font-size: 18px;
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
            top: 69.7%;
            left: 45.6%;
        }

        #photo1 {
            top: 28.8%;
            left: 74.65%;
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

        .test {
            border: 1px solid red
        }

        #center_signature {
            z-index: 999;
            top: 43rem;
            left: 22rem;
        }
        p{
            /* border:1px solid red */
        }
        .tc{
            text-align: center;
        }
    </style>
</head>
<?php
$this->mypdf->addPage('L');
?>
<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/certificate.jpg">
    <div class="position-absolute" id="photo">
        <img src="upload/images/student_certificate_{certiticate_id}.png" style="width: 93px;
            height: 93px;">
    </div>
    <div class="position-absolute" id="photo1">
        <img src="upload/{image}" style="width:97px;height:124.5px">
    </div>


    <p class="position-absolute text-center" style="top:4.5%;left:15%;width:180px">{serial_no}</p>
    <p class="position-absolute text-center" style="top:4.5%;left:78%;width:132px">{enrollment_no}</p>

    <p class="position-absolute tc" style="width:295px;top:44%;left:32%">{student_name}</p>
    <p class="position-absolute tc" style="width:315px;top:44%;left:67%">{father_name}</p>
    <p class="position-absolute tc" style="width:385px;top:48.5%;left:32.5%;line-height:1">{course_name}</p>
    <p class="position-absolute tc" style="width:100px;top:48.1%;left:79%"><?=humnize_duration($duration,$duration_type)?></p>
   
    <p class="position-absolute tc" style="width:400px;top:52.3%;left:26%">{center_name}</p>
   
   <p class="position-absolute" style="top:56.8%;left:34%">{to_date}</p>
   <p class="position-absolute" style="top:56.8%;left:56%">{percentage} %</p>
   <p class="position-absolute text-center" style="top:61%;left:56%;width:90px">{obtain_total}</p>
   <p class="position-absolute text-center" style="top:64%;left:50%;width:100px">{createdOn}</p>
    <!-- <p class="position-absolute " style="width:340px;top:45.3%;left:40%">{father_name}</p> -->
<!-- 
    <div class="position-absolute " style="width:680px;left:33%;top:49.5%;">{course_name}</div>

    <div class="position-absolute text-center" style="width:160px;left:38%;top:54%;">{from_date}</div>
    <div class="position-absolute text-center" style="width:140px;left:54.5%;top:54%;">{to_date}</div>

    <div class="position-absolute text-center" style="left:78%;top:67.3%;width:150px">{grade}</div>
    <div class="position-absolute text-center" style="left:58.5%;top:73.5%;width:150px">{createdOn}</div>
    <div class="position-absolute" style="width:580px;left:42%;top:58.5%;">{center_name}</div> -->
    <!-- createdOn -->
    

</body>

</html>