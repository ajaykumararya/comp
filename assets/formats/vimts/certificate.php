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

        #photo1
        {
            top: 16.2%;
            left: 79.8%;
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
        
        #photo {
            z-index: 999;
            top: 74.5%;
            left: 43.5%;
            padding: 2px;   
        }
    </style>
</head>

<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/certificate.jpg">
    <div class="position-absolute" id="photo">
        <img src="upload/images/student_certificate_{certiticate_id}.png" style="width: 118px;height:110
          ">
    </div>
    <!-- <div class="position-absolute" id="photo1">
        <img src="upload/{image}" style="width:90px;height:120px">
    </div> -->
    <!-- <p class="position-absolute" style="top:40.3%;left:25%;width:600px;text-align:center">{course_name}</p> -->

    <!-- <p class="position-absolute" style="top:43%;left:12%;">{serial_no}</p> -->
    
    <!-- <p class="position-absolute" style="top:48%;left:16%;">{createdOn}</p> -->

    <p class="position-absolute text-center" style="width:90%;left:5%;top:35.6%;">{student_name}</p>
    
    <p class="position-absolute text-center text-capitlize" style="left:5%;top:41%;width:90%">{father_name}</p><!-- <p class="position-absolute text-center " style="width:330px;top:55%;left:65%">{father_name}</p> -->
    
    <p class="position-absolute text-center" style="width:90%;left:5%;top:46.5%;">{roll_no}</p>
    <p class="position-absolute text-center " style="width:47%;left:45%;top:48.8%;">{course_name}</p>
    
    <!-- <p class="position-absolute text-center" style="left:76%;top:67.1%;">{from_date}</p> -->
    <p class="position-absolute text-center" style="left:5%;top:56.7%;width:90%">{to_date}</p>
    <p class="position-absolute text-center " style="left:5%;top:58.8%;width:90%">{grade}</p>
    
    <!-- <div class="position-absolute text-center" style="left:40%;top:69.5%;width:150px">{obtain_total}</div> -->
    <p class="position-absolute text-capitlize text-center" style="left:5%;top:63.8%;width:90%;line-height:1">{center_name}</p>


    
</body>

</html>