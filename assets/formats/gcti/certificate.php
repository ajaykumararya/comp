<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{student_name} Admit Card</title>
    <style>
        * {
            font-weight: bold;
            /*text-transform: capitalize;*/

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
            font-size: 15px;
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
            top: 85%;
            left: 44.2%;
            padding: 0;
        }

        #photo1 {
            top: 27.4%;
            left: 43.3%;
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

        div {
            /*text-transform: uppercase!important;*/
        }

        .test {
            border: 1px solid red
        }

        /* #center_signature {
            z-index: 999;
            bottom: 10%;
            left: 65%;
        } */
        #center_signature {
            bottom: 8.7%;
            left: 67%;
            padding: 0;
            width: 210px
        }
    </style>
</head>

<body class="position-relative">
    <?php
    if($this->student_model->isAdminOrCenter())
        echo'<img id="back-image" class="position-relative" src="{document_path}/certificate.jpg">';
    ?>
    <!-- <img id="back-image" class="position-relative" src="{document_path}/certificate.jpg"> -->
    <div class="position-absolute" id="photo">
        <img src="upload/images/student_certificate_{certiticate_id}.png" style="width: 90px">
    </div>
    <div class="position-absolute" id="photo1">
        <img src="upload/{image}" style="width:104px;height:134px">
    </div>

    <!-- <p class="position-absolute " style="top:30.4%;left:8%;width:130px;text-align:center">{center_code}</p>
    <p class="position-absolute " style="top:30.4%;left:25%;width:130px;text-align:center">{session}</p> -->
    <p class="position-absolute" style="top:2.3%;left:80%;width:130px;font-size:12px">{roll_no}</p>
    <p class="position-absolute" style="top:2.3%;left:20.2%;width:130px;font-size:12px">{enrollment_no}</p>
    <!-- <p class="position-absolute " style="top:30.4%;left:75%;width:130px;text-align:center">{serial_no}</p> -->


    <div class="position-absolute " style="left:40%;top:47.3%;">{student_name}</div>
    <div class="position-absolute" style="width:246px;top:50.2%;left:16.5%;">{father_name}</div>
    <div class="position-absolute" style="width:240px;top:50.2%;left:64%;">{mother_name}</div>
    <div class="position-absolute " style="top:47.3%;left:80.6%">{dob}</div>

    <!-- <div class="position-absolute text-center" style="width:450px;left:20%;top:56.5%;">{enrollment_no}</div> -->
    <div class="position-absolute" style="width:680px;left:20%;top:53.1%;">{course_name}</div>
    <div class="position-absolute text-center t-c text-capitlize" style="left:29%;top:56.3%;">
        <?=humnize_duration($duration,$duration_type)?>
    </div>

    <div class="position-absolute text-center" style="width:160px;left:59%;top:56.3%;">{from_date}</div>
    <div class="position-absolute text-center" style="width:140px;left:76%;top:56.3%;">{to_date}</div>
    <div class="position-absolute text-center" style="width:140px;left:74%;top:59.2%;">{to_date}</div>

    <!-- <div class="position-absolute text-center" style="left:24%;top:69.6%;width:150px">{grade}</div> -->
    <div class="position-absolute " style="left:50%;top:69.5%;width:150px;">{createdOn}</div>
    <!-- <div class="position-absolute " style="left:17%;top:94%;width:150px;font-size:13px">NEW DELHI</div> -->
    <div class="position-absolute" style="width:580px;left:38%;top:62.3%">{center_name}</div>
    <!-- createdOn -->
    <div class="position-absolute text-center" style="width:140px;left:44%;top:65.3%;">{percentage}%</div>
    <div class="position-absolute text-center" style="width:140px;left:80%;top:65.3%;">{grade}</div>


</body>

</html>