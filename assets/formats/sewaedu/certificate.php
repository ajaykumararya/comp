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
    <div class="position-absolute" id="photo">
        <img src="upload/images/student_certificate_{certiticate_id}.png" style="width:92px;height:93px;padding:2px">
    </div>
    <div class="position-absolute" id="photo1">
        <img src="upload/{image}" style="width:98px;height:126px">
    </div>
    

    <p class="position-absolute" style="top:48.3%;left:26.5%;">{course_name}</p>
    <p class="position-absolute text-capitlize" style="top:48.3%;left:76.5%;">{duration} {duration_type}</p>

    <!-- <p class="position-absolute" style="top:43%;left:12%;">{serial_no}</p> -->
    
    <!-- <p class="position-absolute" style="top:43%;left:84%;">{dob}</p> -->

    <p class="position-absolute text-center" style="left:25%;top:44%;">{student_name}</p>
    <p class="position-absolute text-center " style="top:44%;left:65%">{father_name}</p>
    
    <p class="position-absolute text-center" style="left:80%;top:3.8%;">{enrollment_no}</p>
    <p class="position-absolute " style="left:17%;top:3.8%;width:150px">{roll_no}</p>
    
    <p class="position-absolute text-center" style="left:54%;top:56.1%;width:130px">{percentage}%</p>
    <!-- <p class="position-absolute text-center" style="left:76%;top:67.1%;">{from_date}</p> -->
    <p class="position-absolute text-center" style="left:26%;top:56.1%;">{to_date}</p>
    
    <div class="position-absolute text-center" style="left:50%;top:62%;width:100px">{obtain_total}</div>
    <p class="position-absolute text-center" style="left:24%;top:52%;">{center_name}</p>

    
    <p class="position-absolute" style="top:63.5%;left:50%;">{createdOn}</p>
</body>

</html>