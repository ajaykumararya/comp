<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{student_name} Certificate</title>
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
            top: 89.4%;
            left: 23%;
        }
        #photo1
        {
            top: 34.3%;
            left: 43.9%;
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
    </style>
</head>

<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/certificate.jpg">
    <div class="position-absolute" id="photo">
        <img src="upload/images/student_certificate_{certiticate_id}.png" style="width: 60px">
    </div>
    <div class="position-absolute" id="photo1">
        <img src="upload/{image}" style="width:95px;height:122.5px">
    </div>


    <p class="position-absolute" style="top:6.5%;left:18%;">{certiticate_id}</p>
    <p class="position-absolute" style="top:92%;left:14.7%;font-size:11px">{createdOn}</p>

    <div class="position-absolute text-center" style="width:450px;left:20%;top:49.5%;">{student_name}</div>
    <div class="position-absolute text-center" style="width:450px;top:54.3%;left:20%">{father_name}</div>
    
    <div class="position-absolute text-center" style="width:450px;left:20%;top:59.2%;">{enrollment_no}</div>
    <!-- <div class="position-absolute text-center t-c" style="left:60%;top:59%;">{duration} {duration_type}</div> -->
    <div class="position-absolute text-center" style="width:450px;left:20%;top:64%;">{course_name}</div>
    
    <div class="position-absolute text-center" style="width:450px;left:20%;top:68.7%;">{from_date} - {to_date}</div>
    
    <div class="position-absolute text-center" style="left:40%;top:73.6%;width:150px">{obtain_total}</div>
    <div class="position-absolute text-center" style="width:450px;left:20%;top:78.2%;">{center_name}</div>

    
</body>

</html>