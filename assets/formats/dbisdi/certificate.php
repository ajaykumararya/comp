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
            top: 84.4%;
            left: 46%;
        }
        #photo1
        {
            top: 32.7%;
            left: 41.3%;
        }
       
        p{
            font-weight: 900;
            font-size: 14px!important;
            color:darkgreen
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
    </style>
</head>

<body class="position-relative">
    <img id="back-image" class="position-relative" src="{document_path}/certificate.jpg">
    <div class="position-absolute" id="photo">
        <img src="upload/images/student_certificate_{certiticate_id}.png" style="width: 60px">
    </div>
    <div class="position-absolute" id="photo1">
        <img src="upload/{image}" style="width:136px;height:174px;border:2px solid #017ba4">
    </div>
    <p class="position-absolute" style="top:25.4%;left:12%">{serial_no}</p>
    <p class="position-absolute" style="top:25.4%;left:79%">{roll_no}</p>



    <p class="position-absolute text-center" style="top:51%;left:12%;width:76%">{student_name}</p>
    <p class="position-absolute" style="top:54.15%;left:32%">{enrollment_no}</p>
    <p class="position-absolute text-capitlize" style="top:54.15%;left:50%">{gender}</p>
    <p class="position-absolute" style="top:54.15%;left:69%">{dob}</p>


    <p class="position-absolute text-center" style="top:59.8%;left:25%;width:220px">{mother_name}</p>
    <p class="position-absolute text-center" style="top:59.8%;left:57%;width:220px">{father_name}</p>

    <p class="position-absolute text-center" style="top:65.7%;left:12%;width:76%">{course_name}</p>

    <p class="position-absolute" style="top:68.4%;left:36%">{percentage} %</p>
    <p class="position-absolute" style="top:68.4%;left:63%">{from_date} To {to_date}</p>

      <p class="position-absolute text-center" style="top:74%;left:12%;width:76%">{center_name}</p>




    <p class="position-absolute text-center" style="left:54%;top:79.8%;">{createdOn}</p>

    
</body>

</html>