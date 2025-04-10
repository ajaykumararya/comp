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
            top: 84.2%;
            left: 5.5%;
        }
        #photo1
        {
            top: 31.75%;
            left: 85.5%;
            z-index:999
        }
       
        p{
            font-weight: bold;
            font-size: 13px;
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
    <?php
    $certificate = ($duration_type == 'month' OR ($duration_type == 'year' && $duration == 1)) ? 'certificate' : 'diploma';
    ?>
    <img id="back-image" class="position-relative" src="{document_path}/<?=$certificate?>.jpg">
    <div class="position-absolute" id="photo">
        <img src="upload/images/student_certificate_{certiticate_id}.png" style="width: 70px">
    </div>
    <div class="position-absolute" id="photo1">
        <img src="upload/{image}" style="width:76px;height:95px">
    </div>


    <p class="position-absolute" style="top:-0.2%;left:12%;">{certiticate_id}</p>
    <p class="position-absolute" style="bottom:5%;left:19%;font-size:13px">{createdOn}</p>
    <p class="position-absolute" style="bottom:3.2%;left:15%;font-size:13px">Place</p>

    <p class="position-absolute text-center " style="width:230px;left:23%;top:42.2%;">{roll_no}</p>
    <p class="position-absolute text-center " style="width:200px;left:73%;top:42.2%;">{enrollment_no}</p>

    <p class="position-absolute text-center " style="width:320px;left:29%;top:46.7%;">{student_name}</p>
    <p class="position-absolute text-center " style="width:120px;left:81%;top:46.7%;">{dob}</p>

    <p class="position-absolute text-center " style="width:270px;left:20%;top:51.3%;">{father_name}</p>
    <p class="position-absolute text-center " style="width:240px;left:68%;top:51.3%;">{mother_name}</p>
    
    <p class="position-absolute text-center " style="width:80%;left:19%;top:55.8%;">{course_name}</p>
    
    <p class="position-absolute text-center text-capitlize" style="width:270px;left:20%;top:60.3%;">{duration} {duration_type}</p>
    <p class="position-absolute text-center " style="width:150px;left:60%;top:60.3%;">{from_date}</p>
    <p class="position-absolute text-center " style="width:130px;left:82%;top:60.3%;">{to_date}</p>
    
    <p class="position-absolute text-center " style="width:60%;left:38%;top:65%;">{center_name}</p>
    
    <p class="position-absolute text-center " style="width:180px;left:42%;top:69.7%;">{to_date}</p>
    <p class="position-absolute text-center " style="width:150px;left:74%;top:69.7%;">A{grade}</p>
    
    <p class="position-absolute text-center " style="width:150px;left:23%;top:74.2%;">{percentage}%</p>

</body>

</html>