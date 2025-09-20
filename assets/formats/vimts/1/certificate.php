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
            top: 74.5%;
            left: 43.3%;
            padding: 2px;   
        }
        #photo1
        {
            top: 34%;
            left: 68%;
        }
       
        p{
            font-weight: 700;
            font-size: 16px!important;
            color:#c69029
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
        .hide{
            display: none;
        }
    </style>
</head>

<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/1/certificate.jpg">
    <div class="position-absolute" id="photo">
        <img src="upload/images/student_certificate_{certiticate_id}.png" style="width: 120px;height:110px
          ">
    </div>
    <div class="position-absolute" id="photo1">
        <img src="upload/{image}" style="width:116px;height:128px">
    </div>

    <p class="position-absolute text-center " style="width:90%;left:5%;top:45%;">{student_name}</p>
    
    <p class="position-absolute text-center text-capitlize" style="left:5%;top:50.3%;width:90%">{course_name}</p><!-- <p class="position-absolute text-center " style="width:330px;top:55%;left:65%">{father_name}</p> -->
    
    <p class="position-absolute " style="width:400px;left:35%;top:55.3%;">{roll_no}</p>
    <p class="position-absolute " style="width:330px;left:52%;top:62.3%;">{center_name}</p>
    

    
</body>

</html>