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
            top: 32%;
            left: 4.1%;
        }
        #photo1
        {
            top: 25.7%;
            left:79.95%;
        }
       
        p{
            font-weight: bold;
            font-size: 14px;
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
    <img id="back-image" class="position-relative" src="{document_path}/certificate.jpg">
    <div class="position-absolute" id="photo">
        <img src="upload/images/student_certificate_{certiticate_id}.png" style="width: 109px;
            height: 105px;">
    </div>
    <div class="position-absolute" id="photo1">
        <img src="upload/{image}" style="width:117px;height:141px">
    </div>


    <p class="position-absolute" style="top:74%;left:35%;">{serial_no}</p>
    <p class="position-absolute" style="top:74%;left:17%;">{createdOn}</p>

    <p class="position-absolute text-center " style="width:60%;left:30%;top:46.5%;">{student_name}</p>
    <!-- <p class="position-absolute text-center" style="width:380px;top:43%;left:60%">{father_name}</p> -->
    
    <p class="position-absolute text-center " style="width:53%;left:13%;top:56%;">{course_name}</p>
    <p class="position-absolute text-center " style="width:15%;left:75%;top:56%;"><?=humnize_duration($duration,$duration_type)?></p>
    <p class="position-absolute text-center " style="left:56.3%;top:61%;width:15%">{roll_no}</p>
    <p class="position-absolute text-center " style="left: 83.2%;top:61%;width:12%">{enrollment_no}</p>
    <p class="position-absolute text-center" style="left: 23%;top:65%;width:15%">{center_code}</p>
    <p class="position-absolute text-center " style="left: 6%;top:62.5%;width:86%">
        <p style="text-align:centerfont-weight:900;font-family:freeserif;font-size:14px;text-indent: 65%; text-align:justify;line-height:2.5">
            {center_name}
        </p>
    </p>


    <!-- <p class="position-absolute text-center t-c" style="left:60%;top:59%;">{duration} {duration_type}</p> -->
    <!-- <p class="position-absolute text-center" style="width:450px;left:20%;top:61.7%;">{course_name}</p> -->
    
    <!-- <p class="position-absolute text-center" style="width:450px;left:20%;top:66.7%;">{from_date} - {to_date}</p> -->
    
    <p class="position-absolute text-center" style="left:23%;top:61%;width:150px">{grade}</p>
    <!-- <p class="position-absolute text-center" style="width:450px;left:20%;top:74.7%;">{center_name}</p> -->

    
</body>

</html>