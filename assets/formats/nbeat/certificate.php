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
            top: 78.9%;
            left: 55.1%;
        }

        #photo1 {
            top: 33%;
            left: 74.3%;
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
            bottom: 11%;
            left: 65%;
        }
    </style>
</head>

<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/certificate.jpg">
    <!-- <div class="position-absolute" id="photo">
        <img src="upload/images/student_certificate_{certiticate_id}.png" style="width: 93px;
            height: 93px;">
    </div> -->
    <div class="position-absolute" id="photo1">
        <img src="upload/{image}" style="width:91px;height:106px">
    </div>


    <p class="position-absolute " style="top:18%;left:24%;width:120px">{enrollment_no}</p>
    <p class="position-absolute" style="top:18%;left:76.6%;width:122px">{roll_no}</p>

    <div class="position-absolute " style="left:48%;top:44.5%;">{student_name}</div>
    <div class="position-absolute " style="width:340px;top:48.3%;left:40%">{father_name}</div>
    <div class="position-absolute " style="top:52%;left:30%">{dob}</div>

    <!-- <div class="position-absolute text-center" style="width:450px;left:20%;top:56.5%;">{enrollment_no}</div> -->
    <div class="position-absolute" style="width:680px;left:15%;top:55.4%;">{course_name}</div>
    <div class="position-absolute text-center t-c" style="left:18%;top:62.6%;">{duration} {duration_type}</div>

    <div class="position-absolute text-center" style="width:160px;left:38%;top:62.6%;">{from_date}</div>
    <div class="position-absolute text-center" style="width:140px;left:64%;top:62.6%;">{to_date}</div>

    <div class="position-absolute text-center" style="left:24%;top:69.6%;width:150px">{grade}</div>
    <div class="position-absolute text-center" style="left:21.5%;top:75.5%;width:150px">{createdOn}</div>
    <div class="position-absolute" style="width:580px;left:21.5%;top:58.8%;">{center_name}</div>
    <!-- createdOn -->
    <?php
    if (file_exists('upload/' . $center_signature)) {
        ?>
        <div class="position-absolute" id="center_signature">
            <img src="upload/{center_signature}" style="width:200px;height:80px">
        </div>
        <?php
    }
    ?>

</body>

</html>