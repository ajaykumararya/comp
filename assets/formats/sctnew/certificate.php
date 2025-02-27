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
            top: 86.8%;
            left: 47%;
        }

        #photo1 {
            top: 28.8%;
            left: 44.23%;
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
             font-size: 25pt!important;
            font-family: "Noto Sans Devanagari", sans-serif;
        }
    </style>
</head>

<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/certificate.jpg">
    <div class="position-absolute" id="photo">
        <img src="upload/images/student_certificate_{certiticate_id}.png" style="width: 70px;height:67px">
    </div>
    <div class="position-absolute" id="photo1">
        <img src="upload/{image}" style="width:110.8px;height:130px">
    </div>

    <p class="position-absolute text-center" style="top:39.7%;left:55%;width:120px">{roll_no}</p>
    <p class="position-absolute " style="top:4.3%;left:70%;width:135px;text-align:center">{enrollment_no}</p>
    <p class="position-absolute " style="top:4%;left:10%;width:135px;text-align:center">{serial_no}</p>
    <p class="position-absolute text-center" style="top:41.8%;left:10%;width:80%;">
        <p class="big-text" style="text-align:center;font-weight:600;font-family:freeserif;font-size:22px;text-indent: 120px; text-align:justify;">
            प्रमाणित किया जाता है कि <b>{hindi_name}</b> <br>
        आत्मज / आत्मजा श्री <b>{hindi_father_name}</b> एवं श्रीमती <b>{hindi_mother_name}</b> को
        विद्यापीठ से सन् <b>2019</b> की पाठ्यक्रम परीक्षा में <b>{course_name}</b>
        की उपाधि <b><?=$this->ki_theme->grade($percentage,'hi')?></b> श्रेणी में प्रदत्त की गयी है।
        </p>
        <br>
        <p style="text-align:center;font-weight:600;font-family:freeserif;font-size:22px;text-indent: 120px; text-align:justify;">
            This is to Certify that <b>{student_name}</b> <br>
        Son /Daughter of Shri <b>{father_name}</b> and Smt. <b>{mother_name}</b>
        has been conferred the Degree of <b>{course_name}</b> in the
        Examination of <b>2019</b> of this Vidyapeeth in <b>{grade}</b> Division.</p>
    </p>

    <p class="position-absolute text-center" style="left:17%;top:86%;width:82px;font-size:14px">{createdOn}</p>


</body>

</html>