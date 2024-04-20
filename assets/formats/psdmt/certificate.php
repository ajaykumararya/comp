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
            top: 27.5%;
            left: 6.3rem;
        }
        #photo1
        {
            top: 26.8%;
            left: 23.54rem;
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
    </style>
</head>

<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/certificate.jpg">
    <div class="position-absolute" id="photo">
        <img src="upload/images/student_certificate_{certiticate_id}.png" style="width: 133px;
            height: 122px;">
    </div>
    <div class="position-absolute" id="photo1">
        <img src="upload/{image}" style="width:102.7px;height:117.6px">
    </div>
    <p class="position-absolute" style="top:5.4%;left:30%;font-size:12px">{enrollment_no}</p>
    <p class="position-absolute" style="top:5.4%;left:68.5%;font-size:12px">{roll_no}</p>

    <div class="position-absolute" style="top:43%;left:40%">{student_name}</div>
    <div class="position-absolute" style="top:46%;left:24%">{father_name}</div>
    <div class="position-absolute" style="top:49%;left:26%">{mother_name}</div>
    <div class="position-absolute" style="top:49%;left:74%">{dob}</div>
    <div class="position-absolute" style="top:52%;left:27%">{course_name}</div>
    <div class="position-absolute" style="top:54.85%;left:28%">{duration} {duration_type}</div>
    <div class="position-absolute" style="top:54.85%;left:50%">{from_date}</div>
    <div class="position-absolute" style="top:54.85%;left:70%">{to_date}</div>
    <div class="position-absolute" style="top:57.85%;left:75%">{exam_conduct_date}</div>

    <div class="position-absolute" style="top:60.83%;left:44%">{center_name}</div>

    <div class="position-absolute" style="top:63.83%;left:54%;width:100%">{obtain_total}</div>
    <div class="position-absolute" style="top:63.83%;left:77%;width:100%">{grade}</div>

    <div class="position-absolute" style="top:66.73%;left:33%">{percentage}%</div>
    <div class="position-absolute" style="top:66.73%;left:52%">{session}</div>
    <div class="position-absolute" style="top:66.73%;left:77%">{createdOn}</div>

    <!-- <div class="position-absolute w-100" style="top:44.4%;padding-left:7px;z-index:9999">

        <div class="middle-div">{student_name}</div>

        <div class="middle-div" style="margin-top:2.7rem">{father_name}</div>
        <div class="middle-div" style="margin-top:2.7rem">{roll_no}</div>
        <div class="middle-div" style="margin-top:2.6rem">{course_name}</div>
        <div class="middle-div" style="margin-top:2.95rem">{session}</div>
        <div class="middle-div" style="margin-top:.8rem;margin-left:20rem">{duration} {duration_type}</div>

        <div class="middle-div" style="margin-top:3rem;width:75%">{center_name}</div>



    </div> -->
    <!-- <p class="position-absolute" style="bottom:7.3%;left:12%">{createdOn}</p> -->
</body>

</html>