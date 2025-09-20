<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{student_name} Admit Card</title>
    <style>
        * {
            font-weight: bold;
            text-transform: uppercase;

        }

        .text-capitlize {
            text-transform: uppercase;
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
            top: 76%;
            left: 8.8%;
        }

        #photo1 {
            top: 29%;
            left: 78.8%;
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

        div{
            text-transform: uppercase!important;
        }

        .test {
            border: 1px solid red
        }

        #center_signature {
            z-index: 999;
            bottom: 11%;
            left: 65%;
        }
    </style>
</head>

<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/certificate.jpg">
    <div class="position-absolute" id="photo">
        <img src="upload/images/student_certificate_{certiticate_id}.png" style="width: 110px;
            height: 112px;">
    </div>
    <div class="position-absolute" id="photo1">
        <img src="upload/{image}" style="width:102px;height:127px">
    </div>


    <!-- <p class="position-absolute " style="top:18%;left:24%;width:120px">{enrollment_no}</p> -->

    <div class="position-absolute text-center" style="left:32%;top:42.5%;width:480px">{student_name}</div>
    <!-- <div class="position-absolute " style="width:340px;top:48.3%;left:40%">{father_name}</div> -->
    <!-- <div class="position-absolute " style="top:52%;left:30%">{dob}</div> -->

    <!-- <div class="position-absolute text-center" style="width:450px;left:20%;top:56.5%;">{enrollment_no}</div> -->
    <div class="position-absolute text-center" style="width:980px;left:7%;top:54.5%;">{course_name}</div>
    <p class="position-absolute text-center" style="top:59.5%;left:41.5%;width:120px">{roll_no}</p>
    <p class="position-absolute text-center" style="left:58.1%;top:59.5%;width:82px;font-size:14px">{createdOn}</p>
    <p class="position-absolute text-center" style="left:69.5%;top:59.5%;width:60px"><?=$percentage >= 35 ? 'PASS' : 'FAIL'?></p> 
    <p class="position-absolute" style="top:63%;left:46%;width:720px">{center_name}</p>

    <!-- <div class="position-absolute text-center t-c" style="left:18%;top:62.6%;">{duration} {duration_type}</div> -->

    <!-- <div class="position-absolute text-center" style="width:160px;left:38%;top:62.6%;">{from_date}</div> -->
    <!-- <div class="position-absolute text-center" style="width:140px;left:64%;top:62.6%;">{to_date}</div> -->

    <!-- <div class="position-absolute text-center" style="left:24%;top:69.6%;width:150px">{grade}</div> -->
    <!--  -->
    <!-- <div class="position-absolute" style="width:580px;left:21.5%;top:58.8%;">{center_name}</div> -->
    <!-- createdOn -->
    <?php
    /*
    if (file_exists('upload/' . $center_signature)) {
        ?>
        <div class="position-absolute" id="center_signature">
            <img src="upload/{center_signature}" style="width:200px;height:80px">
        </div>
        <?php
    }*/
    ?>

</body>

</html>