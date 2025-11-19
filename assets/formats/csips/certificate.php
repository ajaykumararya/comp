<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{student_name} Certificate </title>
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
            font-size: 14.5px;
            display: inline-block;
        }

        #photo {
            z-index: 999;
            top:30.15%;left:76.1%;
        }

        #photo1 {
            top: 30.9%;
            left: 63.15%;
        }

        p {
            font-weight: bold;
            /*border:1px solid red;*/
            font-size: 15px;
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
        <img src="upload/images/student_certificate_{certiticate_id}.png" style="width: 132px">
    </div>
    <div class="position-absolute" id="photo1">
        <img src="upload/{image}" style="width:89px;height:115.5px">
    </div>





    <p class="position-absolute  " style="top:2.3%;left:13%;width:148px;font-size:12px">{serial_no}</p>
    <p class="position-absolute  " style="top:2.3%;left:83%;width:148px;font-size:12px">{center_code}</p>
    <!--<p class="position-absolute text-center " style="top:27.4%;left:21.5%;width:147px">{session}</p>-->
    <!--<p class="position-absolute text-center " style="top:27.4%;left:40%;width:147px;font-size:13px">{roll_no}</p>-->
    <!--<p class="position-absolute text-center " style="top:27.4%;left:59%;width:147px;font-size:13px">{enrollment_no}</p>-->
    <!--<p class="position-absolute text-center " style="top:27.4%;left:77.8%;width:147px">{serial_no}</p>-->

    <p class="position-absolute text-center " style="left:10%;top:44.5%;width:80%">{student_name}</p>
    <p class="position-absolute " style="left:35%;top:47.4%;width:60%">{father_name}</p>
    <p class="position-absolute text-center  " style="left:10%;top:53%;width:80%">{course_name}</p>
    <p class="position-absolute text-center" style="left:35%;top:58.8%;width:18%">{roll_no}</p>
    <p class="position-absolute text-center" style="left:65.7%;top:58.8%;width:18%">{enrollment_no}</p>

    <p class="position-absolute text-center" style="left:54%;top:61.7%;width:50px">{grade}</p>
    <p class="position-absolute text-center" style="left:34%;top:64.5%;width:95px"><?=humnize_duration($duration,$duration_type)?></p>
    <p class="position-absolute " style="left:58%;top:64.5%;width:250px">{session}</p>
    <p class="position-absolute text-center " style="left:40%;top:56.2%;width:15%">{percentage}%</p>
    <!--<p class="position-absolute text-center  " style="left:62.5%;top:56%;width:250px">{mother_name}</p>-->



    <!-- <p class="position-absolute text-center text-capitlize" style="left:10%;top:65.8%;width:80%">{exam_conduct_date}</p> -->
    <!--<p class="position-absolute text-center  " style="left:57%;top:62.2%;width:120px">{from_date}</p>-->
    <!--<p class="position-absolute text-center  " style="left:78%;top:62.2%;width:140px">{to_date}</p>-->


    <!-- exam_conduct_date -->

    <p class="position-absolute text-center " style="left:10%;top:70.5%;width:80%">{center_name}</p>
    <p class="position-absolute text-center " style="left:10%;top:73.3%;width:80%"><?=get_route($center_city,'city')?>, <?=get_route($center_state,'state')?></p>
    <p class="position-absolute" style="top:76%;left:51.3%">{createdOn}</p>
    <?php
    // if (file_exists('upload/' . $center_signature)) {
    //     echo '<div class="position-absolute" style="top:75.5%;left:8%;width:180px;height:60px" align="center">
    //     <img src="upload/{center_signature}" style="width:100%;height:100%;">
    // </div>';
    // }

    ?>
</body>

</html>