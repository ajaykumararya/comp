<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{student_name} Admit Card</title>
    {basic_header_link}
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
        
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
        #photo1{
            z-index: 999;
            top: 21.3rem;
            right: 47px;
            width: 120px !important;
            ;
            height: 95px;
        }
        #photo {
            z-index: 999;
            bottom: 14%;
            left: 6rem;
            width: 70px;
        }
        .middle-div{
            width: 60%;
            margin-left:7rem;
            text-align: center;
            
        }
        .test{
            border:1px solid red
        }
    </style>
</head>

<body class="position-relative">
    <div class="position-absolute" style="top:6%;left:80%">{serial_no}</div>
    <img id="back-image" class="position-relative" src="{document_path}/certificate.png">
    <div class="position-absolute" id="photo">
        <img src="upload/images/student_certificate_{certiticate_id}.png">
    </div>
    <div class="position-absolute" id="photo1">
        <img src="upload/{image}" style="width:94.7px;height:113px">
    </div>
    <div class="position-absolute" style="top:37%;left:17%">{session}</div>
    <div class="position-absolute w-100" style="top:49.98%;padding-left:7px;z-index:9999">
        
            <div class="middle-div" style="margin-left:9.2rem">{student_name}</div>
        
            <div class="middle-div" style="margin-top:1.2rem;margin-left:9.4rem">{father_name}</div>
            <div class="middle-div" style="margin-top:1.34rem">{roll_no}</div>
            
            <div class="middle-div" style="margin-top:1rem;margin-left:2rem">{duration} {duration_type}</div>
            

    </div>
    <div class="position-absolute w-100" style="top:48.3rem;left:16rem">{course_name}</div>
    <div class="position-absolute w-100" style="top:55.54rem;left:13rem">{center_name}</div>
    <div class="position-absolute w-100" style="top:66.2%;left:70%">{obtain_total}</div>
    <div class="position-absolute w-100" style="top:69.7%;left:33%">{grade}</div>
    <div class="position-absolute" style="bottom:9%;left:18%">{createdOn}</div>
    
</body>

</html>