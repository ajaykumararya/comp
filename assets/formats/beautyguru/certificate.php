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
            top: 79.3%;
            left: 2.6rem;
        }
        #photo1
        {
            top: 21.6%;
            left: 64.99rem;
        }
       
        p{
            font-weight: bold;
            font-size: 22px;
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
            border: 1px solid red;
        }
    </style>
</head>

<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/certificate.jpg">
    <!-- <div class="position-absolute" id="photo">
        <img src="upload/images/student_certificate_{certiticate_id}.png" style="width: 109px;
            height: 109px;">
    </div> -->
    <div class="position-absolute" id="photo1">
        <img src="upload/{image}" style="width:96px;height:124px">
    </div>


    <!-- <p class="position-absolute" style="top:2.5%;left:20%;">{certiticate_id}</p> -->
    <p class="position-absolute" style="bottom:7%;left:19%;font-size:13px">{createdOn}</p>

    <p class="position-absolute text-center" style="width:380px;left:18%;top:43%;">{student_name}</p>
    <p class="position-absolute text-center" style="width:380px;top:43%;left:60%">{father_name}</p>
    
    <p class="position-absolute text-center" style="width:80%;left:10%;top:57.3%;">{course_name}</p>
    <p class="position-absolute text-center" style="left:52%;top:62%;">{enrollment_no}</p>
    <!-- <p class="position-absolute text-center t-c" style="left:60%;top:59%;">{duration} {duration_type}</p> -->
    <!-- <p class="position-absolute text-center" style="width:450px;left:20%;top:61.7%;">{course_name}</p> -->
    
    <!-- <p class="position-absolute text-center" style="width:450px;left:20%;top:66.7%;">{from_date} - {to_date}</p> -->
    
    <p class="position-absolute text-center" style="left:23%;top:67%;width:150px">{obtain_total}</p>
    <!-- <p class="position-absolute text-center" style="width:450px;left:20%;top:74.7%;">{center_name}</p> -->

    
</body>

</html>