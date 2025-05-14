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


    <p class="position-absolute" style="top:-0.2%;left:12%;width:200px">{serial_no}</p>
    <p class="position-absolute" style="bottom:5%;left:19%;font-size:13px">{createdOn}</p>
    <p class="position-absolute" style="bottom:3.2%;left:15%;font-size:13px">New Delhi</p>

    <p class="position-absolute text-center " style="width:190px;left:23%;top:42.2%;">{roll_no}</p>
    <p class="position-absolute text-center " style="width:200px;left:73%;top:42.2%;">{enrollment_no}</p>

    <p class="position-absolute text-center " style="width:230px;left:29%;top:47.9%;">{student_name}</p>
    <p class="position-absolute text-center " style="width:120px;left:78%;top:47.9%;">{dob}</p>

    <p class="position-absolute text-center " style="width:270px;left:20%;top:53.5%;">{father_name}</p>
    <p class="position-absolute text-center " style="width:197px;left:74%;top:53.5%;">{mother_name}</p>
    
    <p class="position-absolute text-center " style="width:80%;left:19%;top:59.5%;">{course_name}</p>
    
    <p class="position-absolute text-center text-capitlize" style="width:150px;left:20%;top:65.1%;"><?=humnize_duration($duration,$duration_type)?></p>
    <p class="position-absolute text-center " style="width:100px;left:45%;top:65.1%;">{from_date}</p>
    <p class="position-absolute text-center " style="width:130px;left:65%;top:65.1%;">{to_date}</p>
    
    <p class="position-absolute text-center " style="width:60%;left:38%;top:71%;">{center_name}</p>
    
    <!-- <p class="position-absolute text-center " style="width:180px;left:42%;top:69.7%;">{to_date}</p> -->
    <p class="position-absolute text-center " style="width:50px;left:72%;top:76.5%;">{grade}</p>
    
    <p class="position-absolute text-center " style="width:50px;left:41.8%;top:76.5%;">{percentage}%</p>

</body>

</html>