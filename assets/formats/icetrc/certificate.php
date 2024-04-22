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
    </style>
</head>

<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/certificate.jpg">
    <div class="position-absolute" id="photo">
        <img src="upload/images/student_certificate_{certiticate_id}.png" style="width: 109px;
            height: 109px;">
    </div>
    <div class="position-absolute" id="photo1">
        <img src="upload/{image}" style="width:120.5px;height:155.5px">
    </div>


    <p class="position-absolute" style="top:2.5%;left:20%;">{certiticate_id}</p>
    <p class="position-absolute" style="top:2.5%;left:78.5%;">{createdOn}</p>

    <div class="position-absolute text-center" style="width:450px;left:20%;top:46%;">{student_name}</div>
    <div class="position-absolute text-center" style="width:450px;top:51.3%;left:20%">{father_name}</div>
    
    <div class="position-absolute text-center" style="width:450px;left:20%;top:56.5%;">{enrollment_no}</div>
    <div class="position-absolute text-center t-c" style="left:60%;top:59%;">{duration} {duration_type}</div>
    <div class="position-absolute text-center" style="width:450px;left:20%;top:61.7%;">{course_name}</div>
    
    <div class="position-absolute text-center" style="width:450px;left:20%;top:66.7%;">{from_date} - {to_date}</div>
    
    <div class="position-absolute text-center" style="left:40%;top:69.5%;width:150px">{obtain_total}</div>
    <div class="position-absolute text-center" style="width:450px;left:20%;top:74.7%;">{center_name}</div>

    
</body>

</html>