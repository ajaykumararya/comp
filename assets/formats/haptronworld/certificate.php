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
            text-align: center;
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
            top: 78%;
            left: 55.1%;
        }
        #photo1
        {
            top: 28.39%;
            left: 22.87rem;
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
    <img id="back-image" class="position-relative" src="{document_path}/certificate.jpg">
    <div class="position-absolute" id="photo">
        <img src="upload/images/student_certificate_{certiticate_id}.png" style="width: 93px;
            height: 93px;">
    </div>
    <!-- <div class="position-absolute" id="photo1">
        <img src="upload/{image}" style="width:120.5px;height:155.5px">
    </div> -->


    <p class="position-absolute" style="top:3.6%;left:32%;width:120px">{certiticate_id}</p>
    <p class="position-absolute" style="top:3.6%;left:85%;width:122px">{enrollment_no}</p>

    <div class="position-absolute text-center " style="width:550px;left:43%;top:40.5%;">{student_name}</div>
    <div class="position-absolute text-center " style="width:340px;top:44.7%;left:37%">{father_name}</div>
    
    <!-- <div class="position-absolute text-center" style="width:450px;left:20%;top:56.5%;">{enrollment_no}</div> -->
    <!-- <div class="position-absolute text-center t-c" style="left:60%;top:59%;">{duration} {duration_type}</div> -->
    <div class="position-absolute text-center " style="width:680px;left:32%;top:48.7%;">{course_name}</div>
    
    <div class="position-absolute text-center" style="width:160px;left:38%;top:52.7%;">{from_date}</div>
    <div class="position-absolute text-center" style="width:140px;left:54.5%;top:52.7%;">{to_date}</div>
    
    <div class="position-absolute text-center" style="left:78%;top:65%;width:150px">{grade}</div>
    <div class="position-absolute text-center" style="left:58.5%;top:72%;width:150px">{createdOn}</div>
    <div class="position-absolute text-center" style="width:580px;left:41.5%;top:56.7%;">{center_name}</div>
    <!-- createdOn -->
    
</body>

</html>