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
            top: 84.2%;
            left: 5.5%;
        }
        #photo1
        {
            top: 31.75%;
            left: 85.5%;
            z-index:999
        }
       
        p{
            font-weight: bold;
            font-size: 13px;
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

<body class="position-relative">
    <?php
    $certificate = ($duration_type == 'month' OR ($duration_type == 'year' && $duration == 1)) ? 'certificate' : 'diploma';
    ?>
    <img id="back-image" class="position-relative" src="{document_path}/<?=$certificate?>.jpg">
    <div class="position-absolute" id="photo">
        <img src="upload/images/student_certificate_{certiticate_id}.png" style="width: 70px">
    </div>
    <div class="position-absolute" id="photo1">
        <img src="upload/{image}" style="width:76px;height:95px">
    </div>


    <p class="position-absolute" style="top:-0.2%;left:12%;width:200px">{serial_no}</p>
    <p class="position-absolute" style="bottom:5%;left:19%;font-size:13px">{createdOn}</p>
    <p class="position-absolute" style="bottom:3.2%;left:15%;font-size:13px">New Delhi</p>

    <p class="position-absolute text-center" style="width:155px;left:35%;top:42.2%;">{student_name}</p>
    <p class="position-absolute text-center" style="width:190px;left:75%;top:42.2%;">{father_name}</p>

    <p class="position-absolute text-center " style="width: 65.5%;left:33%;top:47.9%;">{course_name}</p>

    <p class="position-absolute text-center text-capitlize" style="width:75px;left:11.5%;top:53.8%;"><?=humnize_duration($duration,$duration_type)?></p>

    <p class="position-absolute text-center" style="width:145px;left:39%;top:53.8%;">{roll_no}</p>
    <p class="position-absolute text-center" style="width:50px;left:62%;top:53.8%;font-size:10px">{from_date}</p>
    <p class="position-absolute text-center" style="width:50px;left:70%;top:53.8%;font-size:10px">{to_date}</p>
    
    
    <p class="position-absolute text-center " style="width:80%;left:18%;top:59.4%;">{center_name}</p>
    
    <!-- <p class="position-absolute text-center " style="width:180px;left:42%;top:69.7%;">{to_date}</p> -->
    <!-- <p class="position-absolute text-center " style="width:50px;left:72%;top:76.5%;">{grade}</p> -->
    
    <p class="position-absolute text-center " style="width:105px;left:46%;top:65%;">{percentage}%</p>

</body>

</html>