<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{name} Admit Card</title>
    <style>
        * {
            /* font-weight: bold; */
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
            /* font-weight: bold; */
        }

        div.position-absolute {
            font-size: 18px;
        }

        .w-100 {
            width: 100%;
            display: grid;
        }

        span {
            /* font-weight: bold; */
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
            /* font-weight: bold; */
        }

        .middle-div {
            width: 60%;
            margin-left: 9rem;
            text-align: center;
            /* border:1px solid red; */
            /* font-weight: bold; */
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
        .bold{
            font-weight: bold;
        }
    </style>
</head>

<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/provisional-certificate.jpg">

    <!-- <div class="position-absolute" id="photo1">
        <img src="upload/{image}" style="width:110.8px;height:130px">
    </div> -->

    <!-- <p class="position-absolute text-center " style="top:41%;left:41%;width:350px">{name}&nbsp;&nbsp;&nbsp;&nbsp;Fatrher Nmae</p> -->
    <p class="position-absolute bold" style="top:21.2%;left:85.9%;width:200px;font-size:17px;color:red">{roll_no}</p>
    <!-- <p class="position-absolute " style="top:46.5%;left:25.5%;width:335px;text-align:center;line-height:1">{course_name}</p> -->
    <p class="position-absolute bold" style="top:21.2%;left:22.5%;width:135px;font-size:17px;color:red">{sr_no}</p>
    <!-- <p class="position-absolute " style="top:50%;left:31%;width:135px;font-size:12px">{examination_held}</p>
    <p class="position-absolute " style="top:50%;left:85.6%;width:135px;font-size:12px">{internship}</p> -->
    <p class="position-absolute"
        style="left:10%;width:80%;top:41%;font-size:17px;text-indent: 70px; text-align:justify;">
        <i>This is Certify that Mr./Ms. </i><strong
            style="font-size:19px;font-weight:bold;display:inline">{name}&nbsp;&nbsp;&nbsp;&nbsp;{father_name}</strong>
        <i>has<br><br> qualified For The
            Diploma/Degree of </i><b>{course_name}</b><i>. he / she having passed the Final
            Exam Name Examination held in </i><b>{examination_held}</b><i> Starting and having satisfactorily completed
            The period of
            Compulsory Internship in </i><b>{internship}</b><i> Pasing Year</i>
    </p>



</body>

</html>