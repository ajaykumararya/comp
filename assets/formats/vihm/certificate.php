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
            top: 43.2%;
            left: 11.5%;
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
    </div> -->
    <div class="position-absolute" id="photo1">
        <img src="upload/{image}" style="width:69px;height:85px">
    </div>
    <p class="position-absolute text-center" style="top:36.5%;left:10%;width:80%;font-size:2rem;color:red">{course_name}</p>
    

    <p class="position-absolute" style="top:48.9%;left:47%;">{course_name}</p>
    <p class="position-absolute text-capitlize" style="top:49%;left:79.5%;">{duration} {duration_type}</p>

    <!-- <p class="position-absolute" style="top:43%;left:12%;">{serial_no}</p> -->
    
    <!-- <p class="position-absolute" style="top:43%;left:84%;">{dob}</p> -->

    <p class="position-absolute text-center" style="left:48%;top:43.5%;">{student_name}</p>
    <p class="position-absolute text-center " style="top:46.2%;left:48%">{father_name}</p>
    
    <p class="position-absolute text-center" style="left:73%;top:18%;">{enrollment_no}</p>
    <p class="position-absolute " style="left:24%;top:18%;width:150px">{roll_no}</p>
     
    <!-- <p class="position-absolute text-center" style="left:54%;top:56.1%;width:130px">{percentage}%</p> -->
    <!-- <p class="position-absolute text-center" style="left:76%;top:67.1%;">{from_date}</p> -->
    <p class="position-absolute text-center" style="left:45%;top:54.5%;">{session}</p>
    
    <div class="position-absolute text-center" style="left:28%;top:63.6%;width:100px">{grade}</div>
    <p class="position-absolute text-center" style="left:10%;top:51.5%;width:38.5%">{center_name}</p>

    
    <p class="position-absolute" style="top:68%;left:23%;">{createdOn}</p>
</body>

</html>