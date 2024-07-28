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
            font-size: 14px;
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
            bottom: 10%;
            left: 30%;
        }
        #photo1
        {
            top: 26.4%;
            left: 82.1%;
        }
       
        p{
            font-weight: 700;
            font-size: 14px!important;
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
            border:1px solid red
        }
    </style>
</head>

<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/certificate.png">
    <div class="position-absolute" id="photo">
        <img src="upload/images/student_certificate_{certiticate_id}.png" style="width:110px;height:110px;border:1px solid black;padding:-5px">
    </div>
    <div class="position-absolute" id="photo1">
        <img src="upload/{image}" style="width:90px;height:94px">
    </div>

    <p class="position-absolute" style="top:40.3%;left:25%;width:600px;text-align:center">{course_name}</p>

    <p class="position-absolute" style="top:43%;left:12%;">{serial_no}</p>
    
    <p class="position-absolute" style="top:43%;left:84%;">{dob}</p>
    <p class="position-absolute" style="top:48%;left:16%;">{createdOn}</p>

    <div class="position-absolute text-center" style="width:480px;left:15%;top:55%;">{student_name}</div>
    <div class="position-absolute text-center " style="width:330px;top:55%;left:65%">{father_name}</div>
    
    <div class="position-absolute text-center" style="width:370px;left:15%;top:61%;">{enrollment_no}</div>
    <div class="position-absolute text-center" style="width:450px;left:5%;top:67.1%;">{course_name}</div>
    
    <div class="position-absolute text-center" style="left:49%;top:67.1%;width:130px">{grade} / {percentage}%</div>
    <div class="position-absolute text-center" style="left:76%;top:67.1%;">{from_date}</div>
    <div class="position-absolute text-center" style="left:86%;top:67.1%;">{to_date}</div>
    
    <!-- <div class="position-absolute text-center" style="left:40%;top:69.5%;width:150px">{obtain_total}</div> -->
    <div class="position-absolute text-center" style="width:760px;left:26%;top:72.7%;">{center_name}</div>

    
</body>

</html>