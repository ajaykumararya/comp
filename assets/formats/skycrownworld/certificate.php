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
            top: 84.8%;
            left: 83%;
        }

        #photo1 {
            top: 28.1%;
            left: 41.8%;
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
    </style>
</head>

<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/certificate.jpg">
    <div class="position-absolute" id="photo">
        <img src="upload/images/student_certificate_{certiticate_id}.png" style="width: 93.5px">
    </div>
    <div class="position-absolute" id="photo1">
        <img src="upload/{image}" style="width:127.5px;height:166px">
    </div>


    <p class="position-absolute text-center" style="top:4.7%;left:21%;width:400px;text-align:left">UDYAM-BR-37-0039467
    </p>




    <p class="position-absolute text-center " style="top:23%;left:6.3%;width:138px">{center_code}</p>
    <p class="position-absolute text-center " style="top:23%;left:24%;width:138px">{session}</p>
    <p class="position-absolute text-center " style="top:23%;left:41%;width:138px">{enrollment_no}</p>
    <p class="position-absolute text-center " style="top:23%;left:58.2%;width:138px">{roll_no}</p>
    <p class="position-absolute text-center " style="top:23%;left:76%;width:138px">{serial_no}</p>

    <p class="position-absolute text-center" style="left:32%;top:46.8%;width:320px">{student_name}</p>
    <p class="position-absolute text-center " style="left:78%;top:46.8%;width:100px">{dob}</p>

    <p class="position-absolute text-center " style="left:16.5%;top:49.5%;width:250px">{father_name}</p>
    <p class="position-absolute text-center  " style="left:62.5%;top:49.5%;width:250px">{mother_name}</p>

    <p class="position-absolute text-center  " style="left:18%;top:52.3%;width:78%">{course_name}</p>


    <p class="position-absolute text-center text-capitlize" style="left:21%;top:55.3%;width:250px">{duration}
        {duration_type}</p>
    <p class="position-absolute text-center  " style="left:60%;top:55.3%;width:120px">{from_date}</p>
    <p class="position-absolute text-center  " style="left:78%;top:55.3%;width:140px">{to_date}</p>


    <!-- exam_conduct_date -->

    <p class="position-absolute text-center " style="left:72%;top:58%;width:180px">
        <?= date('M Y', strtotime($exam_conduct_date)) ?></p>

    <p class="position-absolute text-center " style="left:38%;top:61%;width:455px">{center_name}</p>
    <p class="position-absolute text-center " style="left:38%;top:64%;width:455px">{percentage}%</p>
    <p class="position-absolute" style="top:76.8%;left:45%">{createdOn}</p>
    <?php
    if (file_exists('upload/' . $center_signature)) {
        echo '<div class="position-absolute" style="top:75.5%;left:8%;width:180px;height:60px" align="center">
        <img src="upload/{center_signature}" style="width:100%;height:100%;">
    </div>';
    }

    ?>
</body>

</html>