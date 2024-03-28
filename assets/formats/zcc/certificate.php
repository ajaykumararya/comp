<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{student_name} Certificate</title>

    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
        }
        .text-capitlize {
            text-transform: capitalize;
        }

        .position-relative {
            position: relative;
        }

        .position-absolute {
            position: absolute;
            padding-left:10px
        }

        .w-100 {
            width: 100%;
            display: grid;
        }
        /*  #1a4891 */
        p {
            font-weight: bold;
            color:black;
            font-size: 16px;
            display: inline-block;
            line-height: 1.8;
        }

        #photo {
            z-index: 999;
            top: 22.8%;
            right: 55.3px;
        }
    </style>
</head>

<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/certificate.jpg">
    <div class="position-absolute" id="photo">
        <img src="upload/{image}" style="width:84px;height:107.5px">
    </div>
    <p class="position-absolute" style="top:13.34%;left:76.45%;font-size:13px;text-align:center;width:135px;">{enrollment_no}</p>

    <p class="position-absolute" style="top:27.17%;left:26.2%">{roll_no}</p>
    <p class="position-absolute" style="top:30.9%;left:31%;width:258px">{student_name}</p>
    <p class="position-absolute" style="top:30.78%;left:68.55%">{dob}</p>
    <p class="position-absolute" style="top:34.6%;left:17.5%;width:215px">{father_name}</p>
    <p class="position-absolute" style="top:34.6%;left:58%;width:300px">{mother_name}</p>
    <p class="position-absolute" style="top:38.4%;left:21%;width:550px">{course_name}</p>
    <p class="position-absolute" style="top:42.1%;left:23%;width:120px">{duration} {duration_type}</p>
    <p class="position-absolute" style="top:42.1%;left:46.6%;width:120px;">{from_date}</p>
    <p class="position-absolute" style="top:42.1%;left:71.25%;width:130px;">{to_date}</p>
    <p class="position-absolute" style="top:45.88%;left:73.5%;width:150px">{exam_conduct_date}</p>

    <p class="position-absolute" style="top:49.65%;left:36%;width:470px">{center_name}</p>
    <p class="position-absolute" style="top:53.2%;left:47%;width:130px">({percentage}%)</p>
    <p class="position-absolute" style="top:53.2%;left:74.3%;width:150px">({grade})</p>
    
    <div class="position-absolute" style="bottom:24.1%;right:10.4%;">
        <img src="upload/images/student_certificate_{certiticate_id}.png" style="width:88px;height:88px;" alt="">

    </div>

    <p class="position-absolute" style="left:30%;bottom:19.29%;padding:0">({percentage} %)</p>
    <!-- <p class="position-absolute" style="left:50%;bottom:20%">{grade}</p> -->
    <p class="position-absolute" style="left:54%;bottom:19.29%;padding:0">{session}</p>
    <p class="position-absolute" style="left:79.87%;bottom:19.36%;padding:0">{createdOn}</p>
</body>

</html>