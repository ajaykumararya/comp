<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{student_name} Admit Card</title>
    <style>
        * {
            font-weight: bold;
            /*text-transform: capitalize;*/

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
            font-size: 15px;
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
            top: 84%;
            left: 44.15%;
            padding: 0;
        }

        #photo1 {
            top: 32.65%;
            left: 41.75%;
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
            /*text-transform: uppercase!important;*/
        }

        .test {
            border: 1px solid red
        }

        /* #center_signature {
            z-index: 999;
            bottom: 10%;
            left: 65%;
        } */
        #center_signature {
            bottom: 8.7%;
            left: 67%;
            padding: 0;
            width: 210px
        }
    </style>
</head>

<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/certificate.jpg">
    <div class="position-absolute" id="photo">
        <img src="upload/images/student_certificate_{certiticate_id}.png" style="width: 90px">
    </div>
    <div class="position-absolute" id="photo1">
        <img src="upload/{image}" style="width:128px;height:165px">
    </div>


    <p class="position-absolute " style="top:2.2%;left:21%;width:120px">{serial_no}</p>
    <p class="position-absolute" style="top:2.2%;left:81%;width:122px">{enrollment_no}</p>

    <div class="position-absolute " style="left:40%;top:54.8%;">{student_name}</div>
    <div class="position-absolute " style="width:340px;top:57.8%;left:20%;">{father_name}</div>
    <div class="position-absolute " style="width:340px;top:57.8%;left:64%;">{mother_name}</div>
    <div class="position-absolute " style="top:54.8%;left:80.6%">{dob}</div>

    <!-- <div class="position-absolute text-center" style="width:450px;left:20%;top:56.5%;">{enrollment_no}</div> -->
    <div class="position-absolute" style="width:680px;left:20%;top:60.8%;">{course_name}</div>
    <div class="position-absolute text-center t-c text-capitlize" style="left:29%;top:63.6%;">{duration} {duration_type}
    </div>

    <div class="position-absolute text-center" style="width:160px;left:53%;top:63.6%;">{from_date}</div>
    <div class="position-absolute text-center" style="width:140px;left:74%;top:63.6%;">{to_date}</div>
    <div class="position-absolute text-center" style="width:140px;left:74%;top:66.5%;">{to_date}</div>

    <!-- <div class="position-absolute text-center" style="left:24%;top:69.6%;width:150px">{grade}</div> -->
    <div class="position-absolute " style="left:17%;top:95.5%;width:150px;font-size:13px">{createdOn}</div>
    <div class="position-absolute " style="left:17%;top:94%;width:150px;font-size:13px">NEW DELHI</div>
    <div class="position-absolute" style="width:580px;left:38%;top:69.4%;">{center_name}</div>
    <!-- createdOn -->
    <div class="position-absolute text-center" style="width:140px;left:44%;top:72.6%;">{percentage}%</div>
    <div class="position-absolute text-center" style="width:140px;left:80%;top:72.6%;">{grade}</div>


</body>

</html>