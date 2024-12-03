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
            display: inline-block;
        }

        #photo {
            top:36.4rem;
            left:34.7rem;
            padding: 4px;
        }
        #photo1
        {
            top: 28.4%;
            left: 83.2%;
        }
       
        p{
            font-weight: 700;
            font-size: 15px!important;
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
    <!-- <div class="position-absolute" id="photo">
        <img src="upload/images/student_certificate_{certiticate_id}.png" style="width:92px;height:93px;padding:2px">
    </div>
    <div class="position-absolute" id="photo1">
        <img src="upload/{image}" style="width:98px;height:126px">
    </div> -->
    

    <p class="position-absolute" style="top:67.6%;left:12%;">{course_name}</p>
    <p class="position-absolute text-capitlize" style="top:67.5%;left:70%;">{duration} {duration_type}</p>

    <p class="position-absolute" style="top:53%;left:54%;">{serial_no}</p>
    
    <p class="position-absolute" style="top:77%;left:20%;width:200px">{obtain_total}</p>
    <p class="position-absolute" style="top:77%;left:50%;">{grade} A</p>
    <p class="position-absolute" style="top:77%;left:76%;">{dob}</p>

    <p class="position-absolute text-center" style="left:20%;top:57.5%;">{student_name}</p>
    <p class="position-absolute text-center " style="top:57.5%;left:65%">{father_name}</p>
    
    <!-- <p class="position-absolute text-center" style="left:80%;top:3.8%;">{enrollment_no}</p>
    <p class="position-absolute " style="left:17%;top:3.8%;width:150px">{roll_no}</p> -->
    
    <!-- <p class="position-absolute text-center" style="left:54%;top:56.1%;width:130px">{duration} {duration_type}</p> -->
    <p class="position-absolute text-center" style="left:16%;top:72.3%;">{from_date}</p>
    <p class="position-absolute text-center" style="left:32%;top:72.3%;">{to_date}</p>
    
    <p class="position-absolute text-center" style="left:67.5%;top:72.3%;">{center_name}</p>

    
    <!-- <p class="position-absolute" style="top:63.5%;left:50%;">{createdOn}</p> -->
</body>

</html>