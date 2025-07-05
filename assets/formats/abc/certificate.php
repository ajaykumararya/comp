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
            top: 78%;
            left: 36%; 
        }
        #photo1
        {
            top: 23%;
            left: 75%;
        }
       
        p{
            font-weight: 700;
            font-size: 16px!important;
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
        .highlight{
            font-size: 20px!important;
            color:red;
            top:11.3rem;
            left:36%;
            width: 30%;
            text-align: center;
        }
        .up {
            text-transform: uppercase;
        }
    </style>
</head>

<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/certificate.jpg">
    <div class="position-absolute" id="photo">
        <img src="upload/images/student_certificate_{certiticate_id}.png" style="width: 100px
          ">
    </div>
    <div class="position-absolute" id="photo1">
        <img src="upload/{image}" style="width:110px;height:120px">
    </div>
    <!-- <p class="position-absolute" style="top:40.3%;left:25%;width:600px;text-align:center">{course_name}</p> -->

    <p class="position-absolute" style="top:3.7%;left:25%;font-size:15px">{serial_no}</p>
    <!-- <p class="position-absolute" style="top:3.7%;left:71%;font-size:15px">{roll_no}</p> -->
    <p class="position-absolute" style="top:3.7%;left:71%;font-size:15px">{enrollment_no}</p>
    
    <!-- <p class="position-absolute" style="top:48%;left:16%;">{createdOn}</p> -->

    <p class="position-absolute text-center up" style="width:84%;left:8%;top:34%;text-transform:upparcase">{student_name}</p>
    <p class="position-absolute text-center " style="width:84%;top:40.2%;left:8%">{father_name}</p>

    <p class="position-absolute text-center" style="width:70%;left:21%;top:46.2%;">{course_name}</p>
    <p class="position-absolute text-center" style="width:100px;left:32%;top:52.6%;">{from_date}</p>
    <p class="position-absolute text-center" style="width:100px;left:55%;top:52.6%;">{to_date}</p>
    <p class="position-absolute text-center" style="width:100px;left:55%;top:55.8%;"><?=humnize_duration($duration,$duration_type)?></p>
    <p class="position-absolute text-center" style="width:100px;left:59%;top:58.8%;">{grade}</p>

    <p class="position-absolute text-center" style="width:70%;left:21%;top:65%;">{center_name}</p>
    <p class="position-absolute text-center" style="width:70%;left:21%;top:66.7%;">{center_code}</p>
    <p class="position-absolute text-center" style="width:70%;left:21%;top:68.7%;line-height:1">{center_full_address}</p>

    <div class="position-absolute" style="top:82%;left:8%">
        <img src="upload/{center_signature}" style="width:180px;height:50px">
    </div>

    <p class="position-absolute text-center" style="left:47%;top:73.7%;font-size:14px">{createdOn}</p>

    
</body>

</html>