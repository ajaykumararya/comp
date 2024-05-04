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
            font-size: 12px;
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
            top: 40.7%;
            left: 32.7%;
        }
        #photo1
        {
            top: 13.24%;
            left: 82.48%;
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
        <img src="upload/images/student_certificate_{certiticate_id}.png" style="width: 50px;
            height: 50px;">
    </div>
    <div class="position-absolute" id="photo1">
        <img src="upload/{image}" style="width:64.3px;height:67px">
    </div>

    <p class="position-absolute" style="top:19.6%;left:32%;width:300px;text-align:center">{course_name}</p>

    <p class="position-absolute" style="top:20.9%;left:12%;">{certiticate_id}</p>
    
    <p class="position-absolute" style="top:21%;left:84%;">{dob}</p>
    <p class="position-absolute" style="top:23.5%;left:16%;">{createdOn}</p>

    <div class="position-absolute text-center" style="width:350px;left:15%;top:27.5%;">{student_name}</div>
    <div class="position-absolute text-center" style="width:250px;top:27.5%;left:65%">{father_name}</div>
    
    <div class="position-absolute text-center" style="width:370px;left:15%;top:30.5%;">{enrollment_no}</div>
    <div class="position-absolute text-center" style="width:320px;left:5%;top:33.6%;">{course_name}</div>
    
    <div class="position-absolute text-center" style="left:50%;top:33.6%;">{grade} / {percentage}%</div>
    <div class="position-absolute text-center" style="left:76%;top:33.6%;">{from_date}</div>
    <div class="position-absolute text-center" style="left:86%;top:33.6%;">{to_date}</div>
    
    <!-- <div class="position-absolute text-center" style="left:40%;top:69.5%;width:150px">{obtain_total}</div> -->
    <div class="position-absolute text-center" style="width:550px;left:26%;top:36.5%;">{center_name}</div>

    
</body>

</html>