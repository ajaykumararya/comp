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
            bottom: 11.5%;
            left: 4rem;
            width: 100px;
            border:2px solid black
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
        <img src="upload/images/student_certificate_{certiticate_id}.png">
    </div>
    <div class="position-absolute w-100" style="top:44.4%;padding-left:7px;z-index:9999">

        <div class="middle-div">{student_name}</div>

        <div class="middle-div" style="margin-top:2.7rem">{father_name}</div>
        <div class="middle-div" style="margin-top:2.7rem">{roll_no}</div>
        <div class="middle-div" style="margin-top:2.6rem">{course_name}</div>
        <div class="middle-div" style="margin-top:2.95rem">{session}</div>
        <div class="middle-div" style="margin-top:.8rem;margin-left:20rem">{duration} {duration_type}</div>

        <div class="middle-div" style="margin-top:3rem;width:75%">{center_name}</div>



    </div>
    <p class="position-absolute" style="bottom:7.3%;left:12%">{createdOn}</p>
</body>

</html>