<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{student_name} Admit Card</title>
    <style>
        * {
            font-weight: bold;
            /* text-transform: uppercase; */

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
            top: 20%;
            left: 6%;
            background: #fff;
            border: 1px solid #000;
        }

        #photo1 {
            top: 20%;
            left: 80%;
            border: 1px solid #000;
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
            /* text-transform: uppercase !important; */
        }

        .test {
            border: 1px solid red
        }

        #center_signature {
            z-index: 999;
            bottom: 11%;
            left: 65%;
        }

        .hindi-text {
            font-size: 25pt !important;
            font-family: "Noto Sans Devanagari", sans-serif;
        }
    </style>
</head>

<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/certificate.jpg">
    <div class="position-absolute" id="photo">
        <img src="upload/images/student_certificate_{certiticate_id}.png" style="width: 130px;height:130px">
    </div>
    <div class="position-absolute" id="photo1">
        <img src="upload/{image}" style="width:110.8px;height:130px">
    </div>
    <p class="position-absolute " style="top:27.9%;left:47%;width:135px;text-align:center;font-family:tahoma;">
        {serial_no}</p>
    <p class="position-absolute text-center" style="top:30%;left:46.5%;width:80%;">
    <p
        style="text-align:center;font-weight:600;font-family:tahoma;font-size:12px;text-indent: 120px; text-align:center;">
        Roll No: <b>{roll_no}</b>
    </p>
    </p>

    <p class="position-absolute text-center" style="top:35%;left:10%;width:80%;">

    <p
        style="text-align:center;font-weight:600;font-family:tahoma;font-size:18px;text-indent: 120px; text-align:center;">
        Mr./Mrs./Miss <b>{student_name}</b> Father's Name <b>Shri {father_name}</b></p>
    <p
        style="text-align:center;font-weight:600;font-family:tahoma;font-size:18px;text-indent: 120px; text-align:center; padding-top:18px;">
        Mother's Name <b>Smt. {mother_name}</b> D.O.B. <b>{dob}</b></p>
    <p
        style="text-align:center;font-weight:600;font-family:tahoma;font-size:18px;text-indent: 120px; text-align:center;padding-top:18px;">
        Enrollment No: <b>{enrollment_no}</b> has successfully completed the
    </p>
    <p
        style="text-align:center;font-weight:600;font-family:tahoma;font-size:18px;text-indent: 120px; text-align:center;padding-top:18px;">
        Training Program of International Institute of Skills Development & IT Training in
    </p>
    <p
        style="text-align:center;font-weight:600;font-family:tahoma;font-size:18px;text-indent: 120px; text-align:center;padding-top:18px;">
        <b>{course_name}</b>
    </p>
    <p
        style="text-align:center;font-weight:600;font-family:tahoma;font-size:18px;text-indent: 120px; text-align:center;padding-top:18px;">
        at under
    </p>
    <p
        style="text-align:center;font-weight:600;font-family:tahoma;font-size:18px;text-indent: 120px; text-align:center;padding-top:18px;">
        <b>{center_name} ({center_code})</b>
    </p>
    <p
        style="text-align:center;font-weight:600;font-family:tahoma;font-size:18px;text-indent: 120px; text-align:center;padding-top:18px;">
        <b>{center_full_address}</b>
    </p>
    <p
        style="text-align:center;font-weight:600;font-family:tahoma;font-size:18px;text-indent: 120px; text-align:center;padding-top:18px;">
        <!--with Grade<b> {grade}</b>-->Course Duration of <b>{duration} {duration_type}</b>
    </p>
    </p>

    <p class="position-absolute text-center"
        style="left:8%;top:78.5%;width:82px;font-size:14px;text-align:center;font-family:tahoma;">{createdOn}</p>


</body>

</html>