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
            top: 85.2%;
            left: 35%;
        }
        #photo1
        {
            top: 37.5%;
            left: 45.35%;
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
        .text-center{
            text-align: center;            
        }
        .t-c{
            text-transform: capitalize;
        }
    </style>
</head>
<?php
$this->mypdf->addPage('L');
?>
<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/1/certificate.jpg">
    <div class="position-absolute" id="photo">
        <img src="upload/images/student_certificate_{certiticate_id}.png" style="width: 58px">
    </div>
    <div class="position-absolute" id="photo1">
        <img src="upload/{image}" style="width:99.5px;height:129px">
    </div>


    <p class="position-absolute" style="top:85.6%;left:21.6%;font-size:13px">{roll_no}</p>
    <p class="position-absolute" style="top:88.7%;left:26%;font-size:12px">{createdOn}</p>

    <div class="position-absolute text-center" style="width:450px;left:20%;top:55%;">{student_name}</div>
    <!-- <div class="position-absolute text-center" style="width:450px;top:54.3%;left:20%">{father_name}</div>
    
    <div class="position-absolute text-center" style="width:450px;left:20%;top:59.2%;">{enrollment_no}</div>
    <div class="position-absolute text-center" style="width:450px;left:20%;top:64%;">{course_name}</div>
    
    <div class="position-absolute text-center" style="width:450px;left:20%;top:68.7%;">{from_date} - {to_date}</div>
    
    <div class="position-absolute text-center" style="left:40%;top:73.6%;width:150px">{obtain_total}</div>
    <div class="position-absolute text-center" style="width:450px;left:20%;top:78.2%;">{center_name}</div> -->

    
</body>

</html>