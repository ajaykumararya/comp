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
            bottom: 7.4%;
            right: 9%;
        }

        #photo1 {
            top: 3.65%;
            right: 3.6rem;
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
        <img src="upload/images/student_certificate_{certiticate_id}.png" style="width: 84px">
    </div>
    <div class="position-absolute" id="photo1">
        <img src="upload/{image}" style="width:122px;height:128px">
    </div>


    <p class="position-absolute text-center" style="top:15.4%;left:21%;width:120px">{serial_no}</p>
    <p class="position-absolute text-center" style="top:15.4%;left:78%;width:122px">{session}</p>

    <div class="position-absolute " style="left:40%;top:34.9%;">{student_name}</div>
    <div class="position-absolute " style="top:38%;left:40%">{father_name}</div>
    <div class="position-absolute text-capitlize" style="top:41%;left:40%">{gender}</div>

    <!-- <div class="position-absolute text-center" style="width:450px;left:20%;top:56.5%;">{enrollment_no}</div> -->
    <!-- <div class="position-absolute text-center t-c" style="left:60%;top:59%;">{duration} {duration_type}</div> -->
    <div class="position-absolute " style="left:40%;top:44.1%;">{course_name}</div>
    <div class="position-absolute " style="left:40%;top:47.1%;">{center_name}</div>
    <div class="position-absolute text-center" style="left:40%;top:50.3%;line-height:1">{subject_html}</div>
    <div class="position-absolute text-center" style="left:40%;top:53.3%;">{total}</div>
    <div class="position-absolute text-center" style="left:40%;top:56.3%;">{grade}</div>

    <!-- <div class="position-absolute text-center" style="width:160px;left:38%;top:54%;">{from_date}</div> -->
    <div class="position-absolute text-center" style="left:40%;top:59.5%;">{createdOn}</div>

    <!-- <div class="position-absolute text-center" style="left:58.5%;top:73.5%;width:150px">{createdOn}</div> -->
    <!-- <div class="position-absolute" style="width:580px;left:42%;top:58.5%;">{center_name}</div> -->
    <!-- createdOn -->
    

</body>

</html>